<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembelian_model extends CI_Model
{

    public $table = 'scm_pembelian';
    public $id = 'id_pembelian';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function insert_pembelian_pangkalan($simpan)
    {
        $table = 'scm_pembelian_pangkalan';
        $this->db->insert($table,$simpan);
    }

    function pembelian_barang_pangkalan()
    {
        $table = 'scm_pembelian_pangkalan';
        $this->db->join('scm_pangkalan', 'scm_pangkalan.kode_pangkalan = scm_pembelian_pangkalan.kode_pangkalan', 'left');
        return $this->db->get($table)->result();
    }

    function pembelian_barang_pangkalan_detail($Id)
    {
        $table = 'scm_pembelian_pangkalan';
        $this->db->where('Id', $Id);
        $this->db->join('scm_pangkalan', 'scm_pangkalan.kode_pangkalan = scm_pembelian_pangkalan.kode_pangkalan', 'left');
        return $this->db->get($table)->first_row();
    }


    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pembelian', $q);
      	$this->db->or_like('kode_pembelian', $q);
      	$this->db->or_like('tanggal_pembelian', $q);
      	$this->db->or_like('keterangan', $q);
      	$this->db->or_like('created', $q);
      	$this->db->or_like('modified', $q);
      	$this->db->or_like('deleted', $q);
      	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pembelian', $q);
      	$this->db->or_like('kode_pembelian', $q);
      	$this->db->or_like('tanggal_pembelian', $q);
      	$this->db->or_like('keterangan', $q);
      	$this->db->or_like('created', $q);
      	$this->db->or_like('modified', $q);
      	$this->db->or_like('deleted', $q);
      	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }


    // get total rows
    function total_rows_pembelian($q = NULL,$Id_user) {
        $this->db->where('id_user', $Id_user);
        $this->db->from($this->table);
        return $this->db->get()->num_rows();
    }

    // get data with limit and search
    function get_limit_data_pembelian($limit, $start = 0, $q = NULL,$Id_user) {
      $this->db->where('id_user', $Id_user);
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }



    public function generate_auto_kode()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_pembelian,3)) as kd_max from scm_pembelian");
        $tanggal_pembelian = date('Ymd');
        $kode_random = $this->generate();
        $kd = "";
        if($q->num_rows() > 0)
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
        return $kode_random.'-'.$tanggal_pembelian.'-'.$kd;
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

   public function get_penerima_by_kode_pembelian($kode_pembelian)
   {
      $this->db->where('kode_pembelian',$kode_pembelian);
      $query =  $this->db->get('scm_pembelian_pengiriman');
      return $query->first_row();
   }

   public function list_item($kode_pembelian)
   {
       $this->db->where('kode_pembelian',$kode_pembelian);
       return $this->db->get('scm_pembelian_item')->result_array();
   }
}
