<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthController
 *
 * @author Fernando Rodrigues
 */
class Site_AuthController extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
        
    }
    
    public function loginAction() {
        
        $formAuth = new Form_Site_Login();
        $formAuth->submit->setLabel("LOGAR");
        $this->view->formAuth = $formAuth;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($formAuth->isValid($data)) {
                
                $email = $formAuth->getValue('administrador_email');                
                $senha = $formAuth->getValue('administrador_senha'); 
                
                $db = Zend_Registry::get('db');               
                $authAdapter = new Zend_Auth_Adapter_DbTable($db);
                
                $authAdapter->setTableName('administrador')
                        ->setIdentityColumn('administrador_email')
                        ->setCredentialColumn('administrador_senha')
                        ->setIdentity($email)
                        ->setCredential(md5($senha));
                $authAdapter->getDbSelect()->where("administrador_ativo = ?", 1);

                $auth = Zend_Auth::getInstance();                
                $result = $auth->authenticate($authAdapter);
                
                if ($result->isValid()) { 
                    $this->_redirect("index/");
                } else {
                    die("error");
                }
                
            }
        }
        
    }
    
    public function logoutAction() {
        $this->_helper->layout->disableLayout(true);
        $this->_helper->viewRenderer->setNoRender(true);
        
        Zend_Auth::getInstance()->clearIdentity();
        Zend_Session::destroy();
        
        $this->_redirect("/site");
    }
    
}
