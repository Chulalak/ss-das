<?php

class Setting extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(empty($this->session->userdata("username"))){
            redirect('Login', 'refresh');
        } 
        $this->load->library('session');
        $this->load->model('Setting_model');
    }
    
    public function index() {
        if ($this->input->post('action') == 'edit') {
            //XXX Update company action = 'edit'
            $arrCompany = array(
                'CMPCD' => $this->input->post('code'),
                'CMPLNAME'  => $this->input->post('companyName'),
                'CMPLADDR'  => $this->input->post('address'),
                'CMPTEL'  => $this->input->post('companyTel'),
                'CMPFAX'  => $this->input->post('companyFax')
            );
            $data['company'] = $this->db->replace('company', $arrCompany);
            
            //XXX Update category action = 'edit'
            $arrCategory = ['TBDNO' => $this->input->post('TBDNO'),
                'TBDCD' => $this->input->post('TBDCD'),
                'TBDDESC'  => $this->input->post('TBDDESC')
            ];
            
            $data['category'] = $this->db->replace('tabledetail', $arrCategory);
            
            
        } else if ($this->input->post('action') == 'delete') {
            //XXX Update company action = 'delete'
            $companyCode =  $this->input->post('code');  
            $data['company'] = $this->Setting_model->deleteCompany($companyCode);
            
            //XXX Update category action = 'delete'
             $arrCategory = [
                'TBDNO' => $this->input->post('TBDNO'),
                'TBDCD' => $this->input->post('TBDCD')
            ];          
            $data['category'] = $this->db->delete('tabledetail', $arrCategory);
        }
        
        $data['company'] = $this->Setting_model->searchData();
        $data['category'] = $this->Main_model->getCategory();
                
        $this->load->view('template/header');
        $this->load->view('template/navMenu');
        $this->load->view('setting/setting_index',$data);
        $this->load->view('setting/setting_js');
        
    }
    
    public function addCompany() {
        $dataCompany = [
            'CMPCD'     => $this->input->post('code'),
            'CMPLNAME'  => $this->input->post('companyName'),
            'CMPLADDR'  => $this->input->post('address'),
            'CMPTEL'    => $this->input->post('companyTel'),
            'CMPFAX'    => $this->input->post('companyFax'),
            'CMPUPDUSR' => $this->session->userdata("username")
        ];

        $this->db->insert('company', $dataCompany);
                
    }
    
    public function addCategory() {
        $dataCategory = [
            'TBDNO' => 100,
            'TBDCD' => $this->input->post('categoryCode'),
            'TBDDESC' => $this->input->post('categoryDesc'),
            'TBDUPDUSR' => $this->session->userdata("username")          
        ];
        $this->db->insert('tabledetail', $dataCategory);
    }

}
