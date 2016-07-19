<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Projeto
 *
 * @author Fernando Rodrigues
 */
class Model_DbTable_Projeto extends App_Db_Table_Abstract {
    
    protected $_name = "projeto";
    protected $_primary = "projeto_id";
    
    public function getQueryAll() {
        $select = parent::getQueryAll();
        
        $select->joinInner(array("cliente"), "projeto.cliente_id = cliente.cliente_id", array(
            "cliente_tipo",
            "cliente_empresa",
            "cliente_nome",
            "cliente_email"
        ));
        
        return $select;
    }
    
    public function fetchPairs() {
        
        $options = array('Selecione o projeto...');
        
        $select = $this->getQueryAll();
        $select->order("cliente_empresa asc");
        $select->order("cliente_nome asc");
        
        $projetos = $this->fetchAll($select);
        
        foreach ($projetos as $projeto) {
            
            $cliente = $projeto->cliente_empresa ? $projeto->cliente_empresa : $projeto->cliente_nome;
            
            $options[$projeto->projeto_id] = $cliente . " -> " . $projeto->projeto_nome;
        }
        
        return $options;
        
    }
    
}
