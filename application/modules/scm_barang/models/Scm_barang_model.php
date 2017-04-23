<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Scm_barang_model extends CI_Model
{

    public $table = 'scm_barang';
    public $id = 'id_barang';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
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
        $this->db->like('id_barang', $q);
	$this->db->or_like('id_user', $q);
	$this->db->or_like('kode_barang', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('stock', $q);
	$this->db->or_like('satuan', $q);
	$this->db->or_like('harga_jual', $q);
	$this->db->or_like('harga_beli', $q);
	$this->db->or_like('diskon', $q);
	$this->db->or_like('id_kategori', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('gambar', $q);
	$this->db->or_like('created', $q);
	$this->db->or_like('modified', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_barang', $q);
	$this->db->or_like('id_user', $q);
	$this->db->or_like('kode_barang', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('stock', $q);
	$this->db->or_like('satuan', $q);
	$this->db->or_like('harga_jual', $q);
	$this->db->or_like('harga_beli', $q);
	$this->db->or_like('diskon', $q);
	$this->db->or_like('id_kategori', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('gambar', $q);
	$this->db->or_like('created', $q);
	$this->db->or_like('modified', $q);
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

    public function get_product()
    {
      $this->db->order_by($this->id, $this->order);
      return $this->db->get($this->table)->result_object();
    }

    public function get_product_detail($num)
    {
      $this->db->join('scm_barang_satuan', 'scm_barang_satuan.id_satuan = scm_barang_satuan.id_satuan', 'left');
      $this->db->join('scm_status', 'scm_status.id_status = scm_barang.id_status', 'left');
      $this->db->join('scm_barang_kategori', 'scm_barang_kategori.id_kategori = scm_barang.id_kategori', 'left');
      $this->db->where('id_barang', $num);
      return $this->db->get($this->table)->first_row();
    }



    public function generate_auto_kode()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_barang,3)) as kd_max from scm_barang");
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
        return "K".$kd;
    }
}
