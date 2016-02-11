<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Decorators
 *
 * @author Fernando Rodrigues
 */
class App_Forms_Decorators extends Zend_Form {
    
    public static $simpleElementDecorators = array(
        array('ViewHelper'),
        array('Label', array('tag' => 'span', 'escape' => false, 'requiredPrefix' => '<span class="required">* </span>')),
        array('Description', array('tag' => 'div', 'class' => 'desc-item')),
        array('Errors', array('class' => 'alert alert-danger')),
        array('HtmlTag', array('tag' => 'div', 'class' => 'form-group'))
    );
        
    public static $ElementDecoratorFile = array(        
        array('Label', array('tag' => 'span', 'escape' => false, 'requiredPrefix' => '<span class="required">* </span>')),        
        array('Errors', array('class' => 'alert alert-danger')),
    );
        
    public static $customElementDecorators = array(
        'ViewHelper',
        'Errors',
        array(
            'Description',
            array('tag' => 'p','class' => 'description')
        ),
        array(
            'Label',
            array('separator' => ' ')
        ),
        array(
            array('data' => 'HtmlTag'),
            array('tag' => 'p')
        )
    );
    
    public static $ElementDecoratorsContato = array(
        array('ViewHelper'),
        //array('Label', array('tag' => 'span', 'escape' => false, 'requiredPrefix' => '<span class="required">* </span>')),
        array('Description', array('tag' => 'div')),
        array('Errors', 
            array('class' => 'alert alert-danger'),
        ),
        array('HtmlTag', array('tag' => 'div'))
    );
    
    public static $checkboxElementDecorators = array(
        array('ViewHelper'),
        array('Label', array('tag' => 'div', 'escape' => false, 'requiredPrefix' => '<span class="required">* </span>')),
        array('Description', array('tag' => 'div', 'class' => 'desc-item')),
        array('HtmlTag', array('tag'=>'div', 'class' => 'form-elements')),
        array('Errors', array('class' => 'alert alert-danger')),         
    );
    
    public static $checkboxElementDecorators_termo = array(
        array('ViewHelper'),
        array('Label', 
            array(
                'tag' => 'div', 
                'escape' => false, 
                'requiredPrefix' => '<span class="required">* </span>', 
                'placement' => 'APPEND', 
                'tag' => 'span',
                'style' => 'margin-top: 10px',
            )
        ),
        array('Description', array('tag' => 'div', 'class' => 'desc-item')),
        //array('HtmlTag', array('tag'=>'div', 'class' => 'form-elements')),
        array('Errors', array('class' => 'alert alert-danger')),        
    );
    
    
        
}
