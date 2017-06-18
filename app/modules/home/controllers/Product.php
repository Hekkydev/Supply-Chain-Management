<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('../modules/scm_barang/models/Scm_barang_model');

  }

  function index()
  {
          $data['item'] = $this->Scm_barang_model->get_product();
          $this->load_theme_frontend('home/product/index',$data);
  }

  function product_detail($num)
  {
          $data = array();
          $data['item'] = $this->Scm_barang_model->get_product_detail($num);
          if($data['item'] == TRUE):
          $this->load_theme_frontend('home/product/detail_product',$data);
          else:
            redirect('product');
          endif;
  }

}
