<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'scm_inbox';
  }

  public function get_all($value='')
  {
    return $this->db->get($this->table)->result();
  }

  public function get_id($id)
  {
    return $this->db->get($this->table,array('id_inbox'=>$id))->first_row();
  }

}
