<?php

class Application_Model_Projekti
{
    protected $db;
    
    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }          
    }

    function get_projekti(){
        
        $statement = $this->db->select()->from('projekti');
        return $this->db->fetchAll($statement);
    }
    
    function get_slike_projekta($id){
        $statement = $this->db->select()->from('projekti as p')
                ->join('slike_projekata as s','p.id_projekta=s.id_projekta')
                ->where('p.id_projekta='.$id);
        
        return $this->db->fetchAll($statement);
             
    }
    
    function unesi_projekat($post){
        $data = array(
            "id_kategorije" => $post['ddlKategorije'],
            "naziv_projekta" => $post['tbNazivProjekta'],
            "opis_projekta" => $post['tbOpisProjekta'],
            "link_projekta" => $post['tbLinkProjekta'],
            "vreme_unosa" => time()
        );
        
        if($this->db->insert('projekti', $data)){
            return $this->db->lastInsertId();
        }else{
            return 0;
        }
    }
    
    function unesi_sliku_projekta($id_projekta, $naziv){
         $data = array(
            "id_projekta" => $id_projekta,
            "naziv_slike" => $naziv
        );
        
        return $this->db->insert('slike_projekata', $data);
    }
    
    function obrisi_projekat($id_projekta){
        $get_slike = $this->get_slike_projekta($id_projekta);
        foreach ($get_slike as $slika) {
            unlink('images/portfolio/'.$slika['naziv_slike']);
        }
        
        $this->db->delete("slike_projekata","id_projekta=".$id_projekta); 
        $this->db->delete("projekti","id_projekta=".$id_projekta); 
        
    }
    
    function izmeniprojekat($post){
        $data = array(
            'naziv_projekta' => $post['naziv'],
            'opis_projekta' => $post['opis'],
            'link_projekta' => $post['link']
            );
        
        return $this->db->update('projekti', $data, "id_projekta=".$post['id']);
    }
}

