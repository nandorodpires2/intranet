<?php

class Site_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_redirect("dashboard/");
    }

    public function indexAction()
    {
        
    }

}

