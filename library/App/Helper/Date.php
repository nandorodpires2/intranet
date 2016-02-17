<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Date
 *
 * @author Fernando Rodrigues
 */
class App_Helper_Date {
    
    private $date;
    
    public function __construct($date = null) {
    
        if ($date) {
            $this->set_date($date);
        }
        
    }
    
    public function get_date() {
        return $this->date;
    }

    public function set_date($date) {
        $this->date = $date;
        return $this;
    }
    
    public static function getDateDb($date) {        
        $date = implode('-', array_reverse(explode('/', $date)));
        return $date;        
    }
    
    public static function getDateView($date) {
        $zendDate = new Zend_Date($date);        
        return $zendDate->get(Zend_Date::DATE_SHORT);
    }
    
    public static function getTime($date) {        
        $zendDate = new Zend_Date($date);
        return $zendDate->get(Zend_Date::TIME_SHORT);        
    }
    
    public static function getDate($date, $format = Zend_Date::DATE_SHORT) {        
        $zendDate = new Zend_Date($date);
        return $zendDate->get($format);        
    }
    
}
