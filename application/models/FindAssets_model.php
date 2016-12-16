<?php

class FindAssets_model extends CI_Model
{

    public function __construct()
    {
      parent::__construct();
    }

    public function search($company){
        $rs = $this->db->query("SELECT DUR.DRAID AS 'DurableId'
                                      ,TYP.TBDDESC As 'DurableType'
                                      ,DUR.DRANAME As 'DurableName'
                                      ,DATE_FORMAT(DUR.DRADAT,'%d/%m/%Y') AS 'DeliveryDate'
                                      ,DUR.DRAAMT AS 'Amount'
                                      ,DUR.DRAUNTPRC AS 'UnitPrice'
                                      ,DUR.DRATOTPRC AS 'TotalPrice'
                                      ,DUR.DRAACC AS 'ACC'
                                      ,DUR.DRASTAT AS 'Status'
                                FROM DURABLEARTICLES DUR JOIN tabledetail TYP on TYP.TBDNO = 100 and TYP.TBDCD = DUR.DRATYP
                                WHERE CMPCD = '$company'");
        $query = $rs->result_array();

        return $query;
    }
    
 


}

 ?>
