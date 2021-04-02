<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {
    
    public function __construct(){
		$this->load->database();
	}

	// New funtions
    public function get($tableName, $whereArray)
	{

        $query = $this->db->get_where($tableName, $whereArray);

		return $query->result();
	}

    public function count($tableName, $whereArray)
	{

        $this->db->from($tableName);
        $this->db->where($whereArray);
        $result = $this->db->count_all_results();

        return $result;
	}

    public function counts($tableName, $whereArray)
	{

        $this->db->from($tableName);
        $this->db->where($whereArray);
        $result = $this->db->count_all_results();

        return $result;
	}

    public function sum($tableName, $whereArray)
    {
        $this->db->select_sum('total');
        $this->db->where($whereArray);
        $query = $this->db->get($tableName);

		return $query->result();
    }

	public function insert($tableName, $dataArray){
        $insert = $this->db->insert($tableName, $dataArray);

        if($insert){
            $data = array('msg' => 'success');
        }else{
            $data = array('msg' => 'error');
        }
        
		return $data;
    }

	public function update($tableName, $dataArray, $where){
        $this->db->where($where);

        $update = $this->db->update($tableName, $dataArray);

        if($update){
            $data = array('msg' => 'success');
        }else{
            $data = array('msg' => 'error');
        }
        
		return $data;
    }

	public function delete($tableName,$whereArray){
        $this->db->where($whereArray);
        $delete = $this->db->delete($tableName);

        if($delete){
            $data = array('msg' => 'success');
        }else{
            $data = array('msg' => 'error');
        }

        return $data;
    }

	public function group($tableName, $group, $order)
	{

        // $this->db->order_by($order);
		$this->db->select('date');
        $this->db->group_by($group);
        $this->db->order_by($order);

        $query = $this->db->get($tableName);

		return $query->result();
	}

	public function verify($tableName, $match)
	{

        $query = $this->db->get_where($tableName,$match);

		return $query->result();
	}

    public function display($tableName, $whereArray = array(), $limit = array(), $order="", $group=array())
	{
		if (!empty($limit)) {
			$this->db->limit($limit[0]);
		}
		if(!empty($order)){
			$this->db->order_by($order, 'DESC');
		}
		if(!empty($group)){
			$this->db->group_by($group[0]);
		}
		if (empty($whereArray)) {
			$query = $this->db->get($tableName);
		} else {
			$query = $this->db->get_where($tableName, $whereArray);
		}
		
		return $query->result();
	}

}

?>