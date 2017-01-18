<?php
class CalDep_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function calDepreciation($company, $cate, $month, $year){
        $rs = $this->db->query("SELECT DUR.DRAID AS 'ID'
                                    ,DUR.DRANAME AS 'Name'
                                    ,DUR.DRAAMT AS 'Amount'
                                    ,DUR.DRATYP AS 'Type'
                                    ,DATE_FORMAT(DUR.DRADAT,'%d/%m/%Y') AS 'DeliveryDate'
                                    ,DUR.DRATOTPRC AS 'Cost'
                                    ,DUR.DRADEPRT AS 'DepRate'
                                    ,dep.DEPBVCUR AS 'LastBV'
                                    ,if($month=1,DEP.DEPALLMNT,DEP.DEPLASTMNT) AS 'LastMonths'
                                    ,if($month=1,1,$month) AS 'CurrentMonth'
                                    ,if($month=1,1+DEP.DEPALLMNT,$month+DEP.DEPLASTMNT) AS 'AllMonths'
                                    ,if($month=1,dep.DEPACCDEPALL,dep.DEPACCDEPLAST) AS 'LastDepAcc'
                                    ,round(((DUR.DRATOTPRC*DUR.DRADEPRT)/100/12),2) AS 'depPerMonth'
                                    ,round((((DUR.DRATOTPRC*DUR.DRADEPRT)/100/12)* $month),2)AS 'CurrentDepAcc'
                                    ,round((((DUR.DRATOTPRC*DUR.DRADEPRT)/100/12)* if($month=1,$month+DEP.DEPALLMNT,$month+DEP.DEPLASTMNT)),2) AS 'DepAccAll'
                                    ,round(DUR.DRATOTPRC -(((DUR.DRATOTPRC*DUR.DRADEPRT)/100/12)* if($month=1,$month+DEP.DEPALLMNT,$month+DEP.DEPLASTMNT)),2) AS 'DepBVCurrent'   
                                FROM depdetail DEP JOIN DURABLEARTICLES DUR ON DUR.DRAID = DEP.DRAID
                                WHERE DUR.CMPCD = '$company' and dur.DRATYP = $cate and DEPMNT = if($month=1,12,$month-1) and dep.DEPYEAR= if($month=1,$year-1,$year)");
        $query = $rs->result_array();
        return $query;
    }

    public function search($company, $cate, $month, $year){
        $rs = $this->db->query("SELECT  HDR.DPHHDR
                                        ,HDR.DPHSUMDEP
                                        ,DUR.DRAID
                                        ,DUR.DRANAME
                                        ,DUR.DRAAMT
                                        ,DUR.DRATYP
                                        ,DATE_FORMAT(DEP.DEPDAT,'%d/%m/%Y') AS DEPDAT
                                        ,DEP.DEPLASTCST
                                        ,DUR.DRADEPRT
                                        ,DEP.DEPLASTBV
                                        ,DEP.DEPLASTMNT
                                        ,DEP.DEPCURMNT
                                        ,dep.DEPALLMNT
                                        ,dep.DEPACCDEPLAST
                                        ,dep.DEPDEPPERMNT
                                        ,dep.DEPACCDEPCUR
                                        ,dep.DEPACCDEPALL
                                        ,dep.DEPBVCUR
                                FROM depdetail DEP
                                JOIN depheader HDR ON HDR.dphhdr = DEP.dphhdr
                                JOIN DURABLEARTICLES DUR ON DUR.DRAID = DEP.DRAID
                                WHERE dur.CMPCD = '$company' and dur.DRATYP= $cate and DEPMNT = $month and dep.DEPYEAR=$year");
        $query = $rs->result_array();

        return $query;
    }
    
    public function getData($company, $cate, $month, $year){
        $rs = $this->db->query("SELECT  hdr.dphhdr
                                        ,cmp.cmplname
                                        ,hdr.dphsumdep
                                        ,dur.draid
                                        ,dur.draname
                                        ,dur.draamt
                                        ,dur.dratyp
                                        ,dtl.tbddesc
                                        ,date_format(dep.depdat,'%d/%m/%Y') AS depdat
                                        ,dep.deplastcst
                                        ,dur.dradeprt
                                        ,dep.deplastbv
                                        ,dep.deplastmnt
                                        ,dep.depcurmnt
                                        ,dep.depallmnt
                                        ,dep.depaccdeplast
                                        ,dep.depdeppermnt
                                        ,dep.depaccdepcur
                                        ,dep.depaccdepall
                                        ,dep.depbvcur
                                 FROM depdetail dep
                                 JOIN depheader hdr ON hdr.dphhdr = dep.dphhdr
                                 JOIN durablearticles dur ON dur.draid = dep.draid
                                 JOIN company cmp ON cmp.cmpcd = dur.cmpcd
                                 JOIN tabledetail dtl ON dtl.tbdno = 100 and dtl.tbdcd = dur.dratyp
                                 WHERE dur.cmpcd = '$company' AND dur.dratyp= $cate AND depmnt = $month AND dep.depyear = $year");
//        $query = $rs->result_array();
//        $rows = $rs->num_rows();

        return $rs;
    }

}
?>
