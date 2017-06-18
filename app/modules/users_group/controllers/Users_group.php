<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_group extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->account = $this->authentikasi();
        $this->load->model('Users_group_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'users_group/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users_group/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users_group/index.html';
            $config['first_url'] = base_url() . 'users_group/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_group_model->total_rows($q);
        $users_group = $this->Users_group_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_group_data' => $users_group,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->title_page('Users Group');
        $this->load_theme('users_group/users_group_list', $data);
    }

    public function read($id)
    {
        $row = $this->Users_group_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_group' => $row->id_group,
		'form_access' => $row->form_access,
	    );
            $this->title_page('Users Group');
            $this->load_theme('users_group/users_group_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users_group'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users_group/create_action'),
      	    'id_group' => set_value('id_group'),
      	    'form_access' => set_value('form_access'),
      	);
        $this->title_page('Users Group');
        $this->load_theme('users_group/users_group_form', $data);
    }

    public function create_action()
    {

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'form_access' => $this->input->post('form_access',TRUE),
        	    );

            $this->Users_group_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users_group'));
        }
    }

    public function update($id)
    {
        $row = $this->Users_group_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users_group/update_action'),
            		'id_group' => set_value('id_group', $row->id_group),
            		'form_access' => set_value('form_access', $row->form_access),
            	    );
            $this->title_page('Users Group');
            $this->load_theme('users_group/users_group_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users_group'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_group', TRUE));
        } else {
            $data = array(
		'form_access' => $this->input->post('form_access',TRUE),
	    );

            $this->Users_group_model->update($this->input->post('id_group', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users_group'));
        }
    }

    public function delete($id)
    {
        $row = $this->Users_group_model->get_by_id($id);

        if ($row) {
            $this->Users_group_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users_group'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users_group'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('form_access', 'form access', 'trim|required');

	$this->form_validation->set_rules('id_group', 'id_group', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "users_group.xls";
        $judul = "users_group";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Form Access");

	foreach ($this->Users_group_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->form_access);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=users_group.doc");

        $data = array(
            'users_group_data' => $this->Users_group_model->get_all(),
            'start' => 0
        );

        $this->load->view('users_group/users_group_doc',$data);
    }

}
