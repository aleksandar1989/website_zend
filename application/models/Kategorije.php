<?php

class Application_Model_Kategorije
{
    protected $db;
    
    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }          
    }

    function get_kategorije(){
        $statement = $this->db->select()->from('kategorije');
        return $this->db->fetchAll($statement);
    }
    
    function get_kategorija($id){
        $statement = $this->db->select()->from('kategorije')
             ->where('id_kategorije='.$id);
                
        return $this->db->fetchRow($statement);
    }
    
    function unesi_kategoriju($post){
        $data = array(
            "naziv_kategorije" => $post['tbNazivKategorije']
        );
        
        return $this->db->insert('kategorije', $data);
        
    }
    
    function obrisi_kategoriju($id){
        return $this->db->delete('kategorije', 'id_kategorije='.$id);
    }
    
    function options_kategorije(){
        $get = $this->get_kategorije();
        
        $options = array();
        $options[""] = "Izaberi...";
        
        foreach ($get as $value) {
            $options[$value['id_kategorije']] = $value['naziv_kategorije'];
        }
        return $options; 
   }
}

