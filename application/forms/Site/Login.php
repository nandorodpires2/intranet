<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Fernando Rodrigues
 */
class Form_Site_Login extends App_Forms_Form {
    
    public function init() {
        
        // administrador_email
        $administrador_email = new Zend_Form_Element_Text("administrador_email");
        $administrador_email->setLabel("E-mail: ");
        $administrador_email->setRequired();
        $administrador_email->setAttribs(array(
            'class' => 'form-control'
        ));
        
        // administrador_senha
        $administrador_senha = new Zend_Form_Element_Password("administrador_senha");
        $administrador_senha->setLabel("Senha: ");
        $administrador_senha->setRequired();
        $administrador_senha->setAttribs(array(
            'class' => 'form-control'
        ));
        
        $this->addElements(array(
            $administrador_email,
            $administrador_senha
        ));
        
        parent::init();
        
    }
    
}
