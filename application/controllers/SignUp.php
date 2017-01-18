<?php

class SignUp extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('SignUp_model');
    }
    
    public function index() {
        $this->load->view('template/header');
        $this->load->view('signUp/signUp_index');
        $this->load->view('signUp/signUp_js');
        
    }
    
    public function signup() {
        $res = "";
        
        //XXX retieve datas from register form 
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        
        //XXX check username in database
        $num_rows = $this->SignUp_model->chkUser($username);
        
        //XX if username already in database then response "fail"
        if($num_rows > 0){
            $res = "fail";
        
        }else{
            //XXX save data that retieve from register form into database and set session for this user then response "success"
            $this->SignUp_model->saveToDatabase($username,$password,$fname,$lname,$email);
            $this->session->set_userdata(array('username' => $username));
            $res = "success";
        }

        echo $res;
    }

}

