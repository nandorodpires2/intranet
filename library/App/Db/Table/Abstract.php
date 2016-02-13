<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Abstract
 *
 * @author Fernando Rodrigues
 */
class App_Db_Table_Abstract extends Zend_Db_Table_Abstract {
    
    protected $_name;
    protected $_primary;
    
    protected function getQueryAll() {
        $select = $this->select()
                ->from($this->_name)
                ->setIntegrityCheck(false);
        
        return $select;
    }
    
    public function getQuery() {
        return $this->getQueryAll();
    }

    public function getById($id) {
        $primary = is_array($this->_primary) ? $this->_primary[1] : $this->_primary;
        $select = $this->getQueryAll()
                ->where($this->_name . '.' . $primary . " = ?", $id); 
        
        return $this->fetchRow($select);
        
    }

    public function updateById(array $dados, $id) {  
        
        $primary = is_array($this->_primary) ? $this->_primary[1] : $this->_primary;        
        $where = $this->getDefaultAdapter()->quoteInto($primary . " = ?", $id);                
        
        return parent::update($dados, $where);        
    }
    
    public function getByField($field, $value) {
        $select = $this->getQueryAll()
                ->where($field . " = ?", $value); 
        echo $select->__toString();
        return $this->fetchRow($select);
    }
    
    public function getCount($ativo = 1, $where = null) {        
        $select = $this->select()
                ->from(array($this->_name), array(
                    'count' => new Zend_Db_Expr("count(*)")
                ));                
        
        if ($where) {
            $select->where($where);
        }        
        
        return $this->fetchRow($select);
    }
    
}
