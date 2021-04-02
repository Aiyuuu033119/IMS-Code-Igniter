<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

  public function __construct(){
    parent::__construct();

        $this->load->helper('url');
        $this->load->model('Products_Model', 'products');
        $this->load->model('Model', 'model');
  }

  public  function productlist()
  {
    $match = $this->uri->segment(3);
    $info = $this->products->get('goods_table',$match);
    echo json_encode($info);
  }

  public  function edit_status()
  {
    
    $id = $this->input->post('id');

    $data = array('status' => 0);

    $info = $this->model->update('goods_table',$data, array('id' => $id ));

    echo json_encode($info);

  }

  public  function purchase()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $quantity = $this->input->post('quantity');
    $total_quantity = $this->input->post('total-quantity');
    $total = $this->input->post('total');
    $date = $this->input->post('date');

    $data = array('product_id' => $id, 'name' => $name, 'quantity' => $quantity, 'total' => $total, 'date' => $date);

    $info = $this->model->insert('invent_table',$data);

    if($info['msg']=='success'){

        if(intval($quantity)==intval($total_quantity)){
          $info = $this->model->delete('goods_table', array('id' => $id ));
        }
        else{
          $data = array('quantity' => intval($total_quantity)-intval($quantity));
          $info = $this->model->update('goods_table', $data ,array('id' => $id));
        }
        
    }
    else{
        $info = array('msg' => 'error' );
    }

    echo json_encode($info);

  }
  
  
}

?>