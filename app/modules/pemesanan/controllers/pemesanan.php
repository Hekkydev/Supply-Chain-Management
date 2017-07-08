<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->account = $this->authentikasi();
    $this->account_posisition = (object) $this->scm_library->include_position($this->account->kode_akses_position);
    $this->load->model(array('pemesanan_model'));
  }

  function index()
  {
      $this->title_page('Pemesanan LPG');
      $this->load_theme('pemesanan/list');
  }

  function create()
  {
      $this->title_page('Pemesanan LPG');
      $this->load_theme('pemesanan/create');
  }

}
