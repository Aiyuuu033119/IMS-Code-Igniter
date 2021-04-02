<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    public function __construct(){
		parent::__construct();

        $this->load->helper('url');
		$this->load->model('Model', 'model');
	}

    public  function dashboard()
	{
		if(isset($_SESSION['name'])){
			$data['title'] = 'Dashboard';
			$data['sales'] = $this->model->sum('invent_table', array('date' => date("Y-m-d")));
			$data['stock'] = $this->model->counts('goods_table', array('status' => 0 ));
			$data['product'] = $this->model->counts('goods_table', array('status' => 1 ));
			$data['order'] = $this->model->counts('invent_table', array('date' => date("Y-m-d")));
			// $data['order'] = $this->model->count_rows('class_table');
			$this->load->view('application/dashboard',$data);
		}
		else{
			redirect('auth/login');
		}
        
	}

    public  function stocklist()
	{
		if(isset($_SESSION['name'])){
	        $data['title'] = 'Stock';
			$this->load->view('application/stocklist',$data);
		}
		else{
			redirect('auth/login');
		}
	}

    public  function productlist()
	{
		if(isset($_SESSION['name'])){
	        $data['title'] = 'Products';
			$this->load->view('application/productlist',$data);
		}
		else{
			redirect('auth/login');
		}
	}

    public  function orderlist()
	{
        
		if(isset($_SESSION['name'])){
	        $data['title'] = 'Orders';
			$data['date'] = $this->model->group('invent_table', array('date'), 'date DESC');
			$this->load->view('application/orderlist',$data);
		}
		else{
			redirect('auth/login');
		}

	}

    public  function inventorylist()
	{
        
		if(isset($_SESSION['name'])){
	        $data['title'] = 'Inventory';
			$data['date'] = $this->model->group('invent_table', array('date'), 'date DESC');
			$this->load->view('application/inventorylist',$data);
		}
		else{
			redirect('auth/login');
		}
	}

    public  function generatereports()
	{
		if(isset($_SESSION['name'])){
	        $data['title'] = 'Generate Reports';
			$data['date'] = $this->model->group('invent_table', array('date'), 'date DESC');
			$this->load->view('application/reports',$data);	
		}
		else{
			redirect('auth/login');
		}
        
	}
	
    public  function administrator()
	{
		if(isset($_SESSION['name'])){
	        $data['title'] = 'Administrator';
			$this->load->view('application/administrator',$data);
		}
		else{
			redirect('auth/login');
		}
        
	}

    public  function profile()
	{
        if(isset($_SESSION['name'])){
	        $data['title'] = 'Profile';
			$data['info'] = $this->model->verify('user_table', array('name' => $_SESSION['name']));
			$this->load->view('application/profile',$data);
		}
		else{
			redirect('auth/login');
		}

	}
	
}

?>