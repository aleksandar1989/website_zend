<?php

class Application_Model_Blog
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
        $statement = $this->db->select()->from('blog_kategorije');
        
        return $this->db->fetchAll($statement);
    }
            
    function get_postovi(){
        $statement = $this->db->select()->from('postovi as p')
                ->join('blog_kategorije as bk', 'p.id_blog_kat=bk.id_blog_kat');
        
        return $this->db->fetchAll($statement);

    }
    
    function get_kategorija($id){
        $statement = $this->db->select()->from('blog_kategorije')
             ->where('id_blog_kat='.$id);
                
        return $this->db->fetchRow($statement);
    }
    function unesi_blog_kategoriju($post){
        $data = array(
            'naziv_kategorije' => $post['tbNazivBlogKategorije']
        );
        
        return $this->db->insert('blog_kategorije', $data);
    }
    
    function obrisi_blog_kat($idKategorije){
        return $this->db->delete('blog_kategorije','id_blog_kat='.$idKategorije);
    }
    
    function options_blog_kat(){
        $get = $this->get_kategorije();
        $options = array();
        
        $options[""] = "Izaberi...";
        
        foreach ($get as $value){
            $options[$value['id_blog_kat']] = $value['naziv_kategorije'];
        }
        return $options;
    }
    
    function unesi_blog_post($post,$img){
        $data = array(
            'id_blog_kat' => $post['ddlBlogKategorije'],
            'naziv_posta' => $post['tbNazivPosta'],
            'opis_posta' => $post['tbOpisPosta'],
            'slika_posta' => $img,
            'vreme_unosa' => time()
        );
        
        return $this->db->insert('postovi', $data);
    }
    
    function obrisi_blog_post($post_id,$img){        
        if($this->db->delete('postovi', 'id_posta='.$post_id)){
            unlink("images/blog_post_image/".$img);
            return 1;
        }else{
            return 0;
        }     
    }
}

