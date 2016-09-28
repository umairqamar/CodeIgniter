<?php
class My_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function add_category($data){
        $this->db->insert("category",$data);
    }

    public function add_data($data){
        $this->db->insert("data",$data);
    }
    
    public function get_category(){
        return $this->db->get('category');  
    }
    
    public function get_data(){
        $this->db->from('data');
        $this->db->join('category', 'data.p_category = category.id');

        return  $this->db->get();
    }

}

