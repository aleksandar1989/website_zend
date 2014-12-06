<?php

class BlogController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $blog = new Application_Model_Blog;
        $postovi = $blog->get_postovi();
        
        $blog_kat = $blog->get_kategorije();
        $this->view->blog_kat = $blog_kat;

        $paginator = Zend_Paginator::factory($postovi);
        $currentPage = 1;
        $get = $this->_request->getParams();
        
        $i = isset($get['id']) ? $get['id'] : 1;
        if(!empty($i)){ 
            $currentPage = $i;
        }   

        $paginator->setItemCountPerPage(3);
        $paginator->setPageRange(3);
        $paginator->setCurrentPageNumber($currentPage);
        
        $this->view->postovi = $paginator;
        
        
        
        
    }

   


}



