<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('My_model');
    }

    public function index()
    {
        $this->add_kra();

    }

    public function edit_kpi($id){
        $data = array();
        $data['title'] = "Edit KPI";
        $data['kpi_category'] = $this->My_model->get_kpi_category();
        $data['kpi'] = $this->My_model->get_kpi_where($id);
        $this->load->view('edit_kpi',$data);


        //Check if form is submitted by POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('level', 'Level', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('numerator', 'Numerator', 'required');
            $this->form_validation->set_rules('denominator', 'Denominator', 'required');

            if ($this->form_validation->run() != FALSE){
                $db_data = array();
                $db_data['type'] = $this->input->post('type', TRUE);
                $db_data['level'] = $this->input->post('level', TRUE);
                $db_data['p_category'] = $this->input->post('category', TRUE);
                $db_data['num'] = $this->input->post('numerator', TRUE);
                $db_data['denom'] = $this->input->post('denominator', TRUE);

                $this->My_model->update_kpi($id,$db_data);

                $this->session->set_flashdata('message', 'Record added successfully');
                redirect();
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
                redirect();
            }


        }
    }

    public function delete_kpi($id){
        $this->My_model->delete_kpi($id);
        $this->session->set_flashdata('message', 'Record deleted successfully');
        redirect();
    }

    public function view_kpi(){
        
        $data = array();
        $data['title'] = "View KPI";
        $data['kpi'] = $this->My_model->get_kpi();
        $this->load->view('view_kpi',$data);

        
    }

    public function add_kpi(){


        //Check if form is submitted by POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('level', 'Level', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('numerator', 'Numerator', 'required');
            $this->form_validation->set_rules('denominator', 'Denominator', 'required');

            if ($this->form_validation->run() != FALSE){
                $db_data = array();
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
        $this->load->view('add_kpi',$data);


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
        $this->load->view('add_kpi_category',$data);
    }

    public function add_kra(){

        $data = array();
        $data['title'] = "Add KRA";
        $data['kpi'] = $this->My_model->get_kpi();
        $this->load->view('kra/add_kra',$data);


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           

            $this->form_validation->set_rules('code', 'Code', 'required|max_length[50]'
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

    
}
