<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Currency
 *
 * @author Fernando Rodrigues
 */
class App_Helper_Currency {
    
    public static function toCurrency($value) {        
        $zendCurrency = new Zend_Currency();
        return $zendCurrency->toCurrency($value);        
    }
    
}
