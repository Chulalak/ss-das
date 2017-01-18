<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if(empty($this->session->userdata("username"))){
            redirect('Login', 'refresh');
        }       
    }

    public function index()
    {
            $this->load->view('template/header');
            $this->load->view('template/navMenu');
            $this->load->view('template/index');
            $this->load->view('template/javascript');
    }
}
