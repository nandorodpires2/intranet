<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteCadastro
 *
 * @author Fernando Rodrigues
 */
class Form_Site_ClienteCadastro extends App_Forms_Form {
    
    public function init() {
        
        // cliente_empresa
        $cliente_empresa = new Zend_Form_Element_Text("cliente_empresa");
        $cliente_empresa->setLabel("Empresa:");
        $cliente_empresa->setAttribs(array(
            'class' => 'form-control'
        ));
        
        // cliente_nome
        $cliente_nome = new Zend_Form_Element_Text("cliente_nome");
        $cliente_nome->setLabel("Contato:");
        $cliente_nome->setRequired();
        $cliente_nome->setDecorators(App_Forms_Decorators::$simpleElementDecorators);
        $cliente_nome->setAttribs(array(
            'class' => 'form-control'
        ));
        
        // cliente_email
        $cliente_email = new Zend_Form_Element_Text("cliente_email");
        $cliente_email->setLabel("E-mail:");
        $cliente_email->setRequired();
        $cliente_email->setDecorators(App_Forms_Decorators::$simpleElementDecorators);
        $cliente_email->setAttribs(array(
            'class' => 'form-control'
        ));
        
        // cliente_telefone
        $cliente_telefone = new Zend_Form_Element_Text("cliente_telefone");
        $cliente_telefone->setLabel("Telefone:");
        $cliente_telefone->setAttribs(array(
            'class' => 'form-control'
        ));
        
        // cliente_celular
        $cliente_celular = new Zend_Form_Element_Text("cliente_celular");
        $cliente_celular->setLabel("Celular:");
        $cliente_celular->setAttribs(array(
            'class' => 'form-control'
        ));
        
        // cliente_cidade
        $cliente_cidade = new Zend_Form_Element_Text("cliente_cidade");
        $cliente_cidade->setLabel("Cidade:");
        $cliente_cidade->setAttribs(array(
            'class' => 'form-control'
        ));
        
        // cliente_estado
        $cliente_estado = new Zend_Form_Element_Select("cliente_estado");
        $cliente_estado->setLabel("Estado:");
        $cliente_estado->setAttribs(array(
            'class' => 'form-control'
        ));
        $cliente_estado->setMultiOptions($this->getEstados());
        
        /**
         * Add elements
         */
        $this->addElements(array(
            $cliente_empresa,
            $cliente_nome,
            $cliente_email,
            $cliente_telefone,
            $cliente_celular,            
            $cliente_cidade,
            $cliente_estado
        ));
        
        parent::init();
    }
    
    private function getEstados() {
        
        $options = array("" => "Selecione...");
        
        $modelEstado = new Model_DbTable_Estado();
        $estados = $modelEstado->fetchAll();
        
        foreach ($estados as $estado) {
            $options[$estado->estado_sigla] = $estado->estado_nome;
        }
        
        return $options;
        
    }
    
}
