<?php

class DetaljnijeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $detaljnije = new Application_Model_Detaljnije();
        
        $get = $this->_request->getParams();
        
        $this->view->detaljnije = $detaljnije->get_detaljnije($get['id_projekta']);
        
       
    }


}

