<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Scm_barang_satuan extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Scm_barang_satuan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'scm_barang_satuan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'scm_barang_satuan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'scm_barang_satuan/index.html';
            $config['first_url'] = base_url() . 'scm_barang_satuan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Scm_barang_satuan_model->total_rows($q);
        $scm_barang_satuan = $this->Scm_barang_satuan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'scm_barang_satuan_data' => $scm_barang_satuan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->title_page('Satuan Barang');
        $this->load_theme('scm_barang_satuan/scm_barang_satuan_list', $data);
    }

    public function read($id)
    {
        $row = $this->Scm_barang_satuan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_satuan' => $row->id_satuan,
		'tipe_satuan' => $row->tipe_satuan,
	    );
      $this->title_page('Satuan Barang');
            $this->load_theme('scm_barang_satuan/scm_barang_satuan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('scm_barang_satuan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('scm_barang_satuan/create_action'),
	    'id_satuan' => set_value('id_satuan'),
	    'tipe_satuan' => set_value('tipe_satuan'),
	);
  $this->title_page('Satuan Barang');
        $this->load_theme('scm_barang_satuan/scm_barang_satuan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tipe_satuan' => $this->input->post('tipe_satuan',TRUE),
	    );

            $this->Scm_barang_satuan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('scm_barang_satuan'));
        }
    }

    public function update($id)
    {
        $row = $this->Scm_barang_satuan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('scm_barang_satuan/update_action'),
		'id_satuan' => set_value('id_satuan', $row->id_satuan),
		'tipe_satuan' => set_value('tipe_satuan', $row->tipe_satuan),
	    );
      $this->title_page('Satuan Barang');
            $this->load_theme('scm_barang_satuan/scm_barang_satuan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('scm_barang_satuan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_satuan', TRUE));
        } else {
            $data = array(
		'tipe_satuan' => $this->input->post('tipe_satuan',TRUE),
	    );

            $this->Scm_barang_satuan_model->update($this->input->post('id_satuan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('scm_barang_satuan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Scm_barang_satuan_model->get_by_id($id);

        if ($row) {
            $this->Scm_barang_satuan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('scm_barang_satuan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('scm_barang_satuan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('tipe_satuan', 'tipe satuan', 'trim|required');

	$this->form_validation->set_rules('id_satuan', 'id_satuan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Scm_barang_satuan.php */
/* Location: ./application/controllers/Scm_barang_satuan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-23 18:14:31 */
/* http://harviacode.com */
