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
            $arrCompany = [
                'CMPCD' => $this->input->post('code'),
                'CMPLNAME'  => $this->input->post('companyName'),
                'CMPLADDR'  => $this->input->post('address'),
                'CMPTEL'  => $this->input->post('companyTel'),
                'CMPFAX'  => $this->input->post('companyFax')
            ];
            $this->db->replace('company', $arrCompany);
            
            //XXX Update category action = 'edit'
                $tableNo = $this->input->post('TBDNO');
                $tableCode = $this->input->post('TBDCD');
                $tableDesc  = $this->input->post('TBDDESC');
                $arrCate = [
                    'TBDNO' => $tableNo,
                    'TBDCD' => $tableCode
                ];
                
            $this->db->where($arrCate);
            $this->db->set('TBDDESC', $tableDesc);
            $this->db->update('tabledetail');
            
            
        } else if ($this->input->post('action') == 'delete') {
            //XXX Update company action = 'delete'
            $companyCode =  $this->input->post('code');  
            $this->Setting_model->deleteCompany($companyCode);
            
            //XXX Update category action = 'delete'
            $cateCode = $this->input->post('TBDCD');
            $this->Setting_model->deleteCategory($cateCode);
//            redirect('Setting', 'refresh');
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
