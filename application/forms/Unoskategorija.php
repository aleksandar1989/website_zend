<?php

class Application_Form_Unoskategorija extends Zend_Form
{

    public function init()
    {
        $this->setAction("");
        $this->setMethod("post");  
        $this->setAttrib('class', 'form-inline');
        
        $this->addElement('text', 'tbNazivKategorije', array(
                'label' => 'Naziv kategorije:',
                'required' => true,
                'filters'    => array('StringTrim','StripTags'),
        ));
        
        $this->addElement('submit', 'btnSubmit', array(
            'ignore'   => true,
            'label'    => 'Unesi'
        )); 
        
        $naziv_kategorije = $this->getElement('tbNazivKategorije');
        $naziv_kategorije->setAttrib("class","form-control");
        $naziv_kategorije->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                'isEmpty' => 'Ovo polje je obavezno.',
            )))
         ));
        
        $naziv_kategorije->setDecorators(array(  
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data'=>'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row'=>'HtmlTag'),array('tag'=>'tr'))  
        ));

        $submit = $this->getElement('btnSubmit');
        $submit->setAttrib("class","col-lg-2 btn btn-default");
        
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

