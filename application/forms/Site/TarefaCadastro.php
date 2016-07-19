<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TarefaCadastro
 *
 * @author Fernando
 */
class Form_Site_TarefaCadastro  extends App_Forms_Form {
    
    public function init() {
        
        /**
         * projeto_id
         */
        $modelProjeto = new Model_DbTable_Projeto();
        $projeto_id = new Zend_Form_Element_Select("projeto_id");
        $projeto_id->setLabel("Projeto: ");
        $projeto_id->setAttribs(array(
            'class' => 'form-control'
        ));
        $projeto_id->setMultiOptions($modelProjeto->fetchPairs());
        $this->addElement($projeto_id);        
        
        /**
         * tarefa_nome
         */
        $tarefa_nome = new Zend_Form_Element_Text("tarefa_nome");
        $tarefa_nome->setLabel("Título: ");
        $tarefa_nome->setAttribs(array(
            'class' => 'form-control'            
        ));
        $tarefa_nome->setRequired();
        $this->addElement($tarefa_nome);
        
        /**
         * tarefa_descricao
         */        
        $tarefa_descricao = new Zend_Form_Element_Textarea("tarefa_descricao");
        $tarefa_descricao->setLabel("Descrição: ");
        $tarefa_descricao->setAttribs(array(
            'class' => 'form-control',
            'rows' => 10
        ));
        $tarefa_descricao->setRequired();
        $this->addElement($tarefa_descricao);
        
        parent::init();
    }
    
}
