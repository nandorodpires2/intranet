<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CPF
 *
 * @author Fernando Rodrigues
 */
class App_Form_Validate_CPF extends Zend_Validate_Abstract {
    
    const FORMAT = 'format';
    const ALREADY_USED = "alreadyUsed";
 
    protected $_messageTemplates = array(
        self::FORMAT => "CPF inválido!"
    );
 
    public function isValid($value)
    {
        $this->_setValue($value);
 
        if (!is_float($value)) {
            $this->_error(self::FORMAT);
            return false;
        }
 
        return true;
    }
}
