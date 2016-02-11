<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Salao
 *
 * @author Fernando Rodrigues
 */
class App_Validate_Salao extends Zend_Validate_Abstract {
    
    const NOT_VALID = 'notValid';

    protected $_messageTemplates = array(
        self::NOT_VALID => 'Este e-mail já está sendo utilizado!',
    );

    public function isValid($value, $context = null) {
                
        // verifica se já existe
        $modelSalao = new Model_DbTable_Salao();
        $salao = $modelSalao->getByField('salao_email', $value);
        
        if (null !== $salao) {
            $this->_error(self::NOT_VALID);
            return false;
        }
        return true;
        
    }
    
}
