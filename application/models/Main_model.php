<?php
class Main_model extends CI_Model
{
  public function __construct()
	{
		parent::__construct();
  }

  /*
   * function for get company data
   */
  public function getCompany(){
    $rs = $this->db->query('SELECT * FROM company');
    $query = $rs->result_array();
    return $query;
  }
  
   /*
   * function for get category data
   */

  public function getCategory(){
    $rs = $this->db->query("SELECT TBDNO,TBDCD,TBDDESC FROM tabledetail WHERE TBDNO = 100");
    $query = $rs->result_array();
    return $query;
  }
   /*
   * function for get month
   */

  public function getMonth(){
    $rs = $this->db->query("SELECT TBDNO,TBDCD,TBDDESC FROM tabledetail WHERE TBDNO = 101 ORDER BY TBDCD");
    $query = $rs->result_array();
    return $query;
  }
}
