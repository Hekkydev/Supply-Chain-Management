<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('inbox_model'));
  }

  function index()
  {
      $data = ['inbox'=>$this->inbox_model->get_all()];
      $this->title_page('Inbox');
      $this->load_theme('inbox/inbox_list_views',$data);
  }

  public function read($id=NULL)
  {
    $data = ['inbox'=>$this->inbox_model->get_id($id)];
    $this->title_page('Inbox');
    $this->load_theme('inbox/inbox_read_views',$data);
  }

}
