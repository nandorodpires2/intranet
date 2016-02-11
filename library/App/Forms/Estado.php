<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estado
 *
 * @author Fernando Rodrigues
 */
class App_Forms_Estado extends Zend_Form {
    
    protected $elementName;
    
    public function __construct($elementName = null) {
        $this->elementName = $elementName;
    }

    public function init() {                
        parent::init();
    }
    
    public function elementEstado() {
        $estado_id = new Zend_Form_Element_Text($this->elementName);        
        //$estado_id->setMultiOptions($this->getEstados());
        
        return $estado_id;
    }

    protected function getEstados() {
        $options = array('' => 'Selecione o Estado');
        
        $modelEstado = new Model_DbTable_Estado();
        $estados = $modelEstado->fetchAll();
        
        foreach ($estados as $estado) {
            $options[$estado->estado_id] = $estado->estado_nome;
        }
        
        return $options;
    }
    
}
