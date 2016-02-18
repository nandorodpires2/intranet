<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PropostaController
 *
 * @author Fernando Rodrigues
 */
class Site_PropostaController extends Zend_Controller_Action {
    
    const STATUS_AGUARDANDO_RESPOSTA = "Aguardando Resposta";
    const STATUS_APROVADA = "Aprovada";
    const STATUS_VENCIDA = "Vencida";
    const STATUS_EXCLUIDA = "Excluída";
    
    public function init() {
        $this->view->headScript()->appendFile($this->view->baseUrl('views/js/proposta/cadastro.js')); 
        // atualiza os status das propostas
        $this->atualizaStatus();
    }
    
    public function indexAction() {
                
        /**
         * Form cadastro
         */
        $formPropostaCadastro = new Form_Site_PropostaCadastro();
        $formPropostaCadastro->submit->setLabel("CADASTRAR");        
        //$formPropostaCadastro->proposta_numero->setValue($this->getNumeroProposta());
        $this->view->formPropostaCadastro = $formPropostaCadastro;
        
        /**
         * Busca as propostas
         */
        $page = $this->getRequest()->getParam('page',1); //get curent page param, default 1 if param not available.        
        
        $modelProposta = new Model_DbTable_Proposta();                
        $data = $modelProposta->getQuery();
        
        $adapter = new Zend_Paginator_Adapter_DbSelect($data); //adapter
        $paginator = new Zend_Paginator($adapter); // setup Pagination
        $paginator->setItemCountPerPage(Zend_Registry::get("config")->resource->rowspage); // Items perpage, in this example is 10
        $paginator->setCurrentPageNumber($page); // current page
        
        //Zend_Paginator::setDefaultScrollingStyle('Sliding');
        //Zend_View_Helper_PaginationControl::setDefaultViewPartial('partials/pagination.phtml');
        
        $this->view->propostas = $paginator;  
        
    }
    
    public function cadastroAction() {

        /**
         * Form cadastro
         */
        $formPropostaCadastro = new Form_Site_PropostaCadastro();
        $formPropostaCadastro->submit->setLabel("CADASTRAR");        
        $formPropostaCadastro->proposta_numero->setValue($this->getNumeroProposta());
        $this->view->formPropostaCadastro = $formPropostaCadastro;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            //Zend_Debug::dump($data); die();
            if ($formPropostaCadastro->isValid($data)) {
                
                $data = $formPropostaCadastro->getValues();
                
                try {
                    $modelProposta = new Model_DbTable_Proposta();
                    $modelProposta->insert($data);
                    
                    $this->_helper->flashMessenger->addMessage(array(
                        'success' => 'Proposta cadastrada com sucesso!'
                    ));
                    
                } catch (Exception $ex) {
                    $this->_helper->flashMessenger->addMessage(array(
                        'danger' => $ex->getMessage()
                    ));
                }
                
                $this->_redirect("proposta/");
            }
        }
        
    }

    /**
     * Aprovar uma proposta 
     */
    public function aprovarAction() {
        
        $this->_helper->viewRenderer->setNoRender();
        
        $proposta_id = $this->getRequest()->getParam("proposta");
        
        if (!$proposta_id) {
            $this->_helper->flashMessenger->addMessage(array(
                "danger" => "Parâmetro incorreto!"
            ));
            $this->_redirect("proposta/");
        }
        
        /**
         * Busca dados da proposta
         */        
        $modelProposta = new Model_DbTable_Proposta();
        $proposta = $modelProposta->getById($proposta_id);
        
        if (!$proposta) {
            $this->_helper->flashMessenger->addMessage(array(
                "danger" => "Proposta não encontrada!"
            ));
            $this->_redirect("proposta/");
        }
        
        try {
            $modelProposta->updateById(array("proposta_status" => self::STATUS_APROVADA), $proposta_id);
            
            $this->_helper->flashMessenger->addMessage(array(
                'success' => 'Proposta aprovada com sucesso!'
            ));
            
        } catch (Exception $ex) {
            $this->_helper->flashMessenger->addMessage(array(
                'danger' => $ex->getMessage()
            ));
        }
        
        $this->_redirect("proposta/");
        
        // possibilidade de criar o projeto automaticamente
        
    }

    /**
     * Editar uma proposta
     */
    public function editarAction() {
        
    }
    
    /**
     * Excluir uma proposta (somente exclusao logica - status: Excluída)
     */
    public function excluirAction() {
        
    }

    /**
     * 
     */
    public function detalhesAction() {
        
        $proposta_id = $this->getRequest()->getParam("proposta");
        
        if (!$proposta_id) {
            $this->_helper->flashMessenger->addMessage(array(
                "danger" => "Parâmetro incorreto!"
            ));
            $this->_redirect("proposta/");
        }
        
        /**
         * Busca dados da proposta
         */        
        $modelProposta = new Model_DbTable_Proposta();
        $proposta = $modelProposta->getById($proposta_id);
        
        if (!$proposta) {
            $this->_helper->flashMessenger->addMessage(array(
                "danger" => "Proposta não encontrada!"
            ));
            $this->_redirect("proposta/");
        }
        
        $this->view->proposta = $proposta;
        
    }
    
    /**
     * 
     */
    public function ajaxPropostaAction() {

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        
        $proposta_id = (int)$this->getRequest()->getParam("proposta_id");
        
        $modelProposta = new Model_DbTable_Proposta();
        $proposta = $modelProposta->getById($proposta_id);
        
        $return = array('success' => 0);
        if ($proposta) {
            $return['success'] = 1;
            $return['proposta'] = $proposta->toArray();
        } 
        
        echo Zend_Json_Encoder::encode($return);
        
    }

    /**
     * 
     * @return string
     */
    private function getNumeroProposta() {
        $proposta_numero = "";
        
        $ano = date("y");
        $modelProposta = new Model_DbTable_Proposta();
        $last_id = (int)$modelProposta->getLastInsertedId();
        
        // formatando
        $last_id = str_pad(++$last_id, 3, "0", STR_PAD_LEFT);
        
        $proposta_numero .= $last_id.'/'.$ano;
        
        return $proposta_numero;
    }
    
    private function atualizaStatus() {
        $modelProposta = new Model_DbTable_Proposta();                
        $propostas = $modelProposta->fetchAll();
        
        $zendDateNow = new Zend_Date();
        
        foreach ($propostas as $proposta) {
            $zendDateVencimento = new Zend_Date($proposta->proposta_vencimento);
            
            if ($zendDateVencimento->isEarlier($zendDateNow)) {                
                // atualiza o status
                $update = array('proposta_status' => self::STATUS_VENCIDA);
                try {
                    $modelProposta->updateById($update, $proposta->proposta_id);
                } catch (Exception $ex) {
                    continue;
                }
                
            }
            
        }        
        
    }
    
}
