<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Andamento
 *
 * @author Fernando Rodrigues
 */
class Zend_View_Helper_Andamento extends Zend_View_Helper_Abstract {

    public function andamento($projeto_id) {
        
        $porcentagem = 0;        
        $trabalhados = 0;
        $horas_projeto = 0;
        $horas_trabalhadas = 0;
        
        // dados do projeto
        $modelProjeto = new Model_DbTable_Projeto();
        $projeto = $modelProjeto->getById($projeto_id);
        $horas_projeto = $projeto->projeto_horas;
        
        $modelControleHoras = new Model_DbTable_ControleHoras();        
        $horas = $modelControleHoras->fetchAll("projeto_id = {$projeto_id}");
        
        foreach ($horas as $hora) {
            
            $zendDateInicio = new Zend_Date($hora->controle_horas_data_inicio);
            $zendDateFim = new Zend_Date($hora->controle_horas_data_fim);
            
            $trabalhados += $zendDateFim->sub($zendDateInicio)->get(Zend_Date::TIMESTAMP);              
            
        }        
        
        // converte horas trabalhadas para horas
        $horas_trabalhadas = $trabalhados / 3600;
        
        if ($horas_trabalhadas < 1) {
            return 0;
        }
        
        if ($horas_projeto == 0) {
            return 100;
        }
        
        $porcentagem = number_format(($horas_trabalhadas * 100) / $horas_projeto, 2, '.', '');
        
        return $porcentagem;
        
    }
    
}
