<?php
class Employee_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
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

    public function deactivate_employee($id){

        $data = array(
            'is_active' => '0'
        );

        $this->db->select('employee');
        $this->db->where('employee_id', $id);
        $this->db->update("employee",$data);

    }

    public function activate_employee($id){

        $data = array(
            'is_active' => '1'
        );

        $this->db->select('employee');
        $this->db->where('employee_id', $id);
        $this->db->update("employee",$data);

    }

}

