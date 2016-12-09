<?php
class Employee_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }


    public function add_employee($data){
        $this->db->insert("employee",$data);
        return true;
    }

    public function add_employee_education($data){
        $this->db->insert("employee_education",$data);
        return true;
    }

    //Return details of Employees
    public function get_employee_list(){
        $this->db->from('employee');
        $this->db->order_by("employee_id", "asc");
        return $this->db->get();
    }

    public function get_employee_where($id){
        $this->db->from('employee');
        $this->db->where('employee.employee_id', $id);
        $this->db->order_by("employee.employee_id", "asc");

        return $this->db->get();
        //return $kpi = $kpi[0];
    }

    public function get_employee_education_where($id){
        $this->db->from('employee_education');
        $this->db->where('employee_id',$id);
        $this->db->order_by("id", "asc");
        return $this->db->get();
    }

    public function delete_employee($id){
        $this->db->trans_start();
        //Delete from Employee table
        $this->db->where('employee_id', $id);
        if ($this->db->delete('employee')){
            //Also delete education data
            $this->db->where('employee_id', $id);
            $this->db->delete('employee_education');
        }
        $this->db->trans_complete();
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

    public function update_employee($id,$data){

        $this->db->where('employee_id', $id);
        $this->db->update('employee', $data);
        return true;

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

    public function get_education_entry($emp_id,$entry){
        $this->db->where('id', $entry);
        $this->db->where('employee_id', $emp_id);
        $this->db->from('employee_education');
        $edu = $this->db->get()->result();

        return $edu = $edu[0];

    }

    public function update_education_entry($emp_id,$entry,$data){
        $this->db->where('id',$entry);
        $this->db->where('employee_id',$emp_id);
        $this->db->update('employee_education', $data);
        return true;
    }

}

