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
        $this->view_all();
    }

    public function edit($id){
        $data = array();
        $data['category'] = $this->My_model->get_category();
        $data['data'] = $this->My_model->get_data_where($id);
        $this->load->view('edit',$data);


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

                $this->My_model->update_data($id,$db_data);

                $this->session->set_flashdata('message', 'Record added successfully');
                redirect();
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
                redirect();
            }


        }
    }

    public function delete($id){
        
    }


    public function view_all(){
        
        $data = array();
        $data['data'] = $this->My_model->get_data();
        $this->load->view('view_all',$data);

        
    }

    public function add_data(){


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

                $this->My_model->add_data($db_data);

                $this->session->set_flashdata('message', 'Record added successfully');
                redirect();
            }
            else{
                $this->session->set_flashdata('error', validation_errors());
                redirect();
            }


        }
        $data = array();
        $data['category'] = $this->My_model->get_category();
        $this->load->view('add_data',$data);


    }

    public function add_category(){


        //Check if form is submitted by POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->form_validation->set_rules('category', 'Category', 'required|trim|max_length[50]');

            if ($this->form_validation->run() != FALSE){

                $db_data = array();
                $db_data['category'] = $this->input->post('category', TRUE);
                $db_data['description'] = $this->input->post('description', TRUE);

                $this->My_model->add_category($db_data);

                $this->session->set_flashdata('message', 'Record added successfully');
                redirect();

            }
            else{
                $this->session->set_flashdata('error', validation_errors());
                redirect();
            }

        }

        $this->load->view('add_category');
    }
}
