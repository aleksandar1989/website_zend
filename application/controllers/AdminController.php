<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->layout->setLayout('admin_layout');
        
        $logovan=Zend_Auth::getInstance(); 
        $korisnik=$logovan->getIdentity();
        
        if(!$logovan->hasIdentity()){
            Zend_Auth::getInstance()->clearIdentity();
            $this->_redirect('/login');
        }
        
    }

    public function indexAction()
    {
        // action body
    }

    public function unoskategorijaAction()
    {
        $kategorije = new Application_Model_Kategorije();
        
        $forma = new Application_Form_Unoskategorija();
        
        $this->view->form = $forma;
        
        if($this->_request->isPost("btnSubmit")){
            if($this->view->form->isValid($this->_request->getPost())){
                $post = $this->_request->getParams();
                
                $this->view->status = $kategorije->unesi_kategoriju($post);
            }
        }
        $this->view->get_kategorije = $kategorije->get_kategorije();
    }

    public function obrisipodkategorijuAction()
    {
        $get = $this->_request->getParams();
    }

    public function obrisikategorijuAction()
    {
        $get = $this->_request->getParams();
        
        $kategorije = new Application_Model_Kategorije();
        
        $kategorije->obrisi_kategoriju($get['id']);
        $this->_redirect("/admin/unoskategorija");
    }

    public function unosprojekataAction()
    {
        $projekti = new Application_Model_Projekti();
        
        $form = new Application_Form_Unosprojekata();
        
        $this->view->form = $form;
        
        if($this->_request->isPost('btnSubmit')){
            if($this->view->form->isValid($this->_request->getPost())){
                $post = $this->_request->getParams();
                
                $id_projekta = $projekti->unesi_projekat($post);
                
                    if($id_projekta){  
                    $upload = new Zend_File_Transfer_Adapter_Http();
                
                    try {
                        $files = $upload->getFileInfo();                        
                        $change = new Application_Model_ChangeImage();
                        
                        foreach ($files as $key => $file) {
                            $change->tmp_name = $file['tmp_name'];
                            $change->name = $file['name'];
                            $change->destination = "images/portfolio";
                            $img = $change->upload();
                            
                            if(!empty($img)){
                                $projekti->unesi_sliku_projekta($id_projekta, $img);
                            }
                            
                        }
                        
                        $this->view->status = 1;


                    } catch (Zend_File_Transfer_Exception $e) {
                        $e->getMessage();
                        $this->view->status = 0;
                    }
                    
                }else{
                        $this->views->status = 0;
                    }
              
            }
        }
        
        $get_projekti = $projekti->get_projekti();
        $this->view->get_projekti = $get_projekti;
    }

    public function obrisiprojekatAction()
    {
        $get = $this->_request->getParams();
        
        $projekti = new Application_Model_Projekti();
        
        $projekti->obrisi_projekat($get['id']);
        
        $this->_redirect("/admin/unosprojekata");
    }

    public function izmeniprojekatAction()
    {
       $this->_helper->layout->disableLayout();
       $this->_helper->viewRenderer->setNoRender(TRUE);
        
       $post = $this->_request->getParams();
       $projekti = new Application_Model_Projekti;
        
       echo $projekti->izmeniprojekat($post);
       
      
    }

    public function unosblogkategorijeAction()
    {
        $blog = new Application_Model_Blog();
        $forma = new Application_Form_Unosblogkategorije();
        
        $this->view->form = $forma;
        
        if($this->_request->isPost("btnSubmit")){
            if($this->view->form->isValid($this->_request->getPost())){
                $post = $this->_request->getParams();
                $this->view->status = $blog->unesi_blog_kategoriju($post);
            }
        }
        
        $this->view->get_blog_kategorije = $blog->get_kategorije();
                
    }

    public function obrisiblogkategorijuAction()
    {
        $get = $this->_request->getParams();
        $blog = new Application_Model_Blog();
        
        
        $blog->obrisi_blog_kat($get['id']);
        $this->redirect('/admin/unosblogkategorije');
        
    }

    public function unosblogpostaAction()
    {
        $blog = new Application_Model_Blog();
        $forma = new Application_Form_Unosblogposta();
        
        $this->view->forma = $forma;
        
        if($this->_request->isPost("btnSubmit")){
            if($this->view->forma->isValid($this->_request->getPost())){
                $post = $this->_request->getParams();
               
                 $upload = new Zend_File_Transfer_Adapter_Http();
                 
                 try {
                    //$upload->receive();
                    $tmp = $upload->getFileInfo();
                    $slika = $tmp['slika'];
                    $change = new Application_Model_ChangeImage();
                    $change->tmp_name = $slika['tmp_name'];
                    $change->name = $slika['name'];
                    $change->destination = "images/blog_post_image";
                    $img = $change->upload();
                    
                    if($post){   
                        $this->view->status = $blog->unesi_blog_post($post, $img);
                        
                    }else{
                        $this->views->status = 0;
                    }
                    
                } catch (Zend_File_Transfer_Exception $e) {
                    $e->getMessage();
                }
                
            }
        }
        $this->view->get_posts = $blog->get_postovi();
    }

    public function obrisiblogpostAction()
    {
        $get = $this->_request->getParams();
        $blog = new Application_Model_Blog();
        
        $blog->obrisi_blog_post($get['id'],$get['slika_posta']);
        $this->redirect('/admin/unosblogposta');
        
    }


}























