<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model {
    
    public function __construct(){
		$this->load->database();
	}

    public function check_credentials($username, $password)
	{
		$query = $this->db->get_where('user_table', array('email' => $username, 'password' => $password));
		return $query->result();
	} 

    

}

?>