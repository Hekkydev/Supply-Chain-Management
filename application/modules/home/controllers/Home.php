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
        $this->data['about'] = $this->about_application();
        $this->title_page("About Supply Chain Management");
        $this->load_theme_frontend_large("home/about/index",$this->data);
  }



  function error()
  {
       $this->load_theme_frontend_home('home/halaman_error');
  }

}
