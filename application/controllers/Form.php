<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

    public function index()
    {
        $this->load->view('_header');
        $this->load->view('home');
        $this->load->view('_footer');
    }
}
