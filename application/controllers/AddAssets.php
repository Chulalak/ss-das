<?php

class AddAssets extends CI_Controller
{
    public function __construct(){
      parent::__construct();
       if(empty($this->session->userdata("username"))){
            redirect('Login', 'refresh');
        } 
      $this->load->model('AddAssets_model');
    }
    
    public function index() {
        //XX Query company from table for company dropdown
        $data['company'] = $this->Main_model->getCompany();
        //XX Query category from tabledetail parameter = 100 for category dropdown
        $data['category'] = $this->Main_model->getCategory();
        
        $data['rs'] = null;
        $this->load->view('template/header');
        $this->load->view('template/navMenu');
        $this->load->view('AddAssets/addAssets_index',$data);
        $this->load->view('AddAssets/addAssets_js');
    }
    
    public function addData() {
        $id = "";
        $deliveryDate = $this->input->post('deliveryDate');
        $cost = $this->input->post('totalprice');
        $user = $this->session->userdata('username');
        $depRate = $this->input->post('depRate');
        $array = array(
            'DRAACC' => $this->input->post('refAccNumber'),
            'DRANAME' => $this->input->post('assetName'),
            'DRADAT' => $this->input->post('deliveryDate'),
            'CMPCD' => $this->input->post('company'),
            'DRATYP' => $this->input->post('catetory'),
            'DRAAMT' => $this->input->post('amount'),
            'DRAUNTPRC' => $this->input->post('unitprice'),
            'DRADEPRT' => $this->input->post('depRate'),
            'DRATOTPRC' => $this->input->post('totalprice')
        );      
            //XXX Check Duplicate
            $query = $this->db->get_where('durablearticles', $array);
            $num_rows = $query->num_rows();
        //XX if no data in table then insert data in 'durablearticles' and 'depdetail' table.
        if($num_rows===0){
            //XXX insert data to 'durablearticles' table.
            $data = $this->db->insert('durablearticles', $array);
            
            //XXX Get id (DRAID) from 'durablearticles' for insert to 'depdetail' table.
            $getData = $this->AddAssets_model->prepareForSaveToDepTable($array);
            foreach ($getData as $value) {
                $id = $value; 
            }
            
            //XXX Insert data to 'depreciation' table
            $this->AddAssets_model->insertDepreciation($id,$deliveryDate,$cost,$depRate,$user);
            
        }else{
            $data = "fail";
        }
        echo $data;
    }
    
    
    public function editData() {
        $id= $this->input->get('id');
        
        //XX Query company from table for company dropdown
        $data['company'] = $this->Main_model->getCompany();
        //XX Query category from tabledetail parameter = 100 for category dropdown
        $data['category'] = $this->Main_model->getCategory();
        $data['rs'] = $this->AddAssets_model->getData($id);
        
        $this->load->view('template/header');
        $this->load->view('template/navMenu');
        $this->load->view('AddAssets/addAssets_index',$data);
        $this->load->view('AddAssets/addAssets_js');
    }
    
    public function updateData() {
        $username = $this->session->userdata('username');
        $id = $this->input->post('id');
        $array = array(
            'DRAACC' => $this->input->post('refAccNumber'),
            'DRANAME' => $this->input->post('assetName'),
            'DRADAT' => $this->input->post('deliveryDate'),
            'CMPCD' => $this->input->post('company'),
            'DRATYP' => $this->input->post('catetory'),
            'DRAAMT' => $this->input->post('amount'),
            'DRAUNTPRC' => $this->input->post('unitprice'),
            'DRATOTPRC' => $this->input->post('totalprice'),
            'DRAUPDUSR' => $username
        );      
        
            $query = $this->db->get_where('durablearticles', $array);
            $num_rows = $query->num_rows();
            
        if($num_rows===0){
            
            $this->db->where('DRAID', $id);
            $data = $this->db->update('durablearticles', $array);  
            
        }else{
            $data = "fail";
        }
        echo $data;
    }
}

