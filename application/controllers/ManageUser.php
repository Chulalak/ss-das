<?php

class ManageUser extends CI_Controller{

    function __construct() {
        parent::__construct();
        if(empty($this->session->userdata("username"))){
            redirect('Login', 'refresh');
        } 
        $this->load->model('SignUp_model');
        $this->load->model('ManageUser_model');
    }
    
    public function index() {
        if ($this->input->post('action') == 'edit') {
            $arr = array(
                'USRID' => $this->input->post('ID'),
                'USRNAME'  => $this->input->post('username'),
                'USRFNAME'  => $this->input->post('fname'),
                'USRLNAME'  => $this->input->post('lname'),
                'USRROLE'  => $this->input->post('role')
            );
            $data['rs'] = $this->db->replace('user', $arr);
        } else if ($this->input->post('action') == 'delete') {
            $data['rs'] = $this->ManageUser_model->deleteUserInDatabase($this->input->post('ID'));
        }
        $data['rs'] = $this->ManageUser_model->searchUser();
        
                
        $this->load->view('template/header');
        $this->load->view('template/navMenu');
        $this->load->view('manageUser/manageUser_index',$data);
        $this->load->view('manageUser/manageUser_js');
        
                
        
    }
    
    public function getData() {
         $id = $this->input->post('id');
         $rs = $this->ManageUser_model->getUserInfo($id);
         
         echo json_encode($rs);
    }
    
    public function deleteUser(){
        $id = $this->input->post('id');
        $data = $this->ManageUser_model->deleteUserInDatabase($id);
        echo $data;
    }
    
    public function addUserPage() {
        $data['status'] = $this->ManageUser_model->searchUser();
        
        $this->load->view('template/header');
        $this->load->view('template/navMenu');
        $this->load->view('manageUser/manageUserEdit_index',$data);
        $this->load->view('manageUser/manageUserEdit_js');
    }
    
    public function addUsers() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        $role = $this->input->post('role');      
        
        $num_rows = $this->SignUp_model->chkUser($username);
        if($num_rows===0){
            $data = $this->ManageUser_model->insertUser($username,$password,$fname,$lname,$email,$role);
        }else{
            $code = utf8_decode($username);
        }
        echo $data;
    }
    
    public function update($arr) {
        $this->db->set($array);
        $this->db->update('mytable');
        
    }

}

