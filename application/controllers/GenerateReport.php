<?php

class GenerateReport extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('PHPJasperXML');
    }
    
    public function index() {             
   
//            "category" => $this->input->post('cate'),
//            "month" => $this->input->post('month'),
//            "year" => $this->input->post('year')
//        );
        
//        echo $company;
//        die();
         //XXX setting connect database
        $CI = &get_instance();
        $CI->load->database();
        $server = $CI->db->hostname;
        $user = $CI->db->username;
        $pass = $CI->db->password;
        $db = $CI->db->database;
//
//XXX retrive value from view into array for add parameter for report

        $param = array(
            "company" => $this->input->post('company'),
            "category" => $this->input->post('cate'),
            "month" => $this->input->post('month'),
            "year" => $this->input->post('year')
        );      

        echo $param;
        $PHPJasperXML = new PHPJasperXML();
        //$PHPJasperXML->debugsql=true;
        $PHPJasperXML->arrayParameter="";
        $PHPJasperXML->load_xml_file("C:/xampp/htdocs/ss-das/assets/report/project.jrxml");

        $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db); //* use this line if you want to connect with mysql   
        $this->load->view('report/generateReport');
    }

}

