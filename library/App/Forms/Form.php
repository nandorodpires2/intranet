<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Form
 *
 * @author Fernando Rodrigues
 */
class App_Forms_Form extends Zend_Form {
    
    
    
    public function init() {
        
        // submit default
        $submit = new Zend_Form_Element_Submit('submit');        
        $submit->setLabel("Enviar");
        $submit->setAttribs(array(
            'class' => 'btn btn-success btn-group-justified'
        ));
        
        $this->addElement($submit);        
                
    }    
    
    
}
