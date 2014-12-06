<?php

class Application_Model_Detaljnije
{
    protected $db;
    
    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }          
    }
    
    function get_detaljnije($id_projekta){
        $projekti = new Application_Model_Projekti();
        
        $statement = $this->db->select()->from('projekti')
                ->where('id_projekta='.$id_projekta);
        
        $return = $this->db->fetchRow($statement);
        
        $return['slike'] = $projekti->get_slike_projekta($id_projekta);
        
        return $return;
    }

}

