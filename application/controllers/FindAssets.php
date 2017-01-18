<?php

class FindAssets extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('FindAssets_model');
  }

  public function index(){
    //XX Query company from table for company dropdown
    $data['company'] = $this->Main_model->getCompany();
    //XX Query category from tabledetail parameter = 100 for category dropdown
    $data['category'] = $this->Main_model->getCategory();

    $this->load->view('template/header');
    $this->load->view('template/navMenu');
    $this->load->view('findAssets/findAssets_index',$data);
    $this->load->view('findAssets/findAssets_js');
  }

    public function search(){
        $company = $this->input->post('company');
        $dateFrom = $this->input->post('dateFrom');
        $dateTo = $this->input->post('dateTo');
        $cate = $this->input->post('cate');
        $status = $this->input->post('status');
        
        if (empty($dateFrom)){ $dateFrom   = 'null'; }
        if (empty($dateTo)){ $dateTo   = 'null'; }
        if (empty($cate)){ $cate   = 'null'; }
        if (empty($status)){ $status   = 'null'; }
      
        $data = $this->FindAssets_model->search($company,$cate,$dateFrom,$dateTo,$status);
        echo json_encode($data);
    }
  
    public function deleteData() {
        $id = $this->input->post('id');
        $rs = $this->db->delete('durablearticles', ['DRAID' => $id]);
        echo $rs;
    }
    
}


 ?>
