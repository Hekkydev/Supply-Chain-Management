<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->account = $this->authentikasi();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/index';
            $config['first_url'] = base_url() . 'users/index';
        }

        $config['per_page'] = 100;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->title_page('Data Akun');
        $this->load_theme('users/users_list', $data);
    }

    public function konsumen()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/users/konsumen/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/users/konsumen/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/users/konsumen';
            $config['first_url'] = base_url() . 'users/users/konsumen';
        }

        $config['per_page'] = 100;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->title_page('Data Akun Konsumen');
        $this->load_theme('users/konsumen/users_list', $data);
    }

    public function read($id)
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_user' => $row->id_user,
        		'id_group' => $row->id_group,
        		'kode_user' => $row->kode_user,
        		'nama_lengkap' => $row->nama_lengkap,
        		'no_telp' => $row->no_telp,
        		'username' => $row->username,
        		'password' => $row->password,
        		'created' => $row->created,
        		'modified' => $row->modified,
    	    );
            $this->load->view('users/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create()
    {
      $kode_user = $this->scm_library->kode_user();
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
      	    'id_user' => set_value('id_user'),
            'id_status'=>set_value('id_status'),
      	    'id_group' => set_value('id_group'),
            'kode_akses_position'=>set_value('kode_akses_position'),
      	    'kode_user' => set_value('kode_user',$kode_user),
      	    'nama_lengkap' => set_value('nama_lengkap'),
      	    'no_telp' => set_value('no_telp'),
      	    'username' => set_value('username'),
      	    'password' => set_value('password'),
            'created'=>set_value('created',$this->date_now()),
      	);
        $data['account'] = $this->account;
        $data['group'] = $this->Users_group_model->get_all();
        $this->title_page('Data Akun');
        $this->load_theme('users/users_form', $data);
    }

    public function create_action()
    {

            $data = array(
        		'id_group' => $this->input->post('id_group',TRUE),
        		'kode_user' => $this->input->post('kode_user',TRUE),
                'id_status'=>$this->input->post('id_status',TRUE),
                'kode_akses_position'=>$this->input->post('kode_akses',TRUE),
        		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
        		'no_telp' => $this->input->post('no_telp',TRUE),
        		'username' => $this->input->post('username',TRUE),
        		'password' => md5($this->input->post('password',TRUE)),
      	        'created' => $this->input->post('created',TRUE),
	         );

          //  print_r($data); die();
            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));

    }

    public function update($id)
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
            		'id_user' => set_value('id_user', $row->id_user),
            		'id_group' => set_value('id_group', $row->id_group),
                    'id_status'=>set_value('id_status',$row->id_status),
                    'kode_akses_position'=>set_value('kode_akses_position',$row->kode_akses_position),
            		'kode_user' => set_value('kode_user', $row->kode_user),
            		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
            		'no_telp' => set_value('no_telp', $row->no_telp),
            		'username' => set_value('username', $row->username),
            		'password' => set_value('password', $row->password),
            		'created' => set_value('created', $row->created),
            	    );
                  $data['group'] = $this->Users_group_model->get_all();
                  $this->title_page('Data Akun');
             $data['account'] = $this->account;
            $this->load_theme('users/users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function update_action()
    {


            if($this->input->post('password',TRUE) ==  TRUE)
            {
                $password = md5($this->input->post('password',TRUE));
            }else{
                $password  = $this->input->post('last_password',TRUE);
            }

            $data = array(
        		'id_group' => $this->input->post('id_group',TRUE),
                'id_status'=>$this->input->post('id_status',TRUE),
        		'kode_user' => $this->input->post('kode_user',TRUE),
                'kode_akses_position'=>$this->input->post('kode_akses'),
        		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
        		'no_telp' => $this->input->post('no_telp',TRUE),
        		'username' => $this->input->post('username',TRUE),
        		'password' => $password,
        		'created' => $this->input->post('created',TRUE),
        		'modified' => $this->date_now(),
        	   );

            $this->Users_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));

    }

    public function delete($id)
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_group', 'id group', 'trim|required');
	$this->form_validation->set_rules('kode_user', 'kode user', 'trim|required');
    $this->form_validation->set_rules('kode_akses_position', 'Management Rule', 'required|trim');
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('created', 'created', 'trim|required');
	$this->form_validation->set_rules('modified', 'modified', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "users.xls";
        $judul = "users";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Group");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode User");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telp");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Created");
	xlsWriteLabel($tablehead, $kolomhead++, "Modified");

	foreach ($this->Users_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_group);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_user);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_telp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
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
        header("Content-Disposition: attachment;Filename=users.doc");

        $data = array(
            'users_data' => $this->Users_model->get_all(),
            'start' => 0
        );

        $this->load_theme('users/users_doc',$data);
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-13 17:47:38 */
/* http://harviacode.com */
