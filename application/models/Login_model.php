<?php
class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function authen($username,$password) {
        $query = $this->db->get_where('USER', array('USRNAME' => $username, 'USRPASS' => $password));

        return $query->num_rows();

    }
}

