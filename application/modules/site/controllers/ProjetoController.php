<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjetoController
 *
 * @author Fernando Rodrigues
 */
class Site_ProjetoController extends Zend_Controller_Action {

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
    
    public function cadastroAction() {
        
        /**
         * Form cadastro
         */
        $formProjetoCadastro = new Form_Site_ProjetoCadastro();
        $formProjetoCadastro->submit->setLabel("CADASTRAR");        
        $this->view->formProjetoCadastro = $formProjetoCadastro;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
                        
            if ($formProjetoCadastro->isValid($data)) {
                
                $formProjetoCadastro->removeElement("cliente");
                $data = $formProjetoCadastro->getValues();
                
                try {
                    $modelProjeto = new Model_DbTable_Projeto();
                    $modelProjeto->insert($data);
                    
                    $this->_helper->flashMessenger->addMessage(array(
                        'success' => 'Projeto cadastrado com sucesso!'
                    ));
                    
                } catch (Exception $ex) {
                    $this->_helper->flashMessenger->addMessage(array(
                        'danger' => $ex->getMessage()
                    ));
                }
                
                $this->_redirect("projeto/");
                
            }
        }
    }
        
}
