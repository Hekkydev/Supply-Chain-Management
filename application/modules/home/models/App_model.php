<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_model extends CI_Model{
  function sending_pesan($data)
  {
    return $this->db->insert('scm_inbox', $data);
  }
}
