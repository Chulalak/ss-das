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
    
    /*
     * function for add durable articles information into database
     */    
    public function addData() {
        $id             = "";
        $hdrId          = "";
        $dtlId          = "";
        $depPermonth    = "";
        $company        = $this->input->post('company');
        $deliveryDate   = $this->input->post('deliveryDate');
        $type           = $this->input->post('catetory');
        $cost           = $this->input->post('totalprice');
        $user           = $this->session->userdata('username');
        $depRate        = $this->input->post('depRate');
        $array = array(
            'DRAREF'    => $this->input->post('refNumber'),
            'DRAACC'    => $this->input->post('refAccNumber'),
            'DRANAME'   => $this->input->post('assetName'),
            'DRADAT'    => $this->input->post('deliveryDate'),
            'CMPCD'     => $this->input->post('company'),
            'DRATYP'    => $this->input->post('catetory'),
            'DRAAMT'    => $this->input->post('amount'),
            'DRAUNTPRC' => $this->input->post('unitprice'),
            'DRADEPRT'  => $this->input->post('depRate'),
            'DRATOTPRC' => $this->input->post('totalprice')
        );      
            //XXX Check Duplicate
            $this->db->select('*');
            $this->db->from('durablearticles');
            $this->db->where($array);
            $query = $this->db->get();
            $num_rows = $query->num_rows();
            
        //XX if no data in table then insert data in 'durablearticles' and 'depdetail' table.
        if($num_rows == 0){
            //XXX insert data to 'durablearticles' table.
            $this->db->insert('durablearticles', $array);

            //XXX Get id (DRAID) from 'durablearticles' for insert to 'depdetail' table.
            $getData = $this->AddAssets_model->prepareForSaveToDepTable($array);
            $results = $getData->result_array();
            
            foreach ($results as $value) {
                $id = $value['draid']; 
            }
                      
            //XXX Insert data to 'depdetail' table and get sum of depreciation
            $depDetail = $this->AddAssets_model->insertDepreciation($id,$deliveryDate,$cost,$depRate,$user);
            foreach ($depDetail as $value) {
                $depPermonth = $value['depdeppermnt']; 
            }
            
            //XXX Check Data in 'depheader'
            $chk = $this->AddAssets_model->chkSum($company,$type,$deliveryDate);
            $resultChk = $chk->result_array();
            $row = $chk->num_rows();

            //XXX if have data in 'depheader' then update sum of depreciation
            if($row>0){
                foreach ($resultChk as $value) {
                    $hdrId = $value['DPHHDR']; 
                }
                $this->db->set('DPHSUMDEP', 'DPHSUMDEP + '.$depPermonth, FALSE);
                $this->db->where('DPHHDR', $hdrId);
                $this->db->update('depheader');
                
            }else{
            //XXX if no data in 'depheader' then insert sum of depreciation  and get dphhdr  
                $this->AddAssets_model->insertDepHeadder($company,$type,$deliveryDate,$depPermonth,$user);
                $header = $this->db->query("SELECT dphhdr FROM depheader ORDER BY dphupddat DESC LIMIT 1");
                $head = $header->result_array();
                
                foreach ($head as $value) {
                    $hdrId = $value['dphhdr']; 
                }
            }
            
            foreach ($depDetail as $value) {
                $dtlId = $value['depdtl']; 
            }
            
            $this->db->set('DPHHDR',$hdrId);
            $this->db->where('DEPDTL',$dtlId);
            $this->db->update('depdetail');
            
            $data = "success";
   
        }else{
            $data = "fail";
        }
        echo $data;
    }
    
    /*
     * function for add durable articles information into database
     */    
    public function editData() {
        $id= $this->input->get('id');
        
        //XX Query company from table for company dropdown
        $data['company'] = $this->Main_model->getCompany();
        //XX Query category from tabledetail parameter = 100 for category dropdown
        $data['category'] = $this->Main_model->getCategory();
        
        //XX Get data from database to display on screen
        $data['rs'] = $this->AddAssets_model->getData($id);
        
        $this->load->view('template/header');
        $this->load->view('template/navMenu');
        $this->load->view('AddAssets/addAssets_index',$data);
        $this->load->view('AddAssets/addAssets_js');
    }
    
    /*
     * function for update durable articles information into database
     */    
    public function updateData() {
        $id = $this->input->post('id');
        $array = array(
            'DRAREF'    => $this->input->post('refNumber'),
            'DRAACC'    => $this->input->post('refAccNumber'),
            'DRANAME'   => $this->input->post('assetName'),
            'DRADAT'    => $this->input->post('deliveryDate'),
            'CMPCD'     => $this->input->post('company'),
            'DRATYP'    => $this->input->post('catetory'),
            'DRAAMT'    => $this->input->post('amount'),
            'DRAUNTPRC' => $this->input->post('unitprice'),
            'DRATOTPRC' => $this->input->post('totalprice')
        );      
        
            $query = $this->db->get_where('durablearticles', $array);
            $num_rows = $query->num_rows();
            
        if($num_rows===0){
            
            $this->db->where('DRAID', $id);
            $this->db->update('durablearticles', $array);  
            $data = "success";
            
        }else{
            $data = "fail";
        }
        echo $data;
    }
}

