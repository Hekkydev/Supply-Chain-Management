<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller{

  public function __construct()
  {
    parent::__construct();

  }

  function index()
  {
      $this->load_theme_login("auth/login");
  }
  function login()
  {
    
  }

  function autorization()
  {
    echo "success";
  }
  
  function logout()
  {
    redirect('auth');
  }
}
