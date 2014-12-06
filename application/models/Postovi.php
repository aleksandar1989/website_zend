<?php

class Application_Model_Postovi
{
    protected $db;
    
    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }          
    }
    
    function get_postovi($id_kategorije){
        $statement = $this->db->select()->from('postovi')
                ->where('id_blog_kat='.$id_kategorije);
        
        return $this->db->fetchAll($statement);
    }
    
    function pretraga_postova($keyword){
        $statement = $this->db->select()->from('postovi as pos')
                ->where('naziv_posta LIKE ?', '%'.$keyword.'%')
                ->orWhere('opis_posta LIKE ?', '%'.$keyword.'%');
        return $this->db->fetchAll($statement);
    }

   
}

