<?php
class Kra_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

     public function add_kra($data,$kra){

        $this->db->trans_start();
        $this->db->insert("kra",$data);

        $insert_id = $this->db->insert_id();

        $kpi_list = $kra['kpi'];
        for ($i=0; $i < count(array_flatten($kra)) ; $i++){
            $this->db->set('kra', $insert_id);
            $this->db->set('kpi', $kpi_list[$i]);
            $this->db->insert('kpi_kra');
        }
        $this->db->trans_complete();
    }

    public function add_kra_category($data){
        $this->db->insert("kra_category",$data);
    }

    public function get_kra_category(){

        return $this->db->get('kra_category');

    }

    //Return details of KRAs
    public function get_kra_list(){
        $this->db->from('kra');
        $this->db->order_by("code", "asc");
        return $this->db->get();
    }

    //Return Detailed KRA with list of KPIs in each KRA
    public function get_kra(){

        //$this->db->select('kpi_id,kpi_description,type,level,p_category,num,denom,category,description');
        $this->db->from('kra');
        $this->db->join('kpi_kra', 'kpi_kra.kra = kra.kra_id');
        $this->db->join('kpi', 'kpi_kra.kpi = kpi.kpi_id');
        $this->db->order_by("code", "asc");
        //$this->db->where('kra_id',$id);
        return $this->db->get();

    }

    public function get_kra_simple(){
        //$this->db->select('kpi_id,kpi_description,type,level,p_category,num,denom,category,description');
        $this->db->from('kra');
//        $this->db->join('kpi_category', 'kpi.p_category = kpi_category.kpi_cat_id');

        return  $this->db->get();
    }

    public function get_kra_where($id){
        $this->db->from('kra');
        $this->db->join('kpi_kra', 'kpi_kra.kra = kra.kra_id');
        $this->db->join('kpi', 'kpi_kra.kpi = kpi.kpi_id');
        $this->db->where('kra_id', $id);
        $this->db->order_by("code", "asc");

        return $this->db->get();

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

    //This will get single KRA
    public function get_single_kra($id){
        $this->db->from('kra');
        $this->db->where('kra_id',$id);
        $kra = $this->db->get()->result();

        return $kra = $kra[0];
    }

    public function update_kra($id,$db_data,$kra){

        $this->db->trans_start();
        $this->db->select('kra');
        $this->db->where('kra_id', $id);
        $this->db->update("kra",$db_data);

        //Delete from kpi_kra records
        $this->db->where('kra', $id);
        $this->db->delete('kpi_kra');


        $kpi_list = $kra['kpi'];
        for ($i=0; $i < count(array_flatten($kra)) ; $i++){
            $this->db->set('kra', $id);
            $this->db->set('kpi', $kpi_list[$i]);
            $this->db->insert('kpi_kra');
        }

        $this->db->trans_complete();
    }

    //This will return array of KPIs in a KRA
    public function get_kpi_list($kra){
        $this->db->select('kpi');
        $this->db->from('kra');
        $this->db->join('kpi_kra', 'kpi_kra.kra = kra.kra_id');
        $this->db->where('kra_id',$kra);
        $kpi_list = $this->db->get();

        return $kpi_list ;


    }


}

