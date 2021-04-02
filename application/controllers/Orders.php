<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->helper('url');
    $this->load->model('Orders_Model', 'orders');
    $this->load->model('Model', 'model');
  }

  public  function orderlist()
  {
    $date = $this->uri->segment(3);
    $match = $this->uri->segment(4);
    $info = $this->orders->get('invent_table', array('date' => $date), $match);
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

  public  function revert()
  {
    
    $id = $this->input->post('id');
    $product_id = $this->input->post('product_id');
    $name = $this->input->post('name');
    $quantity = $this->input->post('quantity');
    $price = $this->input->post('price');

    $info = $this->orders->check('goods_table', array('id' => $product_id ));

    if(empty($info)){
        
      $data = array(
          'id' => $product_id,
          'name' => $name,
          'quantity' => $quantity,
          'price' => $price,
          'status' => 1
      );

      $info = $this->model->insert('goods_table',$data);

    }else{
        
      $data = array(
          'quantity' => intval($quantity)+intval($info['0']->quantity),
      );

      $info = $this->model->update('goods_table',$data, array('id' => $product_id ));
    }

    $info = $this->model->delete('invent_table', array('id' => $id ));

    echo json_encode($info);

  }
  
}

?>