<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Model
 */
class Aplikasi_model extends CI_Model
{
    
    function status_pengguna()
    {
        $this->db->where('id_status != ',1);
        $this->db->where('id_status !=',2);
        $this->db->where('id_status !=',3);
        $this->db->where('id_status !=',4);
        $this->db->where('id_status !=',5);
       return $this->db->get('scm_status')->result_object();
    }

}


/* End of file aplikasi model.php */
