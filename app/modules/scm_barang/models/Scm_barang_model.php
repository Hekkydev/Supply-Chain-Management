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
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('scm_barang_kategori', 'scm_barang_kategori.id_kategori = scm_barang.id_kategori', 'left');
        $this->db->join('scm_barang_satuan', 'scm_barang_satuan.id_satuan = scm_barang.id_satuan', 'left');
        $this->db->where('deleted',NULL);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    function get_all_stock() {
      $this->db->select('*');
      $this->db->from('scm_barang_stock');
      $this->db->join('scm_agen', 'scm_agen.id_agen = scm_barang_stock.id_agen', 'left');
      $this->db->join('scm_barang', 'scm_barang.id_barang = scm_barang_stock.id_barang', 'left');
      $this->db->where('scm_barang.deleted',NULL);
      return $this->db->get();
    }

    

    function get_product_stock($kode_barang)
    {
        return $this->db->select('SUM(stock_agen) as total')
                        ->where('id_barang',$kode_barang)
                        ->get('scm_barang_stock')->first_row();
    }
    // insert data
    function insert_stock($data)
    {
        return $this->db->insert('scm_barang_stock', $data);
    }

    function deleted_stock($id) {
        $this->db->where('id_stock', $id);
        return $this->db->delete('scm_barang_stock');
    }


    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('scm_barang_kategori', 'scm_barang_kategori.id_kategori = scm_barang.id_kategori', 'left');
        $this->db->join('scm_barang_satuan', 'scm_barang_satuan.id_satuan = scm_barang.id_satuan', 'left');
        $this->db->where('deleted',NULL);
        $this->db->where('nama_barang LIKE','%'.$q.'%');
        $select =  $this->db->get()->result();
        return count($select);
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('scm_barang_kategori', 'scm_barang_kategori.id_kategori = scm_barang.id_kategori', 'left');
        $this->db->join('scm_barang_satuan', 'scm_barang_satuan.id_satuan = scm_barang.id_satuan', 'left');
        $this->db->where('deleted',NULL);
        $this->db->where('nama_barang LIKE','%'.$q.'%');
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
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
        $data = array(
          'deleted'=>date('Y-m-d H:i:s'),
        );
        $this->db->where($this->id, $id);
        $this->db->update($this->table,$data);
    }

    public function get_product()
    {
      $this->db->where('deleted',NULL);
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

    public function search_item($nama_barang)
    {
        $this->db->where('deleted',NULL);
        $this->db->like('nama_barang',$nama_barang);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result_object();
    }



    public function generate_auto_kode()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_barang,3)) as kd_max from scm_barang");
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
        return "K".$kd;
    }
}
