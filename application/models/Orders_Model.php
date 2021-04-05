<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_Model extends CI_Model {
    
    public function __construct(){
		$this->load->database();
	}

    public function get($tableName, $date, $match)
	{
        if($match!=null){
            $this->db->like('name', $match);
            // $this->db->or_like('date', $date);
        }
        $this->db->order_by('id', 'DESC');
        $this->db->order_by('date', 'DESC');
        $this->db->order_by('time', 'DESC');

        $query = $this->db->get_where($tableName, $date);

		return $query->result();
	}

    public function check($tableName, $whereArray)
    {
        $query = $this->db->get_where($tableName, $whereArray);

		return $query->result();
    }

}

?>