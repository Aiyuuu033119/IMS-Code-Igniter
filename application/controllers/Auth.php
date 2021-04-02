<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
		parent::__construct();

        $this->load->helper('url');
        $this->load->model('Auth_Model', 'auth');
        $this->load->model('Model', 'model');
	}

	public  function index()
	{
		redirect('auth/login');
	}

    public  function login()
	{
		
		if(!isset($_SESSION['name'])){
			$this->load->view('login');
		}else{
			redirect('app/dashboard');
		}
	}
	
	public function loginProc() {
        $email = $this->input->post('email');
		$password = $this->input->post('password');

        $results = $this->auth->check_credentials($email, md5($password));

		if (!empty($results)) {
			
			$info = $this->model->get('user_table', array('id' => $results[0]->id), array(), '');
			
			if(!empty($info)){
				$name = $info[0]->name;
				$id = $info[0]->id;

				$sessionArray = array(
					'msg' => 'success',
					'name' => $name,
					'status' => $info[0]->status,
					'id' => $id,
				);

				$this->session->set_userdata($sessionArray);

				echo json_encode($sessionArray);
			}
			
		} else {
			$sessionArray = array(
				'msg' => 'error'
			);

			echo json_encode($sessionArray);
		}
		
    }

	public function logout(){
        $this->session->sess_destroy();
        redirect("auth/login");
    }

	public  function booklist()
	{
		$arrayName = array('id' => 213 );
		echo json_encode($arrayName);
	}
}

?>