<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

  public function __construct(){
    parent::__construct();

        $this->load->helper('url');
        $this->load->model('Inventory_Model', 'inventory');
        $this->load->model('Model', 'model');
  }

  public  function inventorylist()
  {
        $date = $this->uri->segment(3);
        $match = $this->uri->segment(4);
        $info = $this->inventory->get('invent_table', array('date' => $date), $match);
        echo json_encode($info);
  }

  
}

?>