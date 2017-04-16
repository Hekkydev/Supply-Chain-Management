<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hubungi_kami extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
      $this->title_page("Hubungi Kami");
      $this->load_theme_frontend_large("home/hubungi_kami/index");
  }

}
