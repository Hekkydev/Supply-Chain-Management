<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller{

  public function __construct()
  {
    parent::__construct();

  }

  function index()
  {
          $this->load_theme_frontend_home('home/index');
  }

  function about()
  {
        $this->load->view("home/about/index");
  }

}
