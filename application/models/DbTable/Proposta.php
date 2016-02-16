<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Proposta
 *
 * @author Fernando
 */
class Model_DbTable_Proposta extends App_Db_Table_Abstract {
    
    protected $_name = "proposta";
    protected $_primary = "proposta_id";
    
    public function getQueryAll() {
        $select = parent::getQueryAll();
        
        $select->joinInner(array("cliente"), 'proposta.cliente_id = cliente.cliente_id', array('*'));
        $select->joinInner(array("tipo_servico"), 'proposta.tipo_servico_id = tipo_servico.tipo_servico_id', array('*'));
        $select->joinLeft(array("proposta_tipo"), 'proposta.proposta_tipo_id = proposta_tipo.proposta_tipo_id', array('*'));
        
        return $select;
    }
    
    /**
     * get propostas pelo statis
     */
    public function getPropostasByStatus($status) {
        $select = $this->getQueryAll()
                ->where("proposta_status = ?", $status);
        
        return $this->fetchAll($select);
    }
    
}
