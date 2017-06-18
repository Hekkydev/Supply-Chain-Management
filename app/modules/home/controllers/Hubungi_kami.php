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

      $this->account = $this->authentikasi_client();
      $this->data['account'] = $this->account;
      $this->data['hubungi_kami'] = $this->hubungi_kami_form();
      $this->title_page("Hubungi Kami");
      $this->load_theme_frontend_large("home/hubungi_kami/index",$this->data);
  }

  function hubungi_kami_form()
  {
      $this->account = $this->authentikasi_client();
      if ($this->account == TRUE) {
        $hubungi = (object) array(
          'id_user'=>$this->account->id_user,
          'name'=>$this->account->nama_lengkap,
          'email'=>'',
          'subject'=>'',
          'message'=>'',
        );
        return $hubungi;
      }else{
        $hubungi = (object) array(
          'id_user'=>'',
          'name'=>'',
          'email'=>'',
          'subject'=>'',
          'message'=>'',
        );
        return $hubungi;
      }
  }

  public function send_message()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'nama', 'required|trim');
    $this->form_validation->set_rules('email', 'email', 'required|trim');
    $this->form_validation->set_rules('subject', 'subject', 'required|trim');
    $this->form_validation->set_rules('message', 'message', 'required|trim');

    if ($this->form_validation->run() === FALSE) {
          echo json_encode(array(
            'error'=>0,
            'message'=>'Lengkapi data pesan! ',
          ));
    }else{
          $data = array(
            'id_user'=>$this->input->post('id_user'),
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'subject'=>$this->input->post('subject'),
            'message'=>$this->input->post('message'),
          );
          $simpan = $this->sending_pesan($data);
          if ($simpan == TRUE) {
            echo json_encode(array(
              'error'=>0,
              'message'=>'Berhasil mengirim pesan! ',
            ));
          }else{
            echo json_encode(array(
              'error'=>0,
              'message'=>'Gagal mengirim pesan! ',
            ));
          }
    }
  }

}
