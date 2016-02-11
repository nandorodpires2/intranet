<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cep
 *
 * @author Fernando Rodrigues
 */
class App_Validate_Cep extends Zend_Validate_Abstract {
    
    const NOT_VALID = 'notValid';

    protected $_messageTemplates = array(
        self::NOT_VALID => 'CEP inválido',        
    );

    public function isValid($value, $context = null) {
        
        $api = Zend_Registry::get("config")->url->webservice->cep . $value;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);        
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);                       
        $enderecoJson = trim(utf8_encode($result));        
        
        // verifica se e valido
        if ($enderecoJson === '0') {
            $this->_error(self::NOT_VALID);
            return false;
        }
        return true;
        
    }
    
}
