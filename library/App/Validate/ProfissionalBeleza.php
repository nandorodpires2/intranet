<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProfissionalBeleza
 *
 * @author Fernando Rodrigues
 */
class App_Validate_ProfissionalBeleza extends Zend_Validate_Abstract {
    
    const NOT_VALID = 'notValid';

    protected $_messageTemplates = array(
        self::NOT_VALID => 'Este e-mail já está sendo utilizado!',
    );

    public function isValid($value, $context = null) {
                
        // verifica se já existe
        $modelProfissionalBeleza = new Model_DbTable_ProfissionalBeleza();
        $where[] = $modelProfissionalBeleza->getDefaultAdapter()->quoteInto("profissional_beleza_ativo = ?", 1);
        $where[] = $modelProfissionalBeleza->getDefaultAdapter()->quoteInto("profissional_beleza_email = ?", $value);
        $profissional = $modelProfissionalBeleza->fetchRow($where);
        
        if (null !== $profissional) {
            $this->_error(self::NOT_VALID);
            return false;
        }
        return true;
        
    }
}
