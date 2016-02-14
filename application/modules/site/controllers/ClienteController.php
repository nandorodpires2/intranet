<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteController
 *
 * @author Fernando Rodrigues
 */
class Site_ClienteController extends Zend_Controller_Action {
    
    public function init() {
        $this->view->headScript()->appendFile($this->view->baseUrl('views/js/cliente/cadastro.js')); 
    }
    
    public function indexAction() {
        
        // form cliente cadastro
        $formClienteCadastro = new Form_Site_ClienteCadastro();
        $formClienteCadastro->submit->setLabel("CADASTRAR");
        $this->view->formClienteCadastro = $formClienteCadastro;
        
        $page = $this->getRequest()->getParam('page',1); //get curent page param, default 1 if param not available.
        $key = $this->getRequest()->getParam("cliente_busca", null);
        
        $modelCliente = new Model_DbTable_Cliente();                
        $data = $modelCliente->getClientes($key);
        
        $adapter = new Zend_Paginator_Adapter_DbSelect($data); //adapter
        $paginator = new Zend_Paginator($adapter); // setup Pagination
        $paginator->setItemCountPerPage(Zend_Registry::get("config")->resource->rowspage); // Items perpage, in this example is 10
        $paginator->setCurrentPageNumber($page); // current page
        
        //Zend_Paginator::setDefaultScrollingStyle('Sliding');
        //Zend_View_Helper_PaginationControl::setDefaultViewPartial('partials/pagination.phtml');
        
        $this->view->clientes = $paginator;        
        
    }
    
    public function cadastroAction() {
        
        // form cliente cadastro
        $formClienteCadastro = new Form_Site_ClienteCadastro();
        $formClienteCadastro->submit->setLabel("CADASTRAR");
        $this->view->formClienteCadastro = $formClienteCadastro;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            if ($formClienteCadastro->isValid($data)) {
                $data = $formClienteCadastro->getValues();
                
                try {
                    $modelCliente = new Model_DbTable_Cliente();
                    $modelCliente->insert($data);
                    $this->_redirect("cliente/");
                } catch (Exception $ex) {
                    die($ex->getMessage());
                }
                
            } 
            
        }
        
    }
    
    /**
     * Editar um cliente
     */
    public function editarAction() {
        
        $cliente_id = $this->getRequest()->getParam("cliente");
        
        /**
         * Busca os dados do cliente
         */
        $modelCliente = new Model_DbTable_Cliente();
        $cliente = $modelCliente->getById($cliente_id);
        
        //Zend_Debug::dump($cliente); die();
        
        // form cliente cadastro
        $formClienteCadastro = new Form_Site_ClienteCadastro();
        $formClienteCadastro->submit->setLabel("EDITAR");
        $formClienteCadastro->populate($cliente->toArray());
        $this->view->formClienteCadastro = $formClienteCadastro;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($formClienteCadastro->isValid($data)) {
                $data = $formClienteCadastro->getValues();
                
                try {
                    $modelCliente->updateById($data, $cliente_id);
                    
                    $this->_helper->flashMessenger->addMessage(array(
                        'success' => 'Cliente editado com sucesso!'
                    ));
                    
                } catch (Exception $ex) {
                    $this->_helper->flashMessenger->addMessage(array(
                        'danger' => $ex->getMessage()
                    ));
                }
                
                $this->_redirect("cliente/");
                
            }
        }
        
    }
    
    /**
     * Excluir um cliente
     */
    public function excluirAction() {
     
        $this->_helper->viewRenderer->setNoRender();
        
        $cliente_id = $this->getRequest()->getParam("cliente");
        
        try {
            $modelCliente = new Model_DbTable_Cliente();
            $modelCliente->updateById(array("cliente_ativo" => 0), $cliente_id);                  
            
            $this->_helper->flashMessenger->addMessage(array(
                'success' => "Cliente excluído com sucesso!"
            ));
            
        } catch (Exception $ex) {
            $this->_helper->flashMessenger->addMessage(array(
                'danger' => $ex->getMessage()
            ));
        }
        
        $this->_redirect("cliente/");
        
    }

    /**
     * Detalhes do cadastro e acoes para os registros
     */
    public function detalhesAction() {
        
        $cliente_id = $this->getRequest()->getParam("cliente");
        
        /**
         * Busca os dados do cliente
         */
        $modelCliente = new Model_DbTable_Cliente();
        $cliente = $modelCliente->getById($cliente_id);
        $this->view->cliente = $cliente;
        
        /**
         * Busca quantidade de propostas
         */
        
        /**
         * Busca quantidade de projetos
         */
        
        /**
         * Faturamentos
         */
        
        /**
         * Total de Horas
         */
        
    }
    
    /**
     * Enviar as credenciais para o cliente
     */
    public function enviarCredenciaisAction() {
        
    }
    
}
