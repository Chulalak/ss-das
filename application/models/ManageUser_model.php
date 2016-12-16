<?php

class ManageUser_model extends CI_Model{

    function __construct() {
        parent::__construct();
    }
    
    public function searchUser() {
        $rs = $this->db->query("SELECT USRID AS 'ID'
                                       ,USRNAME AS 'username'
                                       ,USRROLE AS 'role'
                                       ,USRFNAME AS 'fname'
                                       ,USRLNAME AS 'lname'
                                       ,USREMAIL AS 'email' 
                                FROM user ");
        $query = $rs->result_array();

        return $query;
    }
    
    public function deleteUserInDatabase($id) {
       
        $rs = $this->db->delete('user', ['USRID' => $id]);  
        // Produces: // DELETE FROM mytable  // WHERE id = $id
        return $rs;
    }
    
    public function insertUser($username,$password,$fname,$lname,$email,$role){
        $rs = $this->db->query("INSERT INTO user(USRNAME, USRPASS, USRROLE, USRFNAME, USRLNAME, USREMAIL, USRCREDAT, USRUDDAT)
                                VALUES ('$username','$password','$role','$fname','$lname','$email',CURRENT_DATE,'INTITIAL')");
        return $rs;
    }
    
    public function getUserInfo($id){
        $rs = $this->db->query("SELECT USRID AS 'ID'
                                    ,USRNAME AS 'username'
                                    , USRPASS AS 'passwd'
                                    , USRROLE AS 'role'
                                    , USRFNAME AS 'fname'
                                    , USRLNAME AS 'lname'
                                    , USREMAIL AS 'email'
                                FROM user 
                                WHERE USRID = $id ");
        $query = $rs->result_array();
        return $query;
    }

}

