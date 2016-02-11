<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioEmail
 *
 * @author Fernando Rodrigues
 */
class App_Validate_UsuarioEmail extends Zend_Validate_Abstract {
    
    const ALREADY_EXISTS = "alreadyExists";

    protected $_messageTemplates = array(    
        self::ALREADY_EXISTS => "Já existe um cadastro com este e-mail"
    );

    public function isValid($value, $context = null) {
        
        // verifica se já existe
        $modelSalao = new Model_DbTable_Usuario();
        $salao = $modelSalao->getByField("usuario_email", $value);
        
        if (null !== $salao) {
            $this->_error(self::ALREADY_EXISTS);
            return false;
        }
        return true;
        
    }
    
}
