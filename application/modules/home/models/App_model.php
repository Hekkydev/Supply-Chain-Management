<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_model extends CI_Model{
  function sending_pesan($data)
  {
    return $this->db->insert('scm_inbox', $data);
  }

  function about_application()
  {
    $page = $this->db->get('scm_about_page')->first_row();
    if ($page == TRUE) {
      return $page->about_page;
    }else {
      return NULL;
    }
  }

  function about_application_update($data)
  {
    return $this->db->update('scm_about_page', $data);
  }
}
