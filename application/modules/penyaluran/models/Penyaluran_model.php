<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyaluran_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->table = 'scm_penyaluran_barang';
  }

  function kode_penyaluran() {
        $q = $this->db->query("select MAX(RIGHT(kode_penyaluran,3)) as kd_max from scm_penyaluran_barang");
        $generate = $this->generate();
        $time = date('Ymd');
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "P".$generate.'-'.$time.$kd;
  }

  function generate($length = 5) {

     $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $charactersLength = strlen($characters);
     $randomString = '';
     for ($i = 0; $i < $length; $i++) {
         $randomString .= $characters[rand(0, $charactersLength - 1)];
         }
     return $randomString;
 }

 function insert_penyaluran_data($data) {
  return $this->db->get($this->table);
 }

}
