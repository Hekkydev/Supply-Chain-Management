<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_page extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->data['about'] = $this->about_application();
    $this->title_page('Halaman About');
    $this->load_theme('about_page/page',$this->data);
  }

  function about_update()
  {
      $about = $this->input->post('about');
      $array = array(
        'about_page'=>$about,
      );

      $update = $this->about_application_update($array);
      if($update == TRUE)
      {
        echo json_encode(array('error'=>0,'message'=>'Berhasil mengupdate data halaman about !'));
      }else{
        echo json_encode(array('error'=>0,'message'=>'Gagal mengupdate data halaman about !'));
      }

  }

}
