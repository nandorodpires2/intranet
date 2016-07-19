<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TarefaController
 *
 * @author Fernando
 */
class Site_TarefaController extends Zend_Controller_Action {
    
    public function init() {
        $this->view->headScript()->appendFile($this->view->baseUrl('views/js/tarefa/cadastro.js')); 
    }
    
    public function indexAction() {
        
        /**
         * Form cadastro
         */
        $formTarefaCadastro = new Form_Site_TarefaCadastro();
        $formTarefaCadastro->submit->setLabel("CADASTRAR");        
        $this->view->formTarefaCadastro = $formTarefaCadastro;
        
    }
    
    public function cadastroAction() {
     
        $this->_helper->viewRenderer->setNoRender();
        
        $formTarefaCadastro = new Form_Site_TarefaCadastro();
        $formTarefaCadastro->submit->setLabel("CADASTRAR");        
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($formTarefaCadastro->isValid($data)) {
                
                $data = $formTarefaCadastro->getValues();
                
                // bsucar o cliente do projeto
                $modelProjeto = new Model_DbTable_Projeto();
                $projeto = $modelProjeto->getById($data['projeto_id']);                
                $data['cliente_id'] = $projeto->cliente_id;
                                
                try {
                    $modelTarefa = new Model_DbTable_Tarefa();
                    $modelTarefa->insert($data);
                    
                    $this->_redirect("tarefa/");
                    
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                }                
                
            }
        }
        
    }
    
}
