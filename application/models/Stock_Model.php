<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_Model extends CI_Model {
    
    public function __construct(){
		$this->load->database();
	}

    public function get($tableName, $match)
	{
        if($match!=null){
            $this->db->like('name', $match);
        }
        
        $this->db->order_by('id', 'DESC');

        $query = $this->db->get_where($tableName, array('status' => 0 ));

		return $query->result();
	}

    

}

?>