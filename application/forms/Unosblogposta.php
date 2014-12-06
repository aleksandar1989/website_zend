<?php

class Application_Form_Unosblogposta extends Zend_Form
{

    public function init()
    {
        $this->setAction("");
        $this->setMethod("post");  
        
        $blog = new Application_Model_Blog();
        
        $this->addElement('select','ddlBlogKategorije',
        array(
                'label'        => 'Blog kategorija:',
                'required'     => true,
                'multiOptions' => $blog->options_blog_kat()
            )
        );
        
        $this->addElement('text', 'tbNazivPosta', array(
                'label' => 'Naziv posta:',
                'required' => true,
                'filters'    => array('StringTrim','StripTags'),
        ));
        
        $this->addElement('textarea', 'tbOpisPosta', array(
                'label' => 'Opis:',
                'required' => true,
                'filters'    => array('StringTrim','StripTags'),
        ));
        
        
        $this->addElement('file', 'slika', array(
            'label'         => 'Slika: ',
            'validators'    => array(
                array('extension', true, array(
                    'extention' => 'jpg,png,gif',
                    'messages'  => array(
                        Zend_Validate_File_Extension::NOT_FOUND =>
                            'Pogrešan format slike.',
                        Zend_Validate_File_Extension::FALSE_EXTENSION =>
                            'Pogrešan format slike.'))))
        ));
        
        $this->addElement('submit', 'btnSubmit', array(
            'ignore'   => true,
            'label'    => 'Unesi'
        )); 
        
        $naziv_posta = $this->getElement('tbNazivPosta');
        $naziv_posta->setAttrib("class","text_input form-control");
        $naziv_posta->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                'isEmpty' => 'Ovo polje je obavezno.',
            )))
         ));
        
        $naziv_posta->setDecorators(array(  
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data'=>'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row'=>'HtmlTag'),array('tag'=>'tr'))  
        ));
        
        $kategorije = $this->getElement('ddlBlogKategorije');
        $kategorije->setAttrib("class","text_input form-control");
        $kategorije->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                'isEmpty' => 'Ovo polje je obavezno.',
            )))
         ));
        
        $kategorije->setDecorators(array(  
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data'=>'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row'=>'HtmlTag'),array('tag'=>'tr'))  
        ));
        
        
        $opis_posta = $this->getElement('tbOpisPosta');
        $opis_posta->setAttrib("class","text_input form-control ckeditor");
        $opis_posta->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                'isEmpty' => 'Ovo polje je obavezno.',
            )))
         ));
        
        $opis_posta->setDecorators(array(  
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data'=>'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row'=>'HtmlTag'),array('tag'=>'tr'))  
        ));
        
        
        $slika = $this->getElement('slika');
//        $slika->setMultiFile(4); 
        $slika->setDecorators(array(
            'File',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        $submit = $this->getElement('btnSubmit');
        $submit->setAttrib("class","btn btn-primary");
        
        $submit->setDecorators(array(
               'ViewHelper',
               'Description',
               'Errors', array(array('data'=>'HtmlTag'), array('tag' => 'td',
               'colspan'=>'2','align'=>'right')),
               array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
        ));
        
        //uvek na kraju mora ovo
        $this->setDecorators(array(
            'FormElements',
            array(array('data'=>'HtmlTag'),array('tag'=>'table', 'class' => 'table table-bordered table-hover table-striped tablesorter')),
            'Form'
        )); 
    }


}

