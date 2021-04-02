<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Admin_Model', 'admin');
    $this->load->model('Model', 'model');
  }

  public function adminlist()
  {
        $match = $this->uri->segment(3);
        $info = $this->admin->get('user_table',$match);
        echo json_encode($info);
  }

  public function add_admin()
  {
    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $status = $this->input->post('status');
    $password = 'admin123';

    $data = array(
      'name' => $name, 
      'email' => $email, 
    );

    $info = $this->model->verify('user_table',$data);
    
    $data = array(
      'name' => $name, 
      'email' => $email, 
      'status' => $status, 
      'password' => md5($password), 
    );

    if(empty($info)){
      $info = $this->model->insert('user_table', $data);
    }
    else{
      $info = array('msg' => 'error');
    }

    echo json_encode($info);
    
  }

  public function edit_admin()
  {
    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $status = $this->input->post('status');
    $password = $this->input->post('password');
    $box = $this->input->post('box');
    $id = $this->input->post('id');

    $data = array(
      'name' => $name, 
      'email' => $email, 
      'status' => $status, 
      'id !=' => $id, 
    );

    $info = $this->model->verify('user_table', $data);
    
    if(empty($info)){
      if($box==true){

        $data = array(
          'name' => $name, 
          'email' => $email, 
          'status' => $status, 
          'password' => md5($password), 
        );  
      }else{
        $data = array(
          'name' => $name, 
          'email' => $email, 
          'status' => $status, 
        );
      }

      $info = $this->model->update('user_table', $data, array('id' => $id ));

    }
    else{
      $info = array('msg' => 'error');
    }

    echo json_encode($info);
    
  }

  public function delete_admin()
  {
    $id = $this->input->post('id');

    $info = $this->model->delete('user_table', array('id' => $id));

    echo json_encode($info);
    
  }

}

?>