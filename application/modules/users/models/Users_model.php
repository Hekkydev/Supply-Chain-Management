<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public $table = 'users';
    public $id = 'id_user';
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
        $this->db->like('id_user', $q);
	$this->db->or_like('id_group', $q);
	$this->db->or_like('kode_user', $q);
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('no_telp', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('created', $q);
	$this->db->or_like('modified', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('users_group','users_group.id_group = users.id_group','left');
        $this->db->order_by($this->id, $this->order);
        $this->db->like('users.id_user', $q);
      	$this->db->or_like('users.id_group', $q);
      	$this->db->or_like('kode_user', $q);
      	$this->db->or_like('nama_lengkap', $q);
      	$this->db->or_like('no_telp', $q);
      	$this->db->or_like('username', $q);
      	$this->db->or_like('password', $q);
      	$this->db->or_like('created', $q);
      	$this->db->or_like('modified', $q);
      	$this->db->limit($limit, $start);
       $Q = $this->db->get();
       return  $Q->result();
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

    function generate_auto_kode()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_user,3)) as kd_max from users");
        // $time  = date('Ymd');
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
        return "U".$kd;
    }

}
