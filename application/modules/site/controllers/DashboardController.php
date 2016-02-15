<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DashboardController
 *
 * @author Fernando Rodrigues
 */
class Site_DashboardController extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
     
        /**
         * Total de clientes
         */
        $modelClientes = new Model_DbTable_Cliente();        
        $this->view->clientes = $modelClientes->fetchAll();
        
        /**
         * Total de propostas
         */
        $modelProposta = new Model_DbTable_Proposta();
        $propostas = $modelProposta->fetchAll();
        $this->view->propostas = $propostas;
        
        $total_horas_propostas = 0;
        $total_valor_propostas = 0;
        foreach ($propostas as $proposta) {
            $total_horas_propostas += $proposta->proposta_horas;
            $total_valor_propostas += $proposta->proposta_valor;
        }        
        $this->view->total_horas_proposta = $total_horas_propostas;
        $this->view->total_valor_proposta = $total_valor_propostas;        
        
        /**
         * Total de Projetos
         */
        $this->view->projetos = 0;
        
        /**
         * Total Faturamento
         */
        $this->view->faturamento = 0;
        
        /**
         * Total de Horas Trbalhadas
         */
        $this->view->horas = 0;
        
    }
    
}
