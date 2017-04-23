<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('auth_model');
  }

  function index()
  {
      $this->load_theme_login("auth/login");
  }
  function login($username = null ,$password = null)
  {
      $account = $this->auth_model->cek_account($username,$password);
      if($account->num_rows() > 0)
      {
        $this->session($username,$password);
        return 1;
      }else{
        return 0;
      }
  }
  function session($username,$password)
  {
        $row_select = $this->auth_model->cek_account($username,$password)->first_row();
        $account = $this->auth_model->account_login($row_select->kode_user)->first_row();
        $newdata = array(
          'username'  => $account->username,
          'nama_lengkap' => $account->nama_lengkap,
          'kode_user'=>$account->kode_user,
          'logged_in' => TRUE
        );
        $this->session->set_userdata($newdata);
  }
  function autorization()
  {
    $post = (object) $_POST;
    $username = strip_tags($post->username);
    $password = strip_tags($post->password);


    if($this->login($username,$password) == 1)
    {
      $this->user = $this->authentikasi();
      if ($this->user->id_group == 7) {
        echo "error";
        $this->session->unset_userdata('logged_in');
      }else{
        echo "success";
      }

    }else{
      echo "error";
    }

  }

  function autorization_client()
  {
    $post = (object) $_POST;
    $username = strip_tags($post->username);
    $password = strip_tags($post->password);


    if($this->login($username,$password) == 1)
    {
      $this->user = $this->authentikasi();
      if ($this->user->id_group == 7) {
        echo json_encode(array('status'=>1,'url'=>'home',''));
      }else {
        echo json_encode(array('status'=>0,'url'=>'client_area','message'=>'Gagal login!'));
        $this->session->unset_userdata('logged_in');
      }
    }else{
      echo json_encode(array('status'=>0,'url'=>'client_area','message'=>'Gagal login!'));
    }

  }

  function logout()
  {
    $this->session->unset_userdata('logged_in');
    redirect('auth');
  }

  function logout_client()
  {
    $this->session->unset_userdata('logged_in');
    redirect('/');
  }
}
