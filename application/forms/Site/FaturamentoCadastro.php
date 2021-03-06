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
                
        // faturamento_tipo
        $faturamento_tipo = new Zend_Form_Element_Select("faturamento_tipo");
        $faturamento_tipo->setLabel("Tipo: ");
        $faturamento_tipo->setAttribs(array(
            'class' => 'form-control'
        ));
        $faturamento_tipo->setRequired(false);
        $faturamento_tipo->setDecorators(App_Forms_Decorators::$checkboxElementDecorators);
        $faturamento_tipo->setMultiOptions(array(
            1 => 'Boleto',
            2 => 'Transferência'
        ));
        
        // faturamento_valor
        $faturamento_valor = new Zend_Form_Element_Text("faturamento_valor");
        $faturamento_valor->setLabel("Valor: ");
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
        
        // faturamento_nota_fiscal
        $faturamento_nota_fiscal = new Zend_Form_Element_File("faturamento_nota_fiscal");
        $faturamento_nota_fiscal->setLabel("Nota Fiscal:");
        $faturamento_nota_fiscal->addDecorators(App_Forms_Decorators::$ElementDecoratorFile);
        $faturamento_nota_fiscal->setAttribs(array(
            'class' => 'filestyle',                      
            'data-buttonText' => 'Selecione a Nota Fiscal',
            'data-iconName' => 'fa fa-file'
        ));
        //$faturamento_nota_fiscal->setRequired();
        $faturamento_nota_fiscal->setDestination(Zend_Registry::get('config')->notafiscal->filepath);
        $faturamento_nota_fiscal->addValidators(array(
            array('Extension', false, 'pdf'),
            //array('Size', false, '100KB'),
        ));
        
        $this->addElements(array(            
            $projeto_id,
            $cliente_id,
            $faturamento_tipo,
            $faturamento_vencimento,
            $faturamento_valor,
            $faturamento_nosso_numero,
            $faturamento_descricao,
            $faturamento_nota_fiscal
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
