<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Scm_agen extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->account = $this->authentikasi();
        $this->load->model('Scm_agen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'scm_agen/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'scm_agen/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'scm_agen/index';
            $config['first_url'] = base_url() . 'scm_agen/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Scm_agen_model->total_rows($q);
        $scm_agen = $this->Scm_agen_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'scm_agen_data' => $scm_agen,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->title_page("Data Agen");
        $this->load_theme('scm_agen/scm_agen_list', $data);
    }

    public function read($id)
    {
        $row = $this->Scm_agen_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_agen' => $row->id_agen,
        		'id_user' => $row->id_user,
        		'kode_agen' => $row->kode_agen,
        		'nama_agen' => $row->nama_agen,
        		'no_telp_agen' => $row->no_telp_agen,
        		'alamat_agen' => $row->alamat_agen,
        		'kota' => $row->kota,
        		'kelurahan' => $row->kelurahan,
        		'created' => $row->created,
        		'modified' => $row->modified,
        	    );
            $this->title_page("Data Agen");
            $this->load->view('scm_agen/scm_agen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('scm_agen'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('scm_agen/create_action'),
      	    'id_agen' => set_value('id_agen'),
      	    'id_user' => set_value('id_user',$this->account->id_user),
      	    'kode_agen' => set_value('kode_agen',$this->scm_library->kode_agen()),
      	    'nama_agen' => set_value('nama_agen'),
      	    'no_telp_agen' => set_value('no_telp_agen'),
      	    'alamat_agen' => set_value('alamat_agen'),
      	    'kota' => set_value('kota'),
      	    'kelurahan' => set_value('kelurahan'),
      	    'created' => set_value('created',$this->date_now())
      	);
        $this->title_page("Data Agen");
        $this->load_theme('scm_agen/scm_agen_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'id_user' => $this->input->post('id_user',TRUE),
        		'kode_agen' => $this->input->post('kode_agen',TRUE),
        		'nama_agen' => $this->input->post('nama_agen',TRUE),
        		'no_telp_agen' => $this->input->post('no_telp_agen',TRUE),
        		'alamat_agen' => $this->input->post('alamat_agen',TRUE),
        		'kota' => $this->input->post('kota',TRUE),
        		'kelurahan' => $this->input->post('kelurahan',TRUE),
        		'created' => $this->input->post('created',TRUE),
        	    );

            $this->Scm_agen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('scm_agen'));
        }
    }

    public function update($id)
    {
        $row = $this->Scm_agen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('scm_agen/update_action'),
            		'id_agen' => set_value('id_agen', $row->id_agen),
            		'id_user' => set_value('id_user', $row->id_user),
            		'kode_agen' => set_value('kode_agen', $row->kode_agen),
            		'nama_agen' => set_value('nama_agen', $row->nama_agen),
            		'no_telp_agen' => set_value('no_telp_agen', $row->no_telp_agen),
            		'alamat_agen' => set_value('alamat_agen', $row->alamat_agen),
            		'kota' => set_value('kota', $row->kota),
            		'kelurahan' => set_value('kelurahan', $row->kelurahan),
            		'created' => set_value('created', $this->date_now())
            	    );
            $this->title_page("Data Agen");
            $this->load_theme('scm_agen/scm_agen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('scm_agen'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_agen', TRUE));
        } else {
            $data = array(
        		'id_user' => $this->input->post('id_user',TRUE),
        		'kode_agen' => $this->input->post('kode_agen',TRUE),
        		'nama_agen' => $this->input->post('nama_agen',TRUE),
        		'no_telp_agen' => $this->input->post('no_telp_agen',TRUE),
        		'alamat_agen' => $this->input->post('alamat_agen',TRUE),
        		'kota' => $this->input->post('kota',TRUE),
        		'kelurahan' => $this->input->post('kelurahan',TRUE),
        		'modified' => $this->input->post('created',TRUE)
        	  );

            $this->Scm_agen_model->update($this->input->post('id_agen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('scm_agen'));
        }
    }

    public function delete($id)
    {
        $row = $this->Scm_agen_model->get_by_id($id);

        if ($row) {
            $this->Scm_agen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('scm_agen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('scm_agen'));
        }
    }

    public function _rules()
    {
        	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
        	$this->form_validation->set_rules('kode_agen', 'kode agen', 'trim|required');
        	$this->form_validation->set_rules('nama_agen', 'nama agen', 'trim|required');

        	$this->form_validation->set_rules('id_agen', 'id_agen', 'trim');
        	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "scm_agen.xls";
        $judul = "scm_agen";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Agen");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Agen");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telp Agen");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Agen");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "Kelurahan");
	xlsWriteLabel($tablehead, $kolomhead++, "Created");
	xlsWriteLabel($tablehead, $kolomhead++, "Modified");

	foreach ($this->Scm_agen_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_agen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_agen);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_telp_agen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_agen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kelurahan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created);
	    xlsWriteLabel($tablebody, $kolombody++, $data->modified);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=scm_agen.doc");

        $data = array(
            'scm_agen_data' => $this->Scm_agen_model->get_all(),
            'start' => 0
        );

        $this->load->view('scm_agen/scm_agen_doc',$data);
    }

}
