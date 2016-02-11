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
        
    }
    
    public function indexAction() {
        
        $page = $this->getRequest()->getParam('page',1); //get curent page param, default 1 if param not available.
        $key = $this->getRequest()->getParam("cliente_busca", null);
        
        $modelCliente = new Model_DbTable_Cliente();                
        $data = $modelCliente->getClientes($key);
        
        $adapter = new Zend_Paginator_Adapter_DbSelect($data); //adapter
        $paginator = new Zend_Paginator($adapter); // setup Pagination
        $paginator->setItemCountPerPage(50); // Items perpage, in this example is 10
        $paginator->setCurrentPageNumber($page); // current page
        
        //Zend_Paginator::setDefaultScrollingStyle('Sliding');
        //Zend_View_Helper_PaginationControl::setDefaultViewPartial('partials/pagination.phtml');
        
        $this->view->clientes = $paginator;        
        
    }
    
}
