<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('My_model');
        $this->load->helper('general_helper');
        $this->load->helper('array');
        $this->load->library('table');
    }

    public function index()
    {
     
       $this->add_employee($id = NULL);


    }

    public function edit_kpi($id){
        $data = array();
        $data['title'] = "Edit KPI";
        $data['kpi_category'] = $this->My_model->get_kpi_category();
        $data['kpi'] = $this->My_model->get_kpi_where($id);
        $this->load->view('kpi/edit_kpi',$data);


        //Check if form is submitted by POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('level', 'Level', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('numerator', 'Numerator', 'required');
            $this->form_validation->set_rules('denominator', 'Denominator', 'required');

            if ($this->form_validation->run() != FALSE){
                $db_data = array();
                $db_data['kpi_description'] = $this->input->post('description', TRUE);
                $db_data['type'] = $this->input->post('type', TRUE);
                $db_data['level'] = $this->input->post('level', TRUE);
                $db_data['p_category'] = $this->input->post('category', TRUE);
                $db_data['num'] = $this->input->post('numerator', TRUE);
                $db_data['denom'] = $this->input->post('denominator', TRUE);

                $this->My_model->update_kpi($id,$db_data);

                $this->session->set_flashdata('message', 'Record edited successfully');
                redirect('form/view_kpi');
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
                redirect('form/view_kpi');
            }


        }
    }

    public function delete_kpi($id){
        $this->My_model->delete_kpi($id);
        $this->session->set_flashdata('message', 'Record deleted successfully');
        redirect('form/view_kpi');
    }

    public function view_kpi(){
        
        $data = array();
        $data['title'] = "View KPI";
        $data['kpi'] = $this->My_model->get_kpi();
        $this->load->view('kpi/view_kpi',$data);

        
    }

    public function add_kpi(){


        //Check if form is submitted by POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->form_validation->set_rules('description', 'Description', 'required|is_unique[kpi.kpi_description]|max_length[50]'
                ,array(
                    'is_unique'     => 'This %s already exists.'
                )
            );
            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('level', 'Level', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('numerator', 'Numerator', 'required');
            $this->form_validation->set_rules('denominator', 'Denominator', 'required');

            if ($this->form_validation->run() != FALSE){
                $db_data = array();
                $db_data['kpi_description'] = $this->input->post('description', TRUE);
                $db_data['type'] = $this->input->post('type', TRUE);
                $db_data['level'] = $this->input->post('level', TRUE);
                $db_data['p_category'] = $this->input->post('category', TRUE);
                $db_data['num'] = $this->input->post('numerator', TRUE);
                $db_data['denom'] = $this->input->post('denominator', TRUE);

                $this->My_model->add_kpi($db_data);

                $this->session->set_flashdata('message', 'Record added successfully');
                redirect('form/add_kpi');
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
                redirect('form/add_kpi');
            }


        }
        $data = array();
        $data['title'] = "Add KPI";
        $data['kpi_category'] = $this->My_model->get_kpi_category();
        $this->load->view('kpi/add_kpi',$data);


    }

    public function add_kpi_category(){


        //Check if form is submitted by POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->form_validation->set_rules('category', 'Category', 'required|is_unique[kpi_category.category]|max_length[50]'
            ,array(
                    'is_unique'     => 'This %s already exists.'
                )
                );

            if ($this->form_validation->run() != FALSE){

                $db_data = array();
                $db_data['category'] = $this->input->post('category', TRUE);
                $db_data['description'] = $this->input->post('description', TRUE);

                $this->My_model->add_kpi_category($db_data);

                $this->session->set_flashdata('message', 'Record added successfully');
                redirect('form/add_kpi_category');

            }
            else{
                $this->session->set_flashdata('error', validation_errors());
                redirect('form/add_kpi_category');
            }

        }
        
        $data = array();
        $data['title'] = "Add KPI Category";
        $data['kpi_category'] = $this->My_model->get_kpi_category();
        $this->load->view('kpi/add_kpi_category',$data);
    }

    public function add_kra(){

        $data = array();
        $data['title'] = "Add KRA";
        $data['kpi'] = $this->My_model->get_kpi();
        $this->load->view('kra/add_kra',$data);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->form_validation->set_rules('code', 'Code', 'required|max_length[50]|is_unique[kra.code]'
                ,array(
                    'is_unique'     => 'This %s already exists.'
                )
            );
            //$this->form_validation->set_rules('kra', 'KRA', 'required');

            if ($this->form_validation->run() != FALSE){
                $db_data = array();
                $db_data['code'] = $this->input->post('code', TRUE);
                $db_data['description'] = $this->input->post('description', TRUE);
                $db_kra = array();
                $db_kra['kpi'] = $this->input->post('kpi', TRUE);
                $this->My_model->add_kra($db_data,$db_kra);

                $this->session->set_flashdata('message', 'Record added successfully');
                redirect('form/add_kra');
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
                redirect('form/add_kra');
            }
        }

    }
    
    public function view_kra($id){

        $data = array();
        $data['title'] = "View KRA";
        $data['kra'] = $this->My_model->get_kra_list();

        if (isset($id) && !is_null($id) && is_numeric($id)){
            $data['kra_detail'] = $this->My_model->get_kra_where($id);
        }

        $this->load->view('kra/view_kra',$data);


    }
    
    public function detail_kra($id){
        $data = array();
        $data['title'] = "View KRA";

        $data['kra'] = $this->My_model->get_kra_where($id);
        //print_r($data);exit;
        $this->load->view('kra/detail_kra',$data);
        
    }

    public function edit_kra($id){
        $data = array();
        $data['title'] = "Edit KRA";
        $data['kra'] = $this->My_model->get_single_kra($id);
        $data['kpi_list'] = $this->My_model->get_kpi();
        $data['selected_kpi'] = $this->My_model->get_kpi_list($id);
 
        $this->load->view('kra/edit_kra',$data);

        //Check if form is submitted by POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->form_validation->set_rules('code', 'Code', 'required|max_length[50]');


            if ($this->form_validation->run() != FALSE){
                
                $db_data['code'] = $this->input->post('code', TRUE);
                $db_data['description'] = $this->input->post('description', TRUE);

                $db_kra = array();
                $db_kra['kpi'] = $this->input->post('kpi', TRUE);
                //print_r($db_kra);exit;

                $this->My_model->update_kra($id,$db_data,$db_kra);

                $this->session->set_flashdata('message', 'Record edited successfully');
                redirect('form/view_kra/NULL');

            }
            else{
                $this->session->set_flashdata('error', validation_errors());
                redirect('form/view_kra/NULL');
            }


        }
    }

    //This will delete KRA
    public function delete_kra($id){
        $this->My_model->delete_kra($id);
        $this->session->set_flashdata('message', 'Record deleted successfully');
        redirect('form/view_kra/NULL');
    }

    //This will delete a single KPI in a KRA
    public function delete_kpi_kra($kra,$kpi){
        $this->My_model->delete_kpi_kra($kra,$kpi);
        $this->session->set_flashdata('message', 'Record deleted successfully');
        redirect('form/view_kra/'.$kra);
    }


    public function add_employee(){
        $data = array();
        $data['title'] = "Add Employee";
        $data['kra'] = $this->My_model->get_kra_list();
        $this->load->view('employee/add',$data);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[employee.email]'
                ,array(
                    'is_unique'     => 'Employee with %s already exists.'
                )
            );
            $this->form_validation->set_rules('contact', 'Contact Number', 'numeric');
            //$this->form_validation->set_rules('kra', 'KRA', 'required');

            if ($this->form_validation->run() != FALSE){
                $db_data = array();
                $db_data['name'] = $this->input->post('name', TRUE);
                $db_data['email'] = $this->input->post('email', TRUE);
                $db_data['designation'] = $this->input->post('designation', TRUE);
                $db_data['contact_num'] = $this->input->post('contact', TRUE);


                $selected_kra = array();
                $selected_kra['kra'] = $this->input->post('kra', TRUE);
                $this->My_model->add_employee($db_data,$selected_kra);

                $this->session->set_flashdata('message', 'Record added successfully');
                redirect('form/add_employee');
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
                redirect('form/add_employee');
            }
        }

    }

    public function view_employee($id){
        $data = array();
        $data['title'] = "View Employee";
        $data['employee'] = $this->My_model->get_employee_list();

        if (isset($id) && !is_null($id) && is_numeric($id)){
            $data['detail'] = $this->My_model->get_employee_where($id);
        }

        $this->load->view('employee/view',$data);

    }
    

    
}
