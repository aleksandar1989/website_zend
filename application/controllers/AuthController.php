<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        $this->_helper->layout->disableLayout();

  
        $form = new Application_Form_Login();
        
        $logovan=Zend_Auth::getInstance();
        
        if(!$logovan->hasIdentity()){
            $this->view->form=$form;
        }
        
         if ($this->_request->isPost("btnSubmit")) {
            if($this->view->form->isValid($this->_request->getPost())){
                                
                $auth_adapter = $this->getAuthAdapter();
                // get values from login form
                $user_email = $this->view->form->getValue('tbKorisnickoIme');
                $user_pass = md5($this->view->form->getValue('tbLozinka'));
                // pass to the adapter the submitted email and password
                $auth_adapter->setIdentity($user_email);
                $auth_adapter->setCredential($user_pass);
								
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($auth_adapter);
                // check Is the user a valid one
                if ($result->isValid()) {
		//get information about the user from database
                    $user_info = $auth_adapter->getResultRowObject(null,'lozinka');
		// write information in the auth storage
                    $auth_storage = $auth->getStorage();
                    $auth_storage->write($user_info);

                    $this->_redirect('/admin');
//                    if($user_email == "admin"){
//                        $this->_redirect('/admin');
//                    }else{
//                        $this->_redirect('/');
//                    }

                } else {                    
                    $this->view->errorMessage = "Pogrešni podaci!";
                }
                
            }            
        }
    }

    protected function getAuthAdapter()
    {
    	
        $auth_adapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $auth_adapter->setTableName('korisnici');
        $auth_adapter->setIdentityColumn('korisnicko_ime');
        $auth_adapter->setCredentialColumn('lozinka');
        $select = $auth_adapter->getDbSelect();
        //$select->where('Aktivan = 1');
        
        return $auth_adapter;
    }

    public function logoutAction()
    {
         // Clear identity and redirect
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/');
    }


}





