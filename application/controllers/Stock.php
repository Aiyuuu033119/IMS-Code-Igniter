<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

  public function __construct(){
    parent::__construct();

      $this->load->helper('url');
      $this->load->model('Stock_Model', 'stock');
      $this->load->model('Model', 'model');
  }

  public  function stocklist()
  {
      $match = $this->uri->segment(3);
      $info = $this->stock->get('goods_table',$match);
      echo json_encode($info);
  }

  public  function add_stock()
  {
      $name = $this->input->post('name');
      $quantity = $this->input->post('quantity');
      $price = $this->input->post('price');

      $data = array('name' => $name, 'quantity' => $quantity, 'price' => $price, 'status' => 0);

      $info = $this->model->insert('goods_table',$data);

      echo json_encode($info);

  }

  public  function edit_status()
  {
    
      $id = $this->input->post('id');

      $data = array('status' => 1);

      $info = $this->model->update('goods_table',$data, array('id' => $id ));

      echo json_encode($info);

  }

  public  function edit_stock()
  {
      $name = $this->input->post('name');
      $quantity = $this->input->post('quantity');
      $price = $this->input->post('price');
      $id = $this->input->post('id');

      $data = array('name' => $name, 'quantity' => $quantity, 'price' => $price);

      $info = $this->model->update('goods_table',$data, array('id' => $id ));

      echo json_encode($info);

  }

  public  function delete_stock()
  {
      $id = $this->input->post('id');

      $info = $this->model->delete('goods_table', array('id' => $id ));

      echo json_encode($info);
  }
  
}

?>