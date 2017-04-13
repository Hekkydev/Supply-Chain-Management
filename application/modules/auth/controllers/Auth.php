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
    $username = $post->username;
    $password = $post->password;


    if($this->login($username,$password) == 1)
    {
      echo "success";
    }else{
      echo "error";
    }

  }

  function logout()
  {
    $this->session->unset_userdata('logged_in');
    redirect('auth');
  }
}
