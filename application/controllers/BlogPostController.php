<?php

class BlogPostController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $blog_post = new Application_Model_BlogPost();
        
        $get = $this->_request->getParams();
        
        $this->view->blog_post = $blog_post->get_post($get['id_posta']);
        
        $blog = new Application_Model_Blog;
        $blog_kat = $blog->get_kategorije();
        $this->view->blog_kat = $blog_kat;
        
        $kategorija = new Application_Model_Kategorije();
        $get_kategorija = $kategorija->get_kategorija($get['id_posta']);
        $this->view->kategorija = $get_kategorija['naziv_kategorije'];
        
    }


}

