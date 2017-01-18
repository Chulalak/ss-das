<?php

class AddAssets_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    /*
     * function for get durable articles information from database
     */    
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
                                      ,DUR.DRAREF AS 'RefNum'
                                      ,DUR.DRAACC AS 'ACC'
                                      ,DUR.DRASTAT AS 'Status'
                                FROM DURABLEARTICLES DUR 
                                JOIN COMPANY CMP ON CMP.CMPCD = DUR.CMPCD
                                JOIN tabledetail TYP on TYP.TBDNO = 100 and TYP.TBDCD = DUR.DRATYP
                                WHERE DUR.DRAID = '$id'");
        $query = $rs->result_array();

        return $query;
    }
    
    /*
     * function for get 'draid' from database 
     */    
    public function prepareForSaveToDepTable($param) {
        
        $query = $this->db->query("SELECT draid  FROM durablearticles ORDER BY draupddat DESC LIMIT 1");

        return $query;
    }
    
    /*
     * function for add depreciation information into database
     * if $deliveryDate is less than 15 then set DEPLASTMNT,DEPALLMNT = 1 and calulating depreciation per month and current balance value
     * if $deliveryDate is more than 15 or equal to 15 then set DEPLASTMNT,DEPALLMNT,DEPDEPPERMNT,DEPACCDEPCUR,DEPACCDEPALL,DEPACCDEPALL,DEPBVCUR = 0
     */    
    public function insertDepreciation($id,$deliveryDate,$cost,$depRate,$user) {
        $this->db->query("INSERT INTO depdetail(
                                            DRAID, 
                                            DEPDAT, 
                                            DEPLASTCST, 
                                            DEPLASTBV, 
                                            DEPLASTMNT, 
                                            DEPCURMNT,
                                            DEPMNT, 
                                            DEPYEAR, 
                                            DEPALLMNT, 
                                            DEPACCDEPLAST, 
                                            DEPDEPPERMNT, 
                                            DEPACCDEPCUR, 
                                            DEPACCDEPALL, 
                                            DEPBVCUR, 
                                            DEPCREDAT, 
                                            DEPCREUSR, 
                                            DEPUPDDAT, 
                                            DEPUPDUSR) 
                                VALUES ($id
                                        ,'$deliveryDate'
                                        ,$cost
                                        ,0.00
                                        ,0
                                        ,if(DATE('$deliveryDate')<15,1,0)
                                        ,MONTH('$deliveryDate')
                                        ,YEAR('$deliveryDate')
                                        ,if(DATE('$deliveryDate')<15,1,0)
                                        ,0.00
                                        ,if(DATE('$deliveryDate')<15,round((($cost*$depRate)/100)/12),0)
                                        ,if(DATE('$deliveryDate')<15,round((($cost*$depRate)/100)/12),0)
                                        ,if(DATE('$deliveryDate')<15,round((($cost*$depRate)/100)/12),0)
                                        , $cost - (if(DATE('$deliveryDate')<15,round((($cost*$depRate)/100)/12),0))
                                        ,CURRENT_TIMESTAMP
                                        ,'$user'
                                        ,CURRENT_TIMESTAMP
                                        ,'$user')");
        
        $query = $this->db->query("SELECT depdtl,depdeppermnt FROM depdetail ORDER BY depupddat DESC LIMIT 1");
        $rs = $query->result_array();
        
        return $rs;
    }
    
    /*
     * function for check sum of depreciation from 'depheader' table
     */
    public function chkSum($company,$type,$deliveryDate) {
        $rs = $this->db->query("SELECT * FROM depheader "
                            . "WHERE cmpcd = '$company' AND dphcate = $type "
                            . "AND dphmnt = MONTH('$deliveryDate') "
                            . "AND dphyear = YEAR('$deliveryDate')");
        
        return $rs;
    }
    
     /*
     * function for insert sum of depreciation into 'depheader' table
     */
    public function insertDepHeadder($company,$type,$deliveryDate,$depPermonth,$user) {
        $this->db->query("  INSERT INTO depheader(  cmpcd, dphcate, dphmnt, dphyear, dphsumdep, 
                                                    dphcredat, dphcreusr, dphupddat, dphupdusr) 
                            VALUES ('$company', $type, MONTH('$deliveryDate'), YEAR('$deliveryDate') , $depPermonth,
                                    CURRENT_TIMESTAMP,'$user',CURRENT_TIMESTAMP,'$user')");
        
    }

}

