<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author Fernando Rodrigues
 */
class Plugin_Auth extends Zend_Controller_Plugin_Abstract {
    
    protected $_auth;

    public function preDispatch(Zend_Controller_Request_Abstract $request) {        
        $this->_auth = Zend_Auth::getInstance();
        
        if (!$this->_auth->hasIdentity()) {
            $request->setControllerName("auth")
                    ->setActionName("login")
                    ->setDispatched();
        }
        
    }
    
}
