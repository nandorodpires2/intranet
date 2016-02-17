<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FaturamentoController
 *
 * @author Fernando Rodrigues
 */
class Site_FaturamentoController extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
     
        /**
         * Form cadastro
         */
        $formFaturamentoCadastro = new Form_Site_FaturamentoCadastro();
        $formFaturamentoCadastro->submit->setLabel("CADASTRAR");        
        //$formFaturamentoCadastro->faturamento_numero->setValue($this->getNumeroFaturamento());
        $this->view->formFaturamentoCadastro = $formFaturamentoCadastro;
        
        /**
         * Busca as faturamentos
         */
        $page = $this->getRequest()->getParam('page',1); //get curent page param, default 1 if param not available.        
        
        $modelFaturamento = new Model_DbTable_Faturamento();                
        $data = $modelFaturamento->getQuery();
        
        $adapter = new Zend_Paginator_Adapter_DbSelect($data); //adapter
        $paginator = new Zend_Paginator($adapter); // setup Pagination
        $paginator->setItemCountPerPage(Zend_Registry::get("config")->resource->rowspage); // Items perpage, in this example is 10
        $paginator->setCurrentPageNumber($page); // current page
        
        //Zend_Paginator::setDefaultScrollingStyle('Sliding');
        //Zend_View_Helper_PaginationControl::setDefaultViewPartial('partials/pagination.phtml');
        
        $this->view->faturamentos = $paginator;
        
    }
    
    public function cadastroAction() {
        
        /**
         * Form cadastro
         */
        $formFaturamentoCadastro = new Form_Site_FaturamentoCadastro();
        $formFaturamentoCadastro->submit->setLabel("CADASTRAR");        
        //$formFaturamentoCadastro->faturamento_numero->setValue($this->getNumeroFaturamento());
        $this->view->formFaturamentoCadastro = $formFaturamentoCadastro;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();            
            if ($formFaturamentoCadastro->isValid($data)) {
                
            }
        }
        
    }
    
}
