<?php

class PretragaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function pretraziAction()
    {
        $request = $this->getRequest();
        if($request->isGet()){
            $kriterijum = $request->getParam('pretraga');
            
            $postovi = new Application_Model_Postovi();
            $get_post = $postovi->pretraga_postova($kriterijum);
            
            $this->view->get_post = $get_post;
            
            $blog = new Application_Model_Blog;
            $blog_kat = $blog->get_kategorije();
            $this->view->blog_kat = $blog_kat;
        }
    }


}





