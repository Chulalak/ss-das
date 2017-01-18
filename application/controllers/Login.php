<?php

class Login extends CI_Controller
{
    public function __construct(){
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Login_model');

    }

    public function index(){
        //XXX Check session when start web application
        if ($this->session->userdata('username')) {
            redirect('Home', 'redirect');
        }
        $this->load->view('login/login_index');
    }
    /*
     * function for authentication  
     */
    public function authen(){
        $res  = "";
        $role = "";
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        //XXX check user and password that retrive has data in database
        $data = $this->Login_model->authen($username,$password);
        $datas = $data->result_array();
        $num_row = $data->num_rows();
        
        if($num_row == 1){
            //XXX if have data in database then set session for user
            foreach ($datas as $value) {
                $role = $value['USRROLE'];
            }
            $this->session->set_userdata(
                    array('username'=> $username,
                          'role'    => $role
                    ));
            //XXX response data
            $res = "success";
        }else{
            $res = "fail";
        }
        echo $res;
    }
    
    /*
     *  function for user logout from web then unset session and refresh page.
     */
    
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');

        $this->session->unset_userdata('page');

        redirect('', 'refresh');
    }
    
    
    
}

 
