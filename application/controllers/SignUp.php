<?php

class SignUp extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('SignUp_model');
    }
    
    public function index() {
        $this->load->view('template/header');
        $this->load->view('template/navMenu');
        $this->load->view('signUp/signUp_index');
        $this->load->view('signUp/signUp_js');
        
    }
    
    public function signup() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        
        $rs = $this->SignUp_model->saveToDatabase($username,$password,$fname,$lname,$email);
        $this->session->set_userdata(array('username' => $username));
        echo $rs;
    }

}

