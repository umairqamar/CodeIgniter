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
        $this->db->select('kpi_id,kpi_description,type,level,p_category,num,denom,category,description');
        $this->db->from('kpi');
        $this->db->join('kpi_category', 'kpi.p_category = kpi_category.kpi_cat_id');

        return  $this->db->get();
    }

    public function get_kpi_where($id){
        $this->db->select('kpi_id,kpi_description,type,level,p_category,num,denom,category,description');
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

    public function add_employee($data,$kra){
        $this->db->trans_start();
        $this->db->insert("employee",$data);

        $insert_id = $this->db->insert_id();

        $kra_list = $kra['kra'];

        for ($i=0; $i < count(array_flatten($kra)) ; $i++){
            $this->db->set('employee_id', $insert_id);
            $this->db->set('kra_id', $kra_list[$i]);
            $this->db->insert('employee_kra');
        }
        $this->db->trans_complete();
    }

    //Return details of Employees
    public function get_employee_list(){
        $this->db->from('employee');
        $this->db->order_by("employee_id", "asc");
        return $this->db->get();
    }

    public function get_employee_where($id){
        $this->db->from('employee');
        $this->db->join('employee_kra', 'employee.employee_id = employee_kra.employee_id');
        $this->db->join('kra', 'employee_kra.kra_id = kra.kra_id');
        $this->db->where('employee.employee_id', $id);
        $this->db->order_by("employee.employee_id", "asc");

        return $this->db->get();
        //return $kpi = $kpi[0];
    }

    public function delete_employee($id){
        //Delete from Employee table
        $this->db->where('employee_id', $id);
        if ($this->db->delete('employee')){
            //Also delete from employee_kra table
            $this->db->where('employee_id', $id);
            $this->db->delete('employee_kra');
        }
    }

    public function deactivate_employee($id){
        //Delete from Employee table
        $this->db->where('employee_id', $id);
        $this->db->set('is_active', '0');
        $this->db->insert('employee');

    }
    
    public function delete_kra_emp($emp,$kra){
        $this->db->where('employee_id', $emp);
        $this->db->where('kra_id', $kra);
        $this->db->delete('employee_kra');
    }

    public function get_single_employee($id){
        $this->db->from('employee');
        $this->db->where('employee_id',$id);
        $emp = $this->db->get()->result();

        return $emp = $emp[0];
    }

    //This will return KRAs in an employee
    public function get_selected_kra($employee){
        $this->db->select('kra_id');
        $this->db->from('employee_kra');
//        $this->db->join('employee_kra', 'employee_kra.kra_id = kra.kra_id');
        $this->db->where('employee_kra.employee_id',$employee);
        $kra_list = $this->db->get();

        return $kra_list ;


    }

    public function update_employee($id,$data,$kra){
        $this->db->trans_start();
        $this->db->select('employee');
        $this->db->where('employee_id', $id);
        $this->db->update("employee",$data);

        //Delete from employee_kra records
        $this->db->where('employee_id', $id);
        $this->db->delete('employee_kra');


        $kra = $kra['kra'];
        for ($i=0; $i < count(array_flatten($kra)) ; $i++){
            $this->db->set('employee_id', $id);
            $this->db->set('kra_id', $kra[$i]);
            $this->db->insert('employee_kra');
        }

        $this->db->trans_complete();
    }

}

