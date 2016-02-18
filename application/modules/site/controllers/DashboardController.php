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
    
    const STATUS_AGUARDANDO_PAGAMENTO = "Aguardando pagamento";
    const STATUS_PAGO = "Pago";
    const STATUS_VENCIDO = "Vencido";
    
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
        $modelProjeto = new Model_DbTable_Projeto();
        $projetos = $modelProjeto->fetchAll();
        $this->view->projetos = $projetos;
        
        /**
         * Total Faturamento
         */
        $modelFaturamento = new Model_DbTable_Faturamento();
        $faturamentos = $modelFaturamento->fetchAll();
        
        $faturamento_total = 0;
        $receber = 0;
        $recebido = 0;
        foreach ($faturamentos as $faturamento) {
            
            if ($faturamento->faturamento_status === self::STATUS_AGUARDANDO_PAGAMENTO) {
                $receber += $faturamento->faturamento_valor;
            }
            
            if ($faturamento->faturamento_status === self::STATUS_PAGO) {
                $recebido += $faturamento->faturamento_valor;
            }
            
            $faturamento_total += $faturamento->faturamento_valor;
            
        }
        
        $this->view->faturamento_total = $faturamento_total;
        $this->view->receber = $receber;
        $this->view->recebido = $recebido;
        
        /**
         * Total de Horas Trbalhadas
         */
        $modelControleHoras = new Model_DbTable_ControleHoras();
        $horas = $modelControleHoras->fetchAll();
        
        $horas_trabalhadas = 0;
        foreach ($horas as $hora) {
            
            $zendDateInicio = new Zend_Date($hora->controle_horas_data_inicio);
            $zendDateFim = new Zend_Date($hora->controle_horas_data_fim);
            
            $horas_trabalhadas += $zendDateFim->sub($zendDateInicio)->get(Zend_Date::TIMESTAMP);              
            
        } 
        
        $this->view->horas = ceil($horas_trabalhadas / 3600);
        
    }
    
}
