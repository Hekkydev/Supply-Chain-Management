<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Scm_agen_model extends CI_Model
{

    public $table = 'scm_agen';
    public $id = 'id_agen';
    public $order = 'DESC';
    public $kode  = 'kode_agen';
    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {

        $this->db->where('deleted',NULL);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_kode($kode)
    {
        $this->db->where($this->kode, $kode);
        return $this->db->get($this->table)->row();
    }


    // get total rows
    function total_rows($q = NULL) {

        $this->db->where('deleted',NULL);
        $this->db->where('nama_agen LIKE', '%'.$q.'%');
      	$this->db->from($this->table);
        return $this->db->get()->num_rows();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('deleted',NULL);
      	$this->db->where('nama_agen LIKE', '%'.$q.'%');
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
          'deleted'=>date('Y-m-d H:i:s')
        );
        $this->db->where($this->id, $id);
        $this->db->update($this->table,$data);
    }

    public function generate_auto_kode()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_agen,3)) as kd_max from scm_agen");
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
        return "AGEN".$kd;
    }

}
