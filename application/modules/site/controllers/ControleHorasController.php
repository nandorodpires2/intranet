<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleHorasController
 *
 * @author Fernando Rodrigues
 */
class Site_ControleHorasController extends Zend_Controller_Action {
    
    const STATUS_TRABALHANDO = "Trabalhando";
    const STATUS_PAUSADO = "Pausado";
    
    public function init() {
        $this->view->headScript()->appendFile($this->view->baseUrl('views/js/projeto/cadastro.js')); 
    }
    
    public function indexAction() {
        /**
         * Form cadastro
         */
        $formProjetoCadastro = new Form_Site_ProjetoCadastro();
        $formProjetoCadastro->submit->setLabel("CADASTRAR");        
        $this->view->formProjetoCadastro = $formProjetoCadastro;
        
        /**
         * Busca as projetos
         */
        $page = $this->getRequest()->getParam('page',1); //get curent page param, default 1 if param not available.        
        
        $modelProjeto = new Model_DbTable_Projeto();                
        $data = $modelProjeto->getQuery();
        
        $adapter = new Zend_Paginator_Adapter_DbSelect($data); //adapter
        $paginator = new Zend_Paginator($adapter); // setup Pagination
        $paginator->setItemCountPerPage(Zend_Registry::get("config")->resource->rowspage); // Items perpage, in this example is 10
        $paginator->setCurrentPageNumber($page); // current page
        
        //Zend_Paginator::setDefaultScrollingStyle('Sliding');
        //Zend_View_Helper_PaginationControl::setDefaultViewPartial('partials/pagination.phtml');
        
        $this->view->projetos = $paginator; 
        
                
    }
    
    /**
     * 
     */
    public function playAction() {
        $this->_helper->viewRenderer->setNoRender();        
        $projeto_id = $this->getRequest()->getParam("projeto_id");
        
        try {
            $this->setPlayPause($projeto_id, self::STATUS_TRABALHANDO);
            $this->_helper->flashMessenger->addMessage(array(
                'success' => "Projeto iniciado"
            ));
        } catch (Exception $ex) {
            $this->_helper->flashMessenger->addMessage(array(
                'danger' => $ex->getMessage()
            ));
        }        
        
        $this->_redirect("controle-horas/");
        
    }
    
    /**
     * 
     */
    public function pauseAction() {
        $this->_helper->viewRenderer->setNoRender();
        $projeto_id = $this->getRequest()->getParam("projeto_id");
        
        // dados do projeto
        $modelProjeto = new Model_DbTable_Projeto();
        $projeto = $modelProjeto->getById($projeto_id);
        
        //Zend_Debug::dump($projeto); die();
        
        try {
            $this->setPlayPause($projeto_id, self::STATUS_PAUSADO, $projeto->projeto_controle_horas);
            $this->_helper->flashMessenger->addMessage(array(
                'success' => "Projeto pausado"
            ));
        } catch (Exception $ex) {
            $this->_helper->flashMessenger->addMessage(array(
                'danger' => $ex->getMessage()
            ));
        }
        
        $this->_redirect("controle-horas/");
        
    }
    
    private function setPlayPause($projeto_id, $status, $projeto_controle_horas = null) {
        
        $modelProjeto = new Model_DbTable_Projeto();
        
        //Zend_Debug::dump($projeto_controle_horas); die();
        
        try {
            
            Zend_Db_Table_Abstract::getDefaultAdapter()->beginTransaction();
            
            // controle de horas
            $modelControleHoras = new Model_DbTable_ControleHoras();
            
            if ($status === self::STATUS_TRABALHANDO) {
                $controle_data = array(
                    "projeto_id" => $projeto_id,
                    "controle_horas_data_inicio" => date("Y-m-d H:i:s")
                );
                $controle_horas_id = $modelControleHoras->insert($controle_data);
            } elseif (self::STATUS_PAUSADO) {
                
                if (!$projeto_controle_horas) {
                    throw new Exception("Controle Horas ID não encontrado!");
                }
                
                $controle_data = array(
                    "controle_horas_data_fim" => date("Y-m-d H:i:s")
                );
                $controle_horas_id = $modelControleHoras->updateById($controle_data, $projeto_controle_horas);
            }
            
            
            
            $update = array(
                "projeto_status" => $status,
                "projeto_controle_horas" => $controle_horas_id
            );
            $modelProjeto->updateById($update, $projeto_id);
            
            Zend_Db_Table_Abstract::getDefaultAdapter()->commit();
            
            return true;
        } catch (Exception $ex) {
            Zend_Db_Table_Abstract::getDefaultAdapter()->rollBack();
            throw new Exception($ex->getMessage());
        }
        
    }
    
}
