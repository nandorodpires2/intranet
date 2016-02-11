<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SalaoController
 *
 * @author Fernando Rodrigues
 */
class App_Controller_SalaoController extends Zend_Controller_Action {
    
    private $identity;

    public function init() {        
        $this->identity = Zend_Auth::getInstance()->getIdentity();
    }
    
}
