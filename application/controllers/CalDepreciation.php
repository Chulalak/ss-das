<?php
class CalDepreciation extends CI_Controller
{
    private  $_hdrId;
    public function __construct(){
      parent::__construct();
       if(empty($this->session->userdata("username"))){
            redirect('Login', 'refresh');
        } 
        $this->load->library('session');
        $this->load->model('CalDep_model');
    }
    public function index(){
        //XX Query company from table for company dropdown
        $data['company'] = $this->Main_model->getCompany();
        //XX Query category from tabledetail parameter = 100 for category dropdown
        $data['category'] = $this->Main_model->getCategory();
        //XX Query month from tabledetail parameter = 101 for month dropdown
        $data['month'] = $this->Main_model->getMonth();

        $this->load->view('template/header');
        $this->load->view('template/navMenu');
        $this->load->view('calDepreciation/calDep_index',$data);
        $this->load->view('calDepreciation/calDep_js');
    }

    public function search(){

        $company = $this->input->post('company');
        $cate = $this->input->post('cate');
        $month = $this->input->post('month');
        $year = $this->input->post('year');

        $rs= $this->CalDep_model->search($company,$cate,$month,$year);
        echo json_encode($rs);
    }
    
    public function calculate(){
        $company = $this->input->post('company');
        $cate = $this->input->post('cate');
        $month = $this->input->post('month');
        $year = $this->input->post('year');

        $data = $this->CalDep_model->calDepreciation($company,$cate,$month,$year);
        echo json_encode($data);
    }
    
    public function prepareSave(){
        $user = $this->session->userdata("username");
        $company = $this->input->post('company');
        $cate = $this->input->post('cate');
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $sumDep = $this->input->post('sumDep');
         
        //XXX Check Duplicate
        $rs = $this->CalDep_model->getData($company,$cate,$month,$year);
        $results = $rs->result_array();
        $rows = $rs->num_rows();
        //XXX if no data in table then save data into 'DEPHEADER' table
        if($rows == 0 ){
            $data = array(
                'CMPCD' => $company,
                'DPHCATE' => $cate,
                'DPHMNT' => $month,
                'DPHYEAR' => $year,
                'DPHSUMDEP' => $sumDep,
                'DPHCREUSR' => $user,
                'DPHUPDUSR' => $user
            );
            
            $this->db->insert('DEPHEADER', $data);
            
            //XXX Get DPHHDR 
            $this->db->select('DPHHDR');
            $this->db->from('DEPHEADER');
            $this->db->where($data);
            $result = $this->db->get();
            $results = $result->result_array();
            
            $hdr = $results;
            foreach ($hdr as $value) {
                $hdrId = $value['DPHHDR'];
                
                $this->session->set_userdata(array('hdrId'=> $hdrId));
            }
            
        }
        
        echo json_encode($results);
        
        return $this->_hdrId;
    }
    
//    public function getHeaderId($data) {
//        //XXX Get DPHHDR 
//        $this->db->select('DPHHDR');
//        $this->db->from('DEPHEADER');
//        $this->db->where($data);
//        $result = $this->db->get();
//        $results = $result->result_array();
//
//        $hdr = $results;
//        foreach ($hdr as $value) {
//           $hdrId =  $value['DPHHDR'];
//        }
//        return $hdrId;
//    }
    
    public function save() {

        $headerId   = $this->session->userdata('hdrId');
        $user       = $this->session->userdata('username');
        header('Content-Type:application/json');
        $data = json_decode(file_get_contents('php://input'), true);
        if (is_array($data) || is_object($data)){
            foreach($data as $arrays){
                foreach($arrays as $array){
                        $rs = array (
                            "DPHHDR" => $headerId,
                            "DEPMNT" => $array['month'],
                            "DEPYEAR" => $array['year'],
                            "DRAID" => $array['id'],
                            "DEPDAT" => $array['date'],
                            "DEPLASTCST" => $array['cost'],
                            "DEPLASTBV" => $array['lastBV'],
                            "DEPLASTMNT" => $array['lastMonth'],
                            "DEPCURMNT" => $array['curMonth'],
                            "DEPALLMNT" => $array['allMonth'],
                            "DEPACCDEPLAST" => $array['lastAccDep'],
                            "DEPDEPPERMNT" => $array['dep'],
                            "DEPACCDEPCUR" => $array['curAccDep'],
                            "DEPACCDEPALL" => $array['allAccDep'],
                            "DEPBVCUR" => $array['curBV'],
                            "DEPCREUSR" => $user,
                            "DEPUPDUSR" => $user
                        );
                        $insert = $this->db->insert('depdetail', $rs);     
                        
                }
            }
        }
        $this->session->unset_userdata('hdrId');
        echo $insert;
    }
    
    public function updateSum() {
        $hdrId = $this->input->post('hdrId');
        $sumDep = $this->input->post('sumDep');
        $user       = $this->session->userdata('username');
        
        $array = array(
            "DPHSUMDEP" => $sumDep,
            "DPHUPDUSR" => $user
        );
        
        $this->db->where('DPHHDR', $hdrId);
        $data = $this->db->update('depheader', $array);
        
        echo $data;
    }
}
