<?php

class AddAssets_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    
    public function getData($id) {
        $rs = $this->db->query("SELECT DUR.DRAID AS 'DurableId'
                                      ,DUR.CMPCD AS 'company'
                                      ,DUR.DRATYP As 'DurableType'
                                      ,DUR.DRANAME As 'DurableName'
                                      ,DUR.DRADEPRT AS 'DepRate'
                                      ,DATE_FORMAT(DUR.DRADAT,'%d/%m/%Y') AS 'DeliveryDate'
                                      ,DUR.DRAAMT AS 'Amount'
                                      ,DUR.DRAUNTPRC AS 'UnitPrice'
                                      ,DUR.DRATOTPRC AS 'TotalPrice'
                                      ,DUR.DRAACC AS 'ACC'
                                      ,DUR.DRASTAT AS 'Status'
                                FROM DURABLEARTICLES DUR 
                                JOIN COMPANY CMP ON CMP.CMPCD = DUR.CMPCD
                                JOIN tabledetail TYP on TYP.TBDNO = 100 and TYP.TBDCD = DUR.DRATYP
                                WHERE DUR.DRAID = '$id'");
        $query = $rs->result_array();

        return $query;
    }
    
    
    public function prepareForSaveToDepTable($param) {
        
        $this->db->select('DRAID');
        $this->db->from('depdetail');
        $this->db->where($param);
        $query = $this->db->get(); 
        if ( $query->num_rows() > 0 )
        {
            $row = $query->row_array();
            return $row;

        }
    }
    
    public function insertDepreciation($id,$deliveryDate,$cost,$depRate,$user) {
        $rs = $this->db->query("INSERT INTO depdetail(
                                            DRAID, DEPDAT, DEPLASTCST, DEPLASTBV, DEPLASTMNT, 
                                            DEPCURMNT, DEPYEAR, DEPALLMNT, DEPACCDEPLAST, DEPDEPPERMNT, 
                                            DEPACCDEPCUR, DEPACCDEPALL, DEPBVCUR, DEPCREDAT, DEPCREUSR, 
                                            DEPUPDDAT, DEPUPDUSR) 
                                VALUES ($id,'$deliveryDate',$cost,0.00,0,
                                        1,YEAR(CURRENT_DATE),1+0,0.00,round((($cost*$depRate)/100)/12),
                                        round((($cost*$depRate)/100)/12)*1, round((($cost*$depRate)/100)/12)*1, $cost - (round((($cost*$depRate)/100)/12)),CURRENT_TIMESTAMP,'$user',
                                        CURRENT_TIMESTAMP,'$user')");
    }

}

