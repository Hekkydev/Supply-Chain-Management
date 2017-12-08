<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Scm_pangkalan_model extends CI_Model
{

    public $table = 'scm_pangkalan';
    public $id = 'id_pangkalan';
    public $order = 'DESC';
    public $kode = 'kode_pangkalan';

    function __construct()
    {
        parent::__construct();
    }

    function get_all_stock()
    {
      $this->db->select('*');
              $this->db->from('scm_barang_stock_pangkalan as a');
              $this->db->join('scm_pangkalan as b', 'b.id_pangkalan = a.id_pangkalan', 'left');
              $this->db->join('scm_status as c', 'c.id_status = a.id_status', 'left');
        return $this->db->get()->result();
    }

    function get_stock_detail($id)
    {
      $this->db->select('*');
              $this->db->from('scm_barang_stock_pangkalan as a');
              $this->db->join('scm_pangkalan as b', 'b.id_pangkalan = a.id_pangkalan', 'left');
              $this->db->join('scm_status as c', 'c.id_status = a.id_status', 'left');
              $this->db->where('a.id_stock', $id);
        return $this->db->get()->first_row();
    }
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    function get_by_kode($kode)
    {
        $this->db->where($this->kode, $kode);
        return $this->db->get($this->table)->row();
    }
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pangkalan', $q);
      	$this->db->or_like('id_user', $q);
      	$this->db->or_like('kode_pangkalan', $q);
      	$this->db->or_like('kode_agen', $q);
      	$this->db->or_like('nama_pangkalan', $q);
      	$this->db->or_like('alamat_pangkalan', $q);
      	$this->db->or_like('kelurahan', $q);
      	$this->db->or_like('no_telp', $q);
      	$this->db->or_like('created_date', $q);
      	$this->db->or_like('deleted_date', $q);
      	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pangkalan', $q);
      	$this->db->or_like('id_user', $q);
      	$this->db->or_like('kode_pangkalan', $q);
      	$this->db->or_like('kode_agen', $q);
      	$this->db->or_like('nama_pangkalan', $q);
      	$this->db->or_like('alamat_pangkalan', $q);
      	$this->db->or_like('kelurahan', $q);
      	$this->db->or_like('no_telp', $q);
      	$this->db->or_like('created_date', $q);
      	$this->db->or_like('deleted_date', $q);
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
        $q = $this->db->query("select MAX(RIGHT(kode_pangkalan,3)) as kd_max from scm_pangkalan");
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
        return "PKLN".$kd;
    }

}
