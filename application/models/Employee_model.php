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

    public function add_employee_training($data){
        $this->db->insert("employee_training",$data);
        return true;
    }

    public function add_employee_work($data){
        $this->db->insert('employee_work',$data);
        return true;
    }

    public function add_employee_eyecon($data){
        $this->db->insert('employee_eyecon',$data);
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

    public function get_employee_training_where($id){
        $this->db->from('employee_training');
        $this->db->where('employee_id',$id);
        $this->db->order_by("id", "asc");
        return $this->db->get();
    }

    public function get_employee_work_where($id){
        $this->db->from('employee_work');
        $this->db->where('employee_id',$id);
        $this->db->order_by("id", "asc");
        return $this->db->get();
    }

    public function get_employee_eyecon_where($id){
        $this->db->from('employee_eyecon');
        $this->db->where('employee_id',$id);
        $this->db->order_by("id", "asc");
        return $this->db->get();
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

    public function get_training_entry($emp_id,$entry){
        $this->db->where('id', $entry);
        $this->db->where('employee_id', $emp_id);
        $this->db->from('employee_training');
        $train = $this->db->get()->result();

        return $train = $train[0];

    }

    public function get_work_entry($emp_id,$entry){
        $this->db->where('id', $entry);
        $this->db->where('employee_id', $emp_id);
        $this->db->from('employee_work');
        $work = $this->db->get()->result();

        return $work = $work[0];

    }

    public function get_eyecon_entry($emp_id,$entry){
        $this->db->where('id', $entry);
        $this->db->where('employee_id', $emp_id);
        $this->db->from('employee_eyecon');
        $eyecon = $this->db->get()->result();

        return $train = $eyecon[0];

    }

    public function update_education_entry($emp_id,$entry,$data){
        $this->db->where('id',$entry);
        $this->db->where('employee_id',$emp_id);
        $this->db->update('employee_education', $data);
        return true;
    }

    public function update_training_entry($emp_id,$entry,$data){
        $this->db->where('id',$entry);
        $this->db->where('employee_id',$emp_id);
        $this->db->update('employee_training', $data);
        return true;
    }

    public function update_work_entry($emp_id,$entry,$data){
        $this->db->where('id',$entry);
        $this->db->where('employee_id',$emp_id);
        $this->db->update('employee_work', $data);
        return true;
    }

    public function update_eyecon_entry($emp_id,$entry,$data){
        $this->db->where('id',$entry);
        $this->db->where('employee_id',$emp_id);
        $this->db->update('employee_eyecon', $data);
        return true;
    }

    public function delete_employee($id){
        $this->db->trans_start();
        //Delete from Employee table
        $this->db->where('employee_id', $id);

        if ($this->db->delete('employee')){
            //Also delete EDUCATION,TRAINING,WORK HISTORY,EYECON HISTORY data
            $this->db->where('employee_id', $id);
            $this->db->delete('employee_education');
            $this->db->where('employee_id', $id);
            $this->db->delete('employee_training');
            $this->db->where('employee_id', $id);
            $this->db->delete('employee_work');
            $this->db->where('employee_id', $id);
            $this->db->delete('employee_eyecon');
            $this->db->trans_complete();
            return true;
        }

    }

    public function delete_employee_education($emp_id,$entry){
        $this->db->where('employee_id', $emp_id);
        $this->db->where('id', $entry);
        $this->db->delete('employee_education');
        return true;
    }

    public function delete_employee_training($emp_id,$entry){
        $this->db->where('employee_id', $emp_id);
        $this->db->where('id', $entry);
        $this->db->delete('employee_training');
        return true;
    }

    public function delete_employee_work($emp_id,$entry){
        $this->db->where('employee_id', $emp_id);
        $this->db->where('id', $entry);
        $this->db->delete('employee_work');
        return true;
    }

    public function delete_employee_eyecon($emp_id,$entry){
        $this->db->where('employee_id', $emp_id);
        $this->db->where('id', $entry);
        $this->db->delete('employee_eyecon');
        return true;
    }

}

