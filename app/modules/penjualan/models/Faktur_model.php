<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Faktur_model extends CI_Model {

    function agen($agen)
    {
        return $this->db->select('*')
                                ->from('scm_faktur as a')
                                ->join('scm_agen as b','b.kode_agen = a.kode_agen','left')
                                ->join('scm_pangkalan as c','c.kode_pangkalan = a.kode_pangkalan','left')
                                ->where('a.kode_agen',$agen)
                                ->get()->result();
    }

    function pangkalan($pangkalan)
    {
        return $this->db->select('*')
                                ->from('scm_faktur as a')
                                ->join('scm_agen as b','b.kode_agen = a.kode_agen','left')
                                ->join('scm_pangkalan as c','c.kode_pangkalan = a.kode_pangkalan','left')
                                ->where('a.kode_pangkalan',$pangkalan)
                                ->get()->result();
    }


    function getByKode($kode_faktur)
    {
            return $this->db->select('*')
                            ->from('scm_faktur as a')
                            ->join('scm_agen as b','b.kode_agen = a.kode_agen','left')
                            ->join('scm_pangkalan as c','c.kode_pangkalan = a.kode_pangkalan','left')
                            ->where('a.kode_faktur',$kode_faktur)
                            ->get()->first_row();
    }

    function getItem($kode_faktur)
    {
            return $this->db->select('*')
                            ->from('scm_faktur_item as a')
                            ->join('scm_barang as b','b.kode_barang = a.kode_barang','left')
                            ->where('a.kode_faktur',$kode_faktur)
                            ->get()->result();
    }

}

/* End of file Faktur_model.php */
