<?php

class DepreciationReport extends CI_Controller{

    function __construct() {
        parent::__construct();
        
        $this->load->library('PHPJasperXML');
    }
    
    public function index() {
        
        //XX Query company from table for company dropdown
        $data['company'] = $this->Main_model->getCompany();
        //XX Query category from tabledetail parameter = 100 for category dropdown
        $data['category'] = $this->Main_model->getCategory();
        //XX Query month from tabledetail parameter = 101 for month dropdown
        $data['month'] = $this->Main_model->getMonth();

        $this->load->view('template/header');
        $this->load->view('template/navMenu');
        $this->load->view('report/depreciationReport/depreciationReport_index.php',$data);
        $this->load->view('report/depreciationReport/depreciationReport_js.php');
    }
    
    public function printReport() {
        header('Content-Type:application/pdf');
        //XXX setting connect database
        $CI = &get_instance();
        $CI->load->database();
        $server = $CI->db->hostname;
        $user = $CI->db->username;
        $pass = $CI->db->password;
        $db = $CI->db->database;
        
        //XXX retrive value from view into array for add parameter for report
        $param = array(
            "company" => $this->input->post('company'),
            "category" => $this->input->post('cate'),
            "month" => $this->input->post('month'),
            "year" => $this->input->post('year')
        );
        $PHPJasperXML = new PHPJasperXML();
        //$PHPJasperXML->debugsql=true;
        $PHPJasperXML->arrayParameter=$param;
        $PHPJasperXML->load_xml_file("report/project.jrxml");

        $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
        $PHPJasperXML->outpage("I","sample.pdf");    //page output method I:standard output  D:Download file
    }

}
 
