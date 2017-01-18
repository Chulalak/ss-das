<?php

class SignUp_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    /*
     * function for check username 
     */
    
    public function chkUser($username)
    {
        // Check username
        $query = $this->db->get_where('user', array('USRNAME' => $username));

        return $query->num_rows();
    }
    
    /*
     * function for save data from register form to database
     */   
    public function saveToDatabase($username,$password,$fname,$lname,$email) {        
        $rs =   $this->db->query("INSERT INTO user(USRNAME, USRPASS, USRFNAME, USRLNAME, USREMAIL, USRCREDAT, USRUDDAT)
                                VALUES ('$username','$password','$fname','$lname','$email',CURRENT_DATE,'INTITIAL')");
        return $rs;
    }

}

