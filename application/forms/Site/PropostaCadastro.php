<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PropostaCadastro
 *
 * @author Fernando Rodrigues
 */
class Form_Site_PropostaCadastro extends App_Forms_Form {
    
    public function init() {
        
        // proposta_numero
        $proposta_numero = new Zend_Form_Element_Text("proposta_numero");
        $proposta_numero->setLabel("Número: ");
        $proposta_numero->setAttribs(array(
            'class' => 'form-control',
        ));
        
        // cliente_id
        $cliente_id = new Zend_Form_Element_Select("cliente_id");
        $cliente_id->setLabel("Cliente: ");
        $cliente_id->setAttribs(array(
            'class' => 'form-control'
        ));
        $cliente_id->setRequired();
        $cliente_id->setDecorators(App_Forms_Decorators::$checkboxElementDecorators);
        $cliente_id->setMultiOptions($this->getClientes());
        
        // tipo_servico_id
        $tipo_servico_id = new Zend_Form_Element_Select("tipo_servico_id");
        $tipo_servico_id->setLabel("Tipo: ");
        $tipo_servico_id->setAttribs(array(
            'class' => 'form-control'
        ));
        $tipo_servico_id->setRequired();
        $tipo_servico_id->setDecorators(App_Forms_Decorators::$checkboxElementDecorators);
        $tipo_servico_id->setMultiOptions($this->getTipoServicos());
        
        // proposta_horas
        $proposta_horas = new Zend_Form_Element_Text("proposta_horas");
        $proposta_horas->setLabel("Horas: ");
        $proposta_horas->setAttribs(array(
            'class' => 'form-control'
        ));
        
        // proposta_valor
        $proposta_valor = new Zend_Form_Element_Text("proposta_valor");
        $proposta_valor->setLabel("Valor: ");
        $proposta_valor->setAttribs(array(
            'class' => 'form-control'
        ));
        
        // proposta_documento
        $proposta_documento = new Zend_Form_Element_File("proposta_documento");
        $proposta_documento->setLabel("Proposta:");
        $proposta_documento->addDecorators(App_Forms_Decorators::$ElementDecoratorFile);
        $proposta_documento->setAttribs(array(
            'class' => 'filestyle',                      
            'data-buttonText' => 'Selecione o PDF',
            'data-iconName' => 'fa fa-file'
        ));
        //$proposta_documento->setRequired();
        $proposta_documento->setDestination(Zend_Registry::get('config')->proposta->filepath);
        $proposta_documento->addValidators(array(
            array('Extension', false, 'pdf'),
            //array('Size', false, '100KB'),
        ));
        
        $this->addElements(array(
            $proposta_numero,
            $cliente_id,
            $tipo_servico_id,
            $proposta_horas,
            $proposta_valor,
            $proposta_documento
        ));
        
        parent::init();
    }
    
    private function getClientes() {
        $options = array("" => "Selecione...");
        
        $modelCliente = new Model_DbTable_Cliente();
        $clientes = $modelCliente->fetchAll();
        
        foreach ($clientes as $cliente) {
            $options[$cliente->cliente_id] = $cliente->cliente_empresa ? $cliente->cliente_empresa : $cliente->cliente_nome;
        }
        
        return $options;
    }
    
    private function getTipoServicos() {
        $options = array("" => "Selecione...");
        
        $modelTipoServico = new Model_DbTable_TipoServico();
        $tipos = $modelTipoServico->fetchAll();
        
        foreach ($tipos as $tipo) {
            $options[$tipo->tipo_servico_id] = $tipo->tipo_servico_nome;
        }
        
        return $options;
    }
    
}
