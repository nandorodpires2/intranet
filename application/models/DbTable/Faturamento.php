<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Faturamento
 *
 * @author Fernando Rodrigues
 */
class Model_DbTable_Faturamento extends App_Db_Table_Abstract {
    
    protected $_name = "faturamento";
    protected $_primary = "faturamento_id";
    
    public function getQueryAll() {
        $select = parent::getQueryAll();
        
        $select->joinInner(array("cliente"), "faturamento.cliente_id = cliente.cliente_id", array(
            "cliente_tipo",
            "cliente_nome",
            "cliente_empresa"
        ));
        
        $select->joinLeft(array("projeto"), "faturamento.projeto_id = projeto.projeto_id", array(
            "projeto_nome"
        ));
        
        return $select;
    }
    
}
