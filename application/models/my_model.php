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
        //print_r($kra);exit;
        $kpi_list = $kra['kpi'];
        for ($i=0; $i<=count($kra,COUNT_RECURSIVE);$i++){
            $this->db->query( "INSERT INTO kpi_kra (kra, kpi) VALUES ('$insert_id', '$kpi_list[$i]')");
        }



    }
    
    public function get_kra(){
        $this->db->from('kra');
        return  $this->db->get();
    }

    public function get_kra_where($id){
        //$this->db->select('kra_id,code,description,kpi_id,type,level,p_category,num,denom');
        $this->db->select('kra_id,kra.code,kra.description,kpi_kra.id,kpi.kpi_id,kpi.`type`,kpi.`level`,kpi.p_category,kpi.num,kpi.denom,kpi_category.category');
        $this->db->from('kra');
        $this->db->join('kpi_kra', 'kpi_kra.kra = kra.kra_id');
        $this->db->join('kpi', 'kpi.kpi_id = kpi_kra.kpi');
        $this->db->join('kpi_category', 'kpi.p_category = kpi_category.kpi_cat_id');
        $this->db->where('kra_id',$id);
        $kpi = $this->db->get()->result_array();

        return $kpi;
        //return $kpi = $kpi[0];

    }

    //This will delete a KRA
    public function delete_kra($id){
        //Delete from KRA table
        $this->db->where('kra_id', $id);
        if ($this->db->delete('kra')){
            //Also delete from kpi_kra table
            $this->db->where('kra', $id);
            $this->db->delete('kpi_kra');
        }

    }

    //This will delete single KPI from a KRA
    public function delete_kpi_kra($kra,$kpi){
        $this->db->where('kra', $kra);
        $this->db->where('kpi', $kpi);
        $this->db->delete('kpi_kra');
    }

}

