<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_Model extends CI_Model {
    
    public function __construct(){
		$this->load->database();
	}

    public function get($tableName, $date, $match)
	{

        if($match!=null){
            $this->db->like('name', $match);
        }
        $this->db->select('name');
        $this->db->select_sum('quantity');
        $this->db->select_sum('total');
        $this->db->order_by('id', 'DESC');
        $this->db->order_by('date', 'DESC');
        $this->db->order_by('time', 'DESC');
        $this->db->group_by('product_id');

        $query = $this->db->get_where($tableName, $date);

		return $query->result();

	}

}

?>