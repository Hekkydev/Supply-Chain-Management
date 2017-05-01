<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->account = $this->authentikasi();
    $this->account_position = $this->scm_library->include_position($this->account->kode_akses_position);
  }

  function index()
  {
      $data['account'] = $this->account;
      $data['account_position'] = (object) $this->account_position;
      $this->title_page('Profil Akun');
      $this->load_theme('users/account/profile',$data);
  }


  function history()
  {
    $this->title_page('History');
    $this->load_theme('users/account/profile');
  }
}
