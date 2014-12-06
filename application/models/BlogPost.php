<?php

class Application_Model_BlogPost
{
    protected $db;
    
    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }          
    }

    function get_post($id_posta){
        $statement = $this->db->select()->from('postovi as p')
                ->join('blog_kategorije as bk', 'p.id_blog_kat=bk.id_blog_kat')
                ->where('id_posta='.$id_posta);
        
        return $this->db->fetchRow($statement);
    }
}

