<?php

class Application_Form_Unosprojekata extends Zend_Form
{

    public function init()
    {
        $this->setAction("");
        $this->setMethod("post");  
        
        $kategorije = new Application_Model_Kategorije();
        
        $this->addElement('select','ddlKategorije',
        array(
                'label'        => 'Kategorija:',
                'required'     => true,
                'multiOptions' => $kategorije->options_kategorije()
            )
        );
        
        $this->addElement('text', 'tbNazivProjekta', array(
                'label' => 'Naziv projekta:',
                'required' => true,
                'filters'    => array('StringTrim','StripTags'),
        ));
        
        $this->addElement('textarea', 'tbOpisProjekta', array(
                'label' => 'Opis:',
                'required' => true,
                'filters'    => array('StringTrim','StripTags'),
        ));
        
        $this->addElement('text', 'tbLinkProjekta', array(
                'label' => 'Link projekta:',
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
        
        $naziv_projekta = $this->getElement('tbNazivProjekta');
        $naziv_projekta->setAttrib("class","text_input form-control");
        $naziv_projekta->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                'isEmpty' => 'Ovo polje je obavezno.',
            )))
         ));
        
        $naziv_projekta->setDecorators(array(  
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data'=>'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row'=>'HtmlTag'),array('tag'=>'tr'))  
        ));
        
        $kategorije = $this->getElement('ddlKategorije');
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
        
        
        $opis_projekta = $this->getElement('tbOpisProjekta');
        $opis_projekta->setAttrib("class","text_input form-control");
        $opis_projekta->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                'isEmpty' => 'Ovo polje je obavezno.',
            )))
         ));
        
        $opis_projekta->setDecorators(array(  
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data'=>'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row'=>'HtmlTag'),array('tag'=>'tr'))  
        ));
        
        $link_projekta = $this->getElement('tbLinkProjekta');
        $link_projekta->setAttrib("class","text_input form-control");
        $link_projekta->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                'isEmpty' => 'Ovo polje je obavezno.',
            )))
         ));
        
        $link_projekta->setDecorators(array(  
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data'=>'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row'=>'HtmlTag'),array('tag'=>'tr'))  
        ));
        
        $slika = $this->getElement('slika');
        $slika->setMultiFile(4); 
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
