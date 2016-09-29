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
        $this->db->select('data.id,data.type,data.level,data.p_category,data.num,data.denom,category.category,category.description');
        $this->db->from('data');
        $this->db->join('category', 'data.p_category = category.id');

        return  $this->db->get();
    }

    public function get_data_where($id){
        $this->db->select('data.id,data.type,data.level,data.p_category,data.num,data.denom,category.category,category.description');
        $this->db->from('data');
        $this->db->join('category', 'data.p_category = category.id');
        $this->db->where('data.id',$id);
        $data = $this->db->get()->result();

        return $data = $data[0];

    }

    public function update_data($id,$db_data){
        $this->db->where('id', $id);
        $this->db->update("data",$db_data);
    }

    public function delete_data($id){
        
        $this->db->delete('data', array('id' => $id));
    }

}

