<?php
class My_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function add_kpi_category($data){
        $this->db->insert("kpi_category",$data);
    }

    public function add_kpi($data){
        $this->db->insert("kpi",$data);
    }
    
    public function get_kpi_category(){

        return $this->db->get('kpi_category');

    }

    public function get_kpi_cat_where($id){
        $this->db->from('kpi_category');
        $this->db->where('kpi_cat_id',$id);
        $data = $this->db->get()->result();

        return $data = $data[0];
    }

    public function get_kpi(){
        $this->db->select('kpi_id,type,level,p_category,num,denom,category,description');
        $this->db->from('kpi');
        $this->db->join('kpi_category', 'kpi.p_category = kpi_category.kpi_cat_id');

        return  $this->db->get();
    }

    public function get_kpi_where($id){
        $this->db->select('kpi_id,type,level,p_category,num,denom,category,description');
        $this->db->from('kpi');
        $this->db->join('kpi_category', 'kpi.p_category = kpi_category.kpi_cat_id');
        $this->db->where('kpi_id',$id);
        $kpi = $this->db->get()->result();

        return $kpi = $kpi[0];

    }

    public function update_kpi($id,$db_data){
        $this->db->where('kpi_id', $id);
        $this->db->update("kpi",$db_data);
    }

    public function delete_kpi($id){

        $this->db->delete('kpi', array('kpi_id' => $id));
    }

    public function add_kra($data,$kra){

        $this->db->insert("kra",$data);

        $insert_id = $this->db->insert_id();
       // $i = count($kra,COUNT_RECURSIVE);

        $kra['kra'] = $insert_id;
        $kpi_list = $kra['kpi'];

        for($i =0; $i<count($kra,COUNT_RECURSIVE); $i++){
            $kra['kpi'] = $kpi_list[$i];
            echo $kra['kpi'];
            $this->db->insert("kpi_kra",$kra);
        }


    }
    
    public function insert_batch_kpi($data){
       print_r($data);
        $this->db->insert_batch('kpi_kra', $data);
        print_r($data);exit;
    }

}

