<?php

class Setting_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function searchData() {
        $rs = $this->db->query("SELECT CMPCD AS 'code'
                                     , CMPLNAME AS 'companyName'
                                     , CMPLADDR AS 'address'
                                     , CMPTEL AS 'companyTel'
                                     , CMPFAX AS 'companyFax'
                                FROM company WHERE 1");
        $query = $rs->result_array();

        return $query;
    }
    
    public function deleteCompany($companyCode) {
        $rs = $this->db->query("DELETE FROM company WHERE CMPCD = '$companyCode'");

        return $rs;
    }
    
    public function deleteCategory($cateCode) {
        $rs = $this->db->query("DELETE FROM tabledetail WHERE TBDNO = 100 AND TBDCD = '$cateCode'");

        return $rs;
    }

}

