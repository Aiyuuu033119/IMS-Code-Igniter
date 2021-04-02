<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct(){
    parent::__construct();

        $this->load->model('Model', 'model');
  }

  public function orders()
  {
    $info = $this->model->display('invent_table', array('date' => date("Y-m-d")), array(5), '', array());

    echo json_encode($info);

  }

  public function stock()
  {
    $info = $this->model->display('goods_table', array('status' => 0), array(5), '', array());

    echo json_encode($info);

  }

}