<?php

class PostoviController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $postovi = new Application_Model_Postovi();
        $get = $this->_request->getParams();
      
        
        $blog = new Application_Model_Blog();
        $get_kategorija = $blog->get_kategorija($get['id_blog_kat']);
        
        $postovi = $this->view->postovi = $postovi->get_postovi($get['id_blog_kat']);
        $this->view->kategorija = $get_kategorija['naziv_kategorije'];
        $this->view->id_blog_kat = $get['id_blog_kat'];
        
        $paginator = Zend_Paginator::factory($postovi);
        $currentPage = 1;
        
        $i = isset($get['id']) ? $get['id'] : 1;
        
        if(!empty($i)){ 
           $currentPage = $i;
        }
        
        $paginator->_custom = $get['id_blog_kat'];

        $paginator->setItemCountPerPage(3);
        $paginator->setPageRange(3);
        $paginator->setCurrentPageNumber($currentPage);
        
        $this->view->postovi = $paginator;
        
        $blog = new Application_Model_Blog;
        $blog_kat = $blog->get_kategorije();
        $this->view->blog_kat = $blog_kat;
    }


}

