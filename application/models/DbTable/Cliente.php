<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author Fernando Rodrigues
 */
class Model_DbTable_Cliente extends App_Db_Table_Abstract {
    
    protected $_name = "cliente";
    protected $_primary = "cliente_id";
    
    public function getQueryAll() {
        $select = parent::getQueryAll();
        return $select;
    }
    
    public function getClientes($key = null) {
        
        $select = $this->getQueryAll();
                
        if ($key) {
            
        }
        
        return $select;                 
        
    }
    
}
