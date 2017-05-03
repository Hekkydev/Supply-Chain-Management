<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyaluran extends MY_Controller{

  public function __construct()
  {
    parent::__construct();

  }

  function index()
  {

  }

  function add() {
      $this->title_page('INPUT RENCANA PENYALURAN');
      $this->load_theme('penyaluran/form');
  }

}
