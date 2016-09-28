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
        $this->add_data();
    }

    public function add_data(){
        $data = array();
        $data['category'] = $this->My_model->get_category();
        $this->load->view('add_data',$data);

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

                $data['message'] = 'Record added successfully';
            }
            else{
                $data['error'] = '';
            }


        }


    }

    public function add_category(){
        $data = array();

        $this->load->view('add_category');

        //Check if form is submitted by POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->form_validation->set_rules('category', 'Category', 'required|trim|max_length[50]');

            if ($this->form_validation->run() != FALSE){

                $db_data = array();
                $db_data['category'] = $this->input->post('category', TRUE);
                $db_data['description'] = $this->input->post('description', TRUE);

                $this->My_model->add_category($db_data);

            }

        }
    }
}
