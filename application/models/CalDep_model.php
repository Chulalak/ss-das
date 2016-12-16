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
                                  ,DATE_FORMAT(DEP.DEPDAT,'%d/%m/%Y') AS 'DeliveryDate'
                                  ,DEP.DEPLASTCST AS 'Cost'
                                  ,DUR.DRADEPRT AS 'DepRate'
                                  ,dep.DEPBVCUR AS 'LastBV'
                                  ,DEP.DEPLASTMNT AS 'LastMonths'
                                  ,DEPCURMNT+1 AS 'CurrentMonth'
                                  ,(DEPCURMNT+1 + DEP.DEPLASTMNT) AS 'AllMonths'
                                  ,dep.DEPACCDEPALL AS 'LastDepAcc'
                                  ,round(((DEP.DEPLASTCST*DUR.DRADEPRT)/100/12),2) AS 'depPerMonth'
                                  ,round((((DEP.DEPLASTCST*DUR.DRADEPRT)/100/12)* $month+1),2)AS 'CurrentDepAcc'
                                  ,round((((DEP.DEPLASTCST*DUR.DRADEPRT)/100/12)*($month+1 + DEP.DEPLASTMNT)),2) AS 'DepAccAll'
                                  ,round(DEP.DEPLASTCST-(((DEP.DEPLASTCST*DUR.DRADEPRT)/100/12)*($month + DEP.DEPLASTMNT)),2) AS 'DepBVCurrent'
                                FROM depdetail DEP JOIN DURABLEARTICLES DUR ON DUR.DRAID = DEP.DRAID
                                WHERE DUR.CMPCD = '$company' and dur.DRATYP= $cate and DEPMNT = $month and dep.DEPYEAR=$year");
        $query = $rs->result_array();
        return $query;
    }

    public function search($company, $cate, $month, $year){
        $rs = $this->db->query("SELECT DUR.DRAID
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
                                FROM depdetail DEP JOIN DURABLEARTICLES DUR ON DUR.DRAID = DEP.DRAID
                                WHERE dur.CMPCD = '$company' and dur.DRATYP= $cate and DEPMNT = $month and dep.DEPYEAR=$year");
        $query = $rs->result_array();

        return $query;
    }
    
    public function getData($company, $cate, $month, $year){
        $rs = $this->db->query("SELECT DUR.DRAID
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
                                FROM depdetail DEP JOIN DURABLEARTICLES DUR ON DUR.DRAID = DEP.DRAID
                                WHERE dur.CMPCD = '$company' and dur.DRATYP= $cate and DEPMNT = $month and dep.DEPYEAR=$year");
//        $query = $rs->result_array();
//        $rows = $rs->num_rows();

        return $rs;
    }

}
?>
