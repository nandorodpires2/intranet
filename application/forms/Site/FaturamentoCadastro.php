<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FaturamentoCadastro
 *
 * @author Fernando Rodrigues
 */
class Form_Site_FaturamentoCadastro extends App_Forms_Form {
    
    public function init() {
        
        // projeto_id
        $projeto_id = new Zend_Form_Element_Select("projeto_id");
        $projeto_id->setLabel("Projeto: ");
        $projeto_id->setAttribs(array(
            'class' => 'form-control'
        ));
        $projeto_id->setMultiOptions($this->getProjetos());
        
        // cliente_id
        $cliente_id = new Zend_Form_Element_Select("cliente_id");
        $cliente_id->setLabel("Cliente: ");
        $cliente_id->setAttribs(array(
            'class' => 'form-control'
        ));
        $cliente_id->setRequired(false);
        $cliente_id->setDecorators(App_Forms_Decorators::$checkboxElementDecorators);
        $cliente_id->setMultiOptions($this->getClientes());
                
        // faturamento_valor
        $faturamento_valor = new Zend_Form_Element_Text("faturamento_valor");
        $faturamento_valor->setLabel("Valor do Boleto: ");
        $faturamento_valor->setAttribs(array(
            'class' => 'form-control'
        ));
        //$faturamento_valor->setRequired();
        $faturamento_valor->setDecorators(App_Forms_Decorators::$checkboxElementDecorators);
        
        // faturamento_descricao
        $faturamento_descricao = new Zend_Form_Element_Text("faturamento_descricao");
        $faturamento_descricao->setLabel("Descrição: ");
        $faturamento_descricao->setAttribs(array(
            'class' => 'form-control'
        ));
        $faturamento_descricao->setRequired();
        $faturamento_descricao->setDecorators(App_Forms_Decorators::$checkboxElementDecorators);
        
        // faturamento_nosso_numero
        $faturamento_nosso_numero = new Zend_Form_Element_Text("faturamento_nosso_numero");
        $faturamento_nosso_numero->setLabel("Nosso Nº: ");
        $faturamento_nosso_numero->setAttribs(array(
            'class' => 'form-control'
        ));
        //$faturamento_nosso_numero->setRequired();
        $faturamento_nosso_numero->setDecorators(App_Forms_Decorators::$checkboxElementDecorators);
        
        // faturamento_vencimento
        $faturamento_vencimento = new Zend_Form_Element_Text("faturamento_vencimento");
        $faturamento_vencimento->setLabel("Vencimento: ");
        $faturamento_vencimento->setAttribs(array(
            'class' => 'form-control'
        ));
        $faturamento_vencimento->setRequired();
        $faturamento_vencimento->setDecorators(App_Forms_Decorators::$checkboxElementDecorators);
        
        $this->addElements(array(            
            $projeto_id,
            $cliente_id,
            $faturamento_vencimento,
            $faturamento_valor,
            $faturamento_nosso_numero,
            $faturamento_descricao
        ));
        
        parent::init();
    }
    
    private function getProjetos() {
        $options = array("" => "Sem projeto");
        
        $modelProjeto = new Model_DbTable_Projeto();
        $projetos = $modelProjeto->fetchAll();
        
        foreach ($projetos as $projeto) {
            $options[$projeto->projeto_id] = $projeto->projeto_nome;
        }
        
        return $options;
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
    
}
