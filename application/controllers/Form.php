<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('my_model');
    }

    public function index()
    {
        $data = array();

        $data['category'] = $this->my_model->get_category();

        $this->load->view('home',$data);

    }

    public function add_category(){
        $data = array();
        $data['message'] = "";

        //Check if form is submitted by POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->form_validation->set_rules('category', 'Category', 'required | trim | max_length[50]');

            if ($this->form_validation->run() != FALSE){
                $db_data = array();
                $db_data['category'] = $this->input->post('category', TRUE);
                $db_data['description'] = $this->input->post('description', TRUE);
            }

        }
    }
}
