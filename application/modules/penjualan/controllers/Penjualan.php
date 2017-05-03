<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penjualan extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->account = $this->authentikasi();
        $this->load->model('Penjualan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'penjualan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penjualan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penjualan/index.html';
            $config['first_url'] = base_url() . 'penjualan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penjualan_model->total_rows($q);
        $penjualan = $this->Penjualan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penjualan_data' => $penjualan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->title_page('Laporan Penjualan');
        $this->load_theme('penjualan/scm_penjualan_list', $data);
    }

    public function read($id)
    {
        $row = $this->Penjualan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_penjualan' => $row->id_penjualan,
		'kode_penjualan' => $row->kode_penjualan,
		'tanggal_penjualan' => $row->tanggal_penjualan,
		'keterangan' => $row->keterangan,
		'created' => $row->created,
		'modified' => $row->modified,
		'deleted' => $row->deleted,
	    );
            $this->load_theme('penjualan/scm_penjualan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penjualan/create_action'),
	    'id_penjualan' => set_value('id_penjualan'),
	    'kode_penjualan' => set_value('kode_penjualan'),
	    'tanggal_penjualan' => set_value('tanggal_penjualan'),
	    'keterangan' => set_value('keterangan'),
	    'created' => set_value('created'),
	    'modified' => set_value('modified'),
	    'deleted' => set_value('deleted'),
	);
        $this->load_theme('penjualan/scm_penjualan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_penjualan' => $this->input->post('kode_penjualan',TRUE),
		'tanggal_penjualan' => $this->input->post('tanggal_penjualan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'created' => $this->input->post('created',TRUE),
		'modified' => $this->input->post('modified',TRUE),
		'deleted' => $this->input->post('deleted',TRUE),
	    );

            $this->Penjualan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penjualan'));
        }
    }

    public function update($id)
    {
        $row = $this->Penjualan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penjualan/update_action'),
		'id_penjualan' => set_value('id_penjualan', $row->id_penjualan),
		'kode_penjualan' => set_value('kode_penjualan', $row->kode_penjualan),
		'tanggal_penjualan' => set_value('tanggal_penjualan', $row->tanggal_penjualan),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'created' => set_value('created', $row->created),
		'modified' => set_value('modified', $row->modified),
		'deleted' => set_value('deleted', $row->deleted),
	    );
            $this->load_theme('penjualan/scm_penjualan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penjualan', TRUE));
        } else {
            $data = array(
		'kode_penjualan' => $this->input->post('kode_penjualan',TRUE),
		'tanggal_penjualan' => $this->input->post('tanggal_penjualan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'created' => $this->input->post('created',TRUE),
		'modified' => $this->input->post('modified',TRUE),
		'deleted' => $this->input->post('deleted',TRUE),
	    );

            $this->Penjualan_model->update($this->input->post('id_penjualan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penjualan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Penjualan_model->get_by_id($id);

        if ($row) {
            $this->Penjualan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penjualan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('kode_penjualan', 'kode penjualan', 'trim|required');
	$this->form_validation->set_rules('tanggal_penjualan', 'tanggal penjualan', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('created', 'created', 'trim|required');
	$this->form_validation->set_rules('modified', 'modified', 'trim|required');
	$this->form_validation->set_rules('deleted', 'deleted', 'trim|required');

	$this->form_validation->set_rules('id_penjualan', 'id_penjualan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "scm_penjualan.xls";
        $judul = "scm_penjualan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Penjualan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Penjualan");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Created");
	xlsWriteLabel($tablehead, $kolomhead++, "Modified");
	xlsWriteLabel($tablehead, $kolomhead++, "Deleted");

	foreach ($this->Penjualan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_penjualan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_penjualan);
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
        header("Content-Disposition: attachment;Filename=scm_penjualan.doc");

        $data = array(
            'scm_penjualan_data' => $this->Penjualan_model->get_all(),
            'start' => 0
        );

        $this->load_theme('penjualan/scm_penjualan_doc',$data);
    }

}
