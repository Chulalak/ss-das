<?php

class SignUp_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function chkUser($username)
    {
        // Check username
        $query = $this->db->get_where('user', array('USRNAME' => $username));

        return $query->num_rows();
    }
    
    public function saveToDatabase($username,$password,$fname,$lname,$email) {        
        // Check username
        $num_rows = $this->chkUser($username);
        if ($num_rows == 0) {
            $this->db->query("INSERT INTO user(USRNAME, USRPASS, USRFNAME, USRLNAME, USREMAIL, USRCREDAT, USRUDDAT)
                                VALUES ('$username','$password','$fname','$lname','$email',CURRENT_DATE,'INTITIAL')");
            return true;
        }
        return false;
        
    }

}

