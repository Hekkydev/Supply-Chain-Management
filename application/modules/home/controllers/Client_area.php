<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_area extends MY_Controller{

  public function __construct()
  {
      parent::__construct();

  }

  function index()
  {
      $this->title_page("Client Area");
      $this->load_theme_frontend_large('home/client_area/index');
  }


  public function register()
  {
    $this->title_page("Client Area Register");
    $this->load_theme_frontend_large('home/client_area/register');

  }
}
