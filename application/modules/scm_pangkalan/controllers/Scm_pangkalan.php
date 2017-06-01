<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Scm_pangkalan extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->account = $this->authentikasi();
        $this->account_position = (object) $this->scm_library->include_position($this->account->kode_akses_position);
        $this->load->model('Scm_pangkalan_model');
        $this->load->library('form_validation');
        $this->model_agen = '../modules/scm_agen/models/Scm_agen_model';
        $this->load->model(array($this->model_agen));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'scm_pangkalan/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'scm_pangkalan/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'scm_pangkalan/index';
            $config['first_url'] = base_url() . 'scm_pangkalan/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Scm_pangkalan_model->total_rows($q);
        $scm_pangkalan = $this->Scm_pangkalan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'scm_pangkalan_data' => $scm_pangkalan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'account_position'=>$this->account_position,
        );
        $this->title_page('Sub Penyalur / Pangkalan');
        $this->load_theme('scm_pangkalan/scm_pangkalan_list', $data);
    }

    public function read($id)
    {
        $row = $this->Scm_pangkalan_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_pangkalan' => $row->id_pangkalan,
        		'id_user' => $row->id_user,
        		'kode_pangkalan' => $row->kode_pangkalan,
        		'kode_agen' => $row->kode_agen,
        		'nama_pangkalan' => $row->nama_pangkalan,
        		'alamat_pangkalan' => $row->alamat_pangkalan,
        		'kelurahan' => $row->kelurahan,
        		'no_telp' => $row->no_telp,
        		'created_date' => $row->created_date,
        		'deleted_date' => $row->deleted_date,
	    );
            $this->load->view('scm_pangkalan/scm_pangkalan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('scm_pangkalan'));
        }
    }

    public function create()
    {
        $kode_agen = isset($this->account_position->kode_usaha) ? $this->account_position->kode_usaha : "";
        $data = array(
            'button' => 'Create',
            'action' => site_url('scm_pangkalan/create_action'),
      	    'id_pangkalan' => set_value('id_pangkalan'),
      	    'id_user' => set_value('id_user',$this->account->id_user),
      	    'kode_pangkalan' => set_value('kode_pangkalan'),
      	    'kode_agen' => set_value('kode_agen',$kode_agen),
            'nama_agen'=>set_value('nama_agen',$this->account_position->nama_usaha),
            'agen'=>$this->Scm_agen_model->get_all(),
      	    'nama_pangkalan' => set_value('nama_pangkalan'),
      	    'alamat_pangkalan' => set_value('alamat_pangkalan'),
      	    'kelurahan' => set_value('kelurahan'),
      	    'no_telp' => set_value('no_telp'),
      	    'created_date' => set_value('created_date'),
      	    'deleted_date' => set_value('deleted_date'),
      	);
        $this->title_page("Sub Penyalur / Pangkalan");
        $this->load_theme('scm_pangkalan/scm_pangkalan_form', $data);
    }

    public function create_action()
    {

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'id_user' => $this->input->post('id_user',TRUE),
        		'kode_pangkalan' => $this->input->post('kode_pangkalan',TRUE),
        		'kode_agen' => $this->input->post('kode_agen',TRUE),
        		'nama_pangkalan' => $this->input->post('nama_pangkalan',TRUE),
        		'alamat_pangkalan' => $this->input->post('alamat_pangkalan',TRUE),
        		'kelurahan' => $this->input->post('kelurahan',TRUE),
        		'no_telp' =>$_POST['no_telp'],
          	'created_date' => $this->date_now(),
  	    );

            $this->Scm_pangkalan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('scm_pangkalan'));
        }
    }

    public function update($id)
    {
        $row = $this->Scm_pangkalan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('scm_pangkalan/update_action'),
            		'id_pangkalan' => set_value('id_pangkalan', $row->id_pangkalan),
            		'id_user' => set_value('id_user', $row->id_user),
            		'kode_pangkalan' => set_value('kode_pangkalan', $row->kode_pangkalan),
            		'kode_agen' => set_value('kode_agen', $row->kode_agen),
            		'nama_pangkalan' => set_value('nama_pangkalan', $row->nama_pangkalan),
            		'alamat_pangkalan' => set_value('alamat_pangkalan', $row->alamat_pangkalan),
            		'kelurahan' => set_value('kelurahan', $row->kelurahan),
            		'no_telp' => set_value('no_telp', $row->no_telp),
            		'created_date' => set_value('created_date', $row->created_date),
            		'deleted_date' => set_value('deleted_date', $row->deleted_date),
            	    );
            $this->load_theme('scm_pangkalan/scm_pangkalan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('scm_pangkalan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pangkalan', TRUE));
        } else {
            $data = array(
        		'id_user' => $this->input->post('id_user',TRUE),
        		'kode_pangkalan' => $this->input->post('kode_pangkalan',TRUE),
        		'kode_agen' => $this->input->post('kode_agen',TRUE),
        		'nama_pangkalan' => $this->input->post('nama_pangkalan',TRUE),
        		'alamat_pangkalan' => $this->input->post('alamat_pangkalan',TRUE),
        		'kelurahan' => $this->input->post('kelurahan',TRUE),
        		'no_telp' => $this->input->post('no_telp',TRUE),
        		'created_date' => $this->input->post('created_date',TRUE),
        		'deleted_date' => $this->input->post('deleted_date',TRUE),
        	    );

            $this->Scm_pangkalan_model->update($this->input->post('id_pangkalan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('scm_pangkalan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Scm_pangkalan_model->get_by_id($id);

        if ($row) {
            $this->Scm_pangkalan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('scm_pangkalan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('scm_pangkalan'));
        }
    }

    public function _rules()
    {
          	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
          	$this->form_validation->set_rules('kode_pangkalan', 'kode pangkalan', 'trim|required');
          	$this->form_validation->set_rules('kode_agen', 'kode agen', 'trim|required');
          	$this->form_validation->set_rules('nama_pangkalan', 'nama pangkalan', 'trim|required');
          	$this->form_validation->set_rules('alamat_pangkalan', 'alamat pangkalan', 'trim|required');
          	$this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
          	$this->form_validation->set_rules('id_pangkalan', 'id_pangkalan', 'trim');
          	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "scm_pangkalan.xls";
        $judul = "scm_pangkalan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id User");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Pangkalan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Agen");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pangkalan");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Pangkalan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kelurahan");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telp");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Deleted Date");

	foreach ($this->Scm_pangkalan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_pangkalan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_agen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pangkalan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_pangkalan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kelurahan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_telp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deleted_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=scm_pangkalan.doc");

        $data = array(
            'scm_pangkalan_data' => $this->Scm_pangkalan_model->get_all(),
            'start' => 0
        );

        $this->load->view('scm_pangkalan/scm_pangkalan_doc',$data);
    }

}

/* End of file Scm_pangkalan.php */
/* Location: ./application/controllers/Scm_pangkalan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-05 18:10:07 */
/* http://harviacode.com */
