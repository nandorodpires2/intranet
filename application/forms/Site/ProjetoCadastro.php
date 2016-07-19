<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjetoCadastro
 *
 * @author Fernando Rodrigues
 */
class Form_Site_ProjetoCadastro extends App_Forms_Form {
    
    public function init() {
        
        // proposta_id
        /*
        $proposta_id = new Zend_Form_Element_Select("proposta_id");
        $proposta_id->setLabel("Proposta: ");
        $proposta_id->setAttribs(array(
            'class' => 'form-control'
        ));
        $proposta_id->setMultiOptions($this->getPropostas());
        */
        
        // cliente
        $cliente = new Zend_Form_Element_Select("cliente");
        $cliente->setLabel("Cliente: ");
        $cliente->setAttribs(array(
            'class' => 'form-control',
        ));
        $cliente->setRequired(false);
        $cliente->setDecorators(App_Forms_Decorators::$checkboxElementDecorators);
        $cliente->setMultiOptions($this->getClientes());
        
        // cliente_id
        $cliente_id = new Zend_Form_Element_Hidden("cliente_id");
        
        // projeto_nome        
        $projeto_nome = new Zend_Form_Element_Text("projeto_nome");
        $projeto_nome->setLabel("Nome: ");
        $projeto_nome->setAttribs(array(
            'class' => 'form-control'
        ));
        $projeto_nome->setRequired();
        $projeto_nome->setDecorators(App_Forms_Decorators::$checkboxElementDecorators);
        
        // projeto_horas
        /*
        $projeto_horas = new Zend_Form_Element_Text("projeto_horas");
        $projeto_horas->setLabel("Horas: ");
        $projeto_horas->setAttribs(array(
            'class' => 'form-control',
            'readonly' => true
        ));
        $projeto_horas->setRequired();
        $projeto_horas->setDecorators(App_Forms_Decorators::$checkboxElementDecorators);
        */
        
        // projeto_valor
        /*
        $projeto_valor = new Zend_Form_Element_Text("projeto_valor");
        $projeto_valor->setLabel("Valor: ");
        $projeto_valor->setAttribs(array(
            'class' => 'form-control',
            'readonly' => true
        ));
        $projeto_valor->setRequired();
        $projeto_valor->setDecorators(App_Forms_Decorators::$checkboxElementDecorators);
        */
        
        /**
         * Add Elements
         */
        $this->addElements(array(
            //$proposta_id,    
            $cliente,
            $cliente_id,
            $projeto_nome,
            //$projeto_horas,
            //$projeto_valor
        ));
        
        parent::init();
    }
    
    /**
     * 
     * @return type
     */
    private function getClientes() {
        $options = array("" => "Selecione...");
        
        $modelCliente = new Model_DbTable_Cliente();
        $clientes = $modelCliente->fetchAll();
        
        foreach ($clientes as $cliente) {
            $options[$cliente->cliente_id] = $cliente->cliente_empresa ? $cliente->cliente_empresa : $cliente->cliente_nome;
        }
        
        return $options;
    }
    
    private function getPropostas() {
        $options = array(
            "" => "Selecione...",
            0 => "Sem proposta"
        );
        
        $modelProposta = new Model_DbTable_Proposta();
        $propostas = $modelProposta->getPropostasByStatus("Aprovada");
        
        foreach ($propostas as $proposta) {
            $options[$proposta->proposta_id] = $proposta->proposta_numero;
        }
        
        return $options;
    }
    
}
