<?php

class Profile extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        if(empty($this->session->userdata("username"))){
            redirect('Login', 'refresh');
        } 
        $this->load->library('session');
        
    }
    
    public function index() {
        
        //XXX get information of user from database
        $user = $this->session->userdata("username");
        $this->db->select('usrname,usrfname,usrlname,usremail');
        $this->db->from('user');
        $this->db->where('usrname',$user);
        $profile = $this->db->get();
        $data['rs'] = $profile->result_array();
        
        $this->load->view('profile/profile_index',$data);
    }
    
    /*
     * function for change user information
     */
    
    public function changeProfile() {
        $username = $this->input->post('username');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        
        $userArray = array(
            "usrfname" => $fname,
            "usrlname" => $lname,
            "usremail" => $email
        );
        
        $this->db->set($userArray);
        $this->db->where('usrname',$username );
        $this->db->update('user'); 
        
        echo "success";
    }
    
     /*
     * function for change password
     */
    
    public function changePasswd() {
        $res = "";
        $username = $this->input->post('username');
        $oldPasswd = $this->input->post('oldPasswd');
        $newPasswd = $this->input->post('newPasswd');
        
        //XXX Check username and password
        $chkPasswd = $this->db->query("SELECT * FROM user WHERE usrname = '$username' AND usrpass = '$oldPasswd' ");
        $num_row = $chkPasswd->num_rows();
        
        if($num_row > 0){
            $this->db->set('usrpass',$newPasswd);
            $this->db->where('usrname',$username );
            $this->db->update('user');
            
            $res = "success";
            
        }else{
            $res = "fail";
        }
        
        echo $res;
    }

}

