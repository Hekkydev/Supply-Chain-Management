<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembelian extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembelian_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembelian/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembelian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembelian/index.html';
            $config['first_url'] = base_url() . 'pembelian/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembelian_model->total_rows($q);
        $pembelian = $this->Pembelian_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembelian_data' => $pembelian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->title_page("Laporan Pembelian");
        $this->load_theme('pembelian/scm_pembelian_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pembelian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pembelian' => $row->id_pembelian,
		'kode_pembelian' => $row->kode_pembelian,
		'tanggal_pembelian' => $row->tanggal_pembelian,
		'keterangan' => $row->keterangan,
		'created' => $row->created,
		'modified' => $row->modified,
		'deleted' => $row->deleted,
	    );
            $this->load_theme('pembelian/scm_pembelian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembelian/create_action'),
            'id_pembelian' => set_value('id_pembelian'),
            'kode_pembelian' => set_value('kode_pembelian'),
            'tanggal_pembelian' => set_value('tanggal_pembelian'),
            'keterangan' => set_value('keterangan'),
            'created' => set_value('created'),
            'modified' => set_value('modified'),
            'deleted' => set_value('deleted'),
        );
        $this->title_page('Transaksi Pembelian');
        $this->load_theme('pembelian/transaksi/add', $data);
        //$this->load_theme('pembelian/scm_pembelian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_pembelian' => $this->input->post('kode_pembelian',TRUE),
		'tanggal_pembelian' => $this->input->post('tanggal_pembelian',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'created' => $this->input->post('created',TRUE),
		'modified' => $this->input->post('modified',TRUE),
		'deleted' => $this->input->post('deleted',TRUE),
	    );

            $this->Pembelian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembelian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pembelian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembelian/update_action'),
		'id_pembelian' => set_value('id_pembelian', $row->id_pembelian),
		'kode_pembelian' => set_value('kode_pembelian', $row->kode_pembelian),
		'tanggal_pembelian' => set_value('tanggal_pembelian', $row->tanggal_pembelian),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'created' => set_value('created', $row->created),
		'modified' => set_value('modified', $row->modified),
		'deleted' => set_value('deleted', $row->deleted),
	    );
            $this->load_theme('pembelian/scm_pembelian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembelian', TRUE));
        } else {
            $data = array(
		'kode_pembelian' => $this->input->post('kode_pembelian',TRUE),
		'tanggal_pembelian' => $this->input->post('tanggal_pembelian',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'created' => $this->input->post('created',TRUE),
		'modified' => $this->input->post('modified',TRUE),
		'deleted' => $this->input->post('deleted',TRUE),
	    );

            $this->Pembelian_model->update($this->input->post('id_pembelian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembelian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembelian_model->get_by_id($id);

        if ($row) {
            $this->Pembelian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembelian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_pembelian', 'kode pembelian', 'trim|required');
	$this->form_validation->set_rules('tanggal_pembelian', 'tanggal pembelian', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('created', 'created', 'trim|required');
	$this->form_validation->set_rules('modified', 'modified', 'trim|required');
	$this->form_validation->set_rules('deleted', 'deleted', 'trim|required');

	$this->form_validation->set_rules('id_pembelian', 'id_pembelian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "scm_pembelian.xls";
        $judul = "scm_pembelian";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Pembelian");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pembelian");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Created");
	xlsWriteLabel($tablehead, $kolomhead++, "Modified");
	xlsWriteLabel($tablehead, $kolomhead++, "Deleted");

	foreach ($this->Pembelian_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_pembelian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_pembelian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created);
	    xlsWriteLabel($tablebody, $kolombody++, $data->modified);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deleted);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=scm_pembelian.doc");

        $data = array(
            'scm_pembelian_data' => $this->Pembelian_model->get_all(),
            'start' => 0
        );
        
        $this->load_theme('pembelian/scm_pembelian_doc',$data);
    }

}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-12 19:10:48 */
/* http://harviacode.com */