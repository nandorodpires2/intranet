<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjetoController
 *
 * @author Fernando Rodrigues
 */
class Site_ProjetoController extends Zend_Controller_Action {
    
    public function init() {
        $this->view->headScript()->appendFile($this->view->baseUrl('views/js/projeto/cadastro.js')); 
    }
    
    public function indexAction() {
        /**
         * Form cadastro
         */
        $formProjetoCadastro = new Form_Site_ProjetoCadastro();
        $formProjetoCadastro->submit->setLabel("CADASTRAR");        
        $this->view->formProjetoCadastro = $formProjetoCadastro;
                
    }
    
    public function cadastroAction() {
        
        /**
         * Form cadastro
         */
        $formProjetoCadastro = new Form_Site_ProjetoCadastro();
        $formProjetoCadastro->submit->setLabel("CADASTRAR");        
        $this->view->formProjetoCadastro = $formProjetoCadastro;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            Zend_Debug::dump($data); die();
            
            if ($formProjetoCadastro->isValid($data)) {
                $data = $formProjetoCadastro->getValues();
                
                try {
                    $modelProjeto = new Model_DbTable_Projeto();
                    $modelProjeto->insert($data);
                    
                    $this->_helper->flashMessenger->addMessage(array(
                        'success' => 'Projeto cadastrado com sucesso!'
                    ));
                    
                } catch (Exception $ex) {
                    $this->_helper->flashMessenger->addMessage(array(
                        'danger' => $ex->getMessage()
                    ));
                }
                
                $this->_redirect("projeto/");
                
            }
        }
    }
    
}
