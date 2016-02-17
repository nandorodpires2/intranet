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
        
        $select->joinLeft(array("proposta"), "projeto.proposta_id = proposta.proposta_id", array(
            "proposta_numero"
        ));
        
        $select->joinLeft(array("proposta_tipo"), "proposta.proposta_tipo_id = proposta_tipo.proposta_tipo_id", array(
            "proposta_tipo_nome"
        ));
        
        $select->joinLeft(array("tipo_servico"), "proposta.tipo_servico_id = tipo_servico.tipo_servico_id", array(
            "tipo_servico_nome"
        ));
        
        return $select;
    }
    
}
