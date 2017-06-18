<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sppbe extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->account = $this->authentikasi();
        $this->load->model('Sppbe_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'sppbe/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sppbe/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sppbe/index';
            $config['first_url'] = base_url() . 'sppbe/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sppbe_model->total_rows($q);
        $sppbe = $this->Sppbe_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sppbe_data' => $sppbe,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->title_page('Data Sppbe');
        $this->load_theme('sppbe/scm_sppbe_list', $data);
    }

    public function read($id)
    {
        $row = $this->Sppbe_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_spbbe' => $row->id_spbbe,
        		'id_user' => $row->id_user,
        		'kode_sppbe' => $row->kode_sppbe,
        		'nama_sppbe' => $row->nama_sppbe,
        		'alamat_sppbe' => $row->alamat_sppbe,
        		'telp_sppbe' => $row->telp_sppbe,
        		'created' => $row->created,
	         );
            $this->title_page('Data Sppbe');
            $this->load->view('sppbe/scm_sppbe_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sppbe'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sppbe/create_action'),
      	    'id_spbbe' => set_value('id_spbbe'),
      	    'id_user' => set_value('id_user',$this->account->id_user),
      	    'kode_sppbe' => set_value('kode_sppbe',$this->scm_library->kode_sppbe()),
      	    'nama_sppbe' => set_value('nama_sppbe'),
      	    'alamat_sppbe' => set_value('alamat_sppbe'),
      	    'telp_sppbe' => set_value('telp_sppbe'),
      	    'created' => set_value('created',$this->date_now()),
      	);
        $this->load_theme('sppbe/scm_sppbe_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
          		'id_user' => $this->input->post('id_user',TRUE),
          		'kode_sppbe' => $this->input->post('kode_sppbe',TRUE),
          		'nama_sppbe' => $this->input->post('nama_sppbe',TRUE),
          		'alamat_sppbe' => $this->input->post('alamat_sppbe',TRUE),
          		'telp_sppbe' => $this->input->post('telp_sppbe',TRUE),
          		'created' => $this->input->post('created',TRUE),
             );

            $this->Sppbe_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sppbe'));
        }
    }

    public function update($id)
    {
        $row = $this->Sppbe_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sppbe/update_action'),
            		'id_spbbe' => set_value('id_spbbe', $row->id_spbbe),
            		'id_user' => set_value('id_user', $row->id_user),
            		'kode_sppbe' => set_value('kode_sppbe', $row->kode_sppbe),
            		'nama_sppbe' => set_value('nama_sppbe', $row->nama_sppbe),
            		'alamat_sppbe' => set_value('alamat_sppbe', $row->alamat_sppbe),
            		'telp_sppbe' => set_value('telp_sppbe', $row->telp_sppbe),
            		'created' => set_value('created', $this->date_now())
           );
            $this->load_theme('sppbe/scm_sppbe_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sppbe'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_spbbe', TRUE));
        } else {
            $data = array(
        		'id_user' => $this->input->post('id_user',TRUE),
        		'kode_sppbe' => $this->input->post('kode_sppbe',TRUE),
        		'nama_sppbe' => $this->input->post('nama_sppbe',TRUE),
        		'alamat_sppbe' => $this->input->post('alamat_sppbe',TRUE),
        		'telp_sppbe' => $this->input->post('telp_sppbe',TRUE),
        		'modified' => $this->input->post('created',TRUE),
        	  );

            $this->Sppbe_model->update($this->input->post('id_spbbe', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sppbe'));
        }
    }

    public function delete($id)
    {
        $row = $this->Sppbe_model->get_by_id($id);

        if ($row) {
            $this->Sppbe_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sppbe'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sppbe'));
        }
    }

    public function _rules()
    {
      	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
      	$this->form_validation->set_rules('kode_sppbe', 'kode sppbe', 'trim|required');
      	$this->form_validation->set_rules('nama_sppbe', 'nama sppbe', 'trim|required');
      	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
      }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "scm_sppbe.xls";
        $judul = "scm_sppbe";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Sppbe");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Sppbe");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Sppbe");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp Sppbe");
	xlsWriteLabel($tablehead, $kolomhead++, "Created");
	xlsWriteLabel($tablehead, $kolomhead++, "Modified");
	xlsWriteLabel($tablehead, $kolomhead++, "Deleted");

	foreach ($this->Sppbe_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_sppbe);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_sppbe);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_sppbe);
	    xlsWriteNumber($tablebody, $kolombody++, $data->telp_sppbe);
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
        header("Content-Disposition: attachment;Filename=scm_sppbe.doc");

        $data = array(
            'scm_sppbe_data' => $this->Sppbe_model->get_all(),
            'start' => 0
        );

        $this->load_theme('sppbe/scm_sppbe_doc',$data);
    }


    public function pdf()
    {
        $data['sppbe_data'] = $this->Sppbe_model->get_all();
        $report = [
          'footer' =>'Supply Chain Management',
          'title'=>'Data SPPBE',
          'body'=>$this->load->view('sppbe/report', $data,TRUE),
          'filename'=>'Data SPPBE',
        ];

        //print_r($report);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->SetHeader($report['footer'].'|'.$report['title'].'|'.date(DATE_RFC822));
        $pdf->SetFooter($report['footer'].'|{PAGENO}|'.date(DATE_RFC822));
        $pdf->WriteHTML($report['body']);
        $pdf->Output(''.$report['filename'].'_report.pdf','D');
    }

}
