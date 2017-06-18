<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->account = $this->authentikasi();
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'kategori/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kategori/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kategori/index';
            $config['first_url'] = base_url() .'kategori/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kategori_model->total_rows($q);
        $kategori = $this->Kategori_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kategori_data' => $kategori,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->title_page("Kategori Barang");
        $this->load_theme('kategori/scm_barang_kategori_list', $data);
    }

    public function read($id)
    {
        $row = $this->Kategori_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_kategori' => $row->id_kategori,
            'nama_kategori' => $row->nama_kategori,
            );
            $this->title_page("Kategori Barang");
            $this->load_theme('kategori/scm_barang_kategori_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori'));
        }
    }

    public function create()
    {
        $kode_kategori = $this->scm_library->kode_kategori();
        $data = array(
            'button' => 'Create',
            'kode_kategori'=>$kode_kategori,
            'action' => site_url('kategori/create_action'),
            'id_kategori' => set_value('id_kategori'),
            'nama_kategori' => set_value('nama_kategori'),
	    );
        $this->title_page("Kategori Barang");
        $this->load_theme('kategori/scm_barang_kategori_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		    'nama_kategori' => $this->input->post('nama_kategori',TRUE),
            'kode_kategori'=>$this->input->post('kode_kategori',TRUE),
	    );

            $this->Kategori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategori'));
        }
    }

    public function update($id)
    {
        $row = $this->Kategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kategori/update_action'),
                'id_kategori' => set_value('id_kategori', $row->id_kategori),
                'kode_kategori'=>set_value('kode_kategori',$row->kode_kategori),
                'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
	    );
            $this->title_page("Kategori Barang");
            $this->load_theme('kategori/scm_barang_kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori', TRUE));
        } else {
            $data = array(
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
	    );

            $this->Kategori_model->update($this->input->post('id_kategori', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategori'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kategori_model->get_by_id($id);

        if ($row) {
            $this->Kategori_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');

	$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-11 09:14:57 */
/* http://harviacode.com */
