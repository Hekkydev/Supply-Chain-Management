<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->table = "users";
  }

  public function cek_account($username,$password)
  {
            $this->db->where('password', md5($password));
            $this->db->where('username', $username);
            $this->db->where('id_status',6);
    return $this->db->get($this->table);
  }


  public function account_login($kode_user)
  {
          $this->db->select('*');
          $this->db->from($this->table);
          $this->db->join('users_group', 'users_group.id_group = users.id_group', 'left');
          $this->db->where('users.kode_user', $kode_user);
      return $this->db->get();
  }


}
