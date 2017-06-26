<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'scm_pengiriman';
  }

  public function total_rows($q = NULL)
  {
    $query = $this->db->get($this->table)->num_rows();
    return $query;
  }

  public function get_limit_data($q = NULL)
  {
    $query = $this->db->get($this->table)->result();
    return $query;
  }
  public function insert($data)
  {
    $this->db->insert($this->table);
  }

  public function get()
  {
    return $query = $this->db->get($this->table)->result_object();
  }

}
