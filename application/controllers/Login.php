<?php
/**
 *
 */
class Login extends CI_Controller
{
    public function __construct(){
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Login_model');

    }

    public function index(){
        if ($this->session->userdata('username')) {
            redirect('Home', 'redirect');
        }
        $this->load->view('login/login_index');
    }

    public function authen(){   
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $data = $this->Login_model->authen($username,$password);
        if($data == 1){
            $this->session->set_userdata(array('username'=> $username));
        }
        echo $data;
    }
    
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('fname');
        $this->session->unset_userdata('role');

        $this->session->unset_userdata('page');

        redirect('', 'refresh');
    }
    
    
    
}

 
