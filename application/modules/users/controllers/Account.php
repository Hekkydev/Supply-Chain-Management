<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->account = $this->authentikasi();
  }

  function index()
  {
      $this->title_page('Profil Akun');
      $this->load_theme('users/account/profile');
  }


  function history()
  {
    $this->title_page('History');
    $this->load_theme('users/account/profile');
  }
}
