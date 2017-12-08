<?php

/**
 *  App Controller Proses Sistem Root by Hekky Nurhikmat
 */

class MY_Controller extends CI_Controller
{

    protected $helper = array('form','url','scm','rupiah');
    protected $library = array('session','scm_library','upload','pmail');
    protected $model   = array(
        '../modules/home/models/App_model',
        '../modules/users/models/Users_model',
        '../modules/users_group/models/Users_group_model',
        '../modules/auth/models/auth_model',
    );
    protected $configurasi = "config-app";
    protected $title_page;
    protected $headstyle;
    protected $headscript;
    


    function __construct()
    {

        parent::__construct();
        $this->load->model($this->model);
        $this->load->helper($this->helper);
        $this->load->library($this->library);
        $this->load->config($this->configurasi);
        $conn = $this->load->database('default',TRUE);
        if ($conn->initialize() == 1) {
            $conn = $this->load->database();
        }else{
            $conn =  header('Location:'.base_url().'database-status.php?status=error');
            exit();
        }



    }
    public function about_application()
    {
        return $page = $this->App_model->about_application();
    }

    public function about_application_update($data)
    {
        return $this->App_model->about_application_update($data);
    }
    public function authentikasi()
    {
        $status = $this->session->userdata('logged_in');
        if($status != 1)
        {
            redirect('logout');
        }else{
            $account = $this->auth_model->account_login($this->session->userdata('kode_user'))->first_row();
            return $account;
        }
    }

    public function authentikasi_client()
    {
        $status = $this->session->userdata('logged_in');
        if($status != 1)
        {
            return $account = array();
        }else{
            $account = $this->auth_model->account_login($this->session->userdata('kode_user'))->first_row();
            return $account;
        }
    }

    public function registrasi_konsumen_my_controller($data)
    {
        return $this->Users_model->insert($data);
    }

    public function sending_pesan($data)
    {
          return $simpan = $this->App_model->sending_pesan($data);
    }

    public function date_now()
    {
      return $waktu = date('Y-m-d H:i:s');
    }
    public function title_page($title)
    {
        $judul = isset($title) ? $title : "";
        return $this->title_page = $judul;
    }

    public function app_menu()
    {
        $account =  $this->authentikasi();
        $this->db->where('id_group', $account->id_group);
        $this->db->order_by('position','ASC');
        return $this->db->get('scm_menu_link')->result_object();
    }

    public function load_theme($content,$data = null)
    {
        $this->kode_akses_position =  $this->authentikasi()->kode_akses_position;

        $this->data['style']            = isset($this->headstyle) ? $this->load->view($this->headstyle,$data,TRUE) : "";
        $this->data['script']           = isset($this->headscript) ? $this->load->view($this->headscript,$data,TRUE) : "";
        $this->data['menu']             = $this->app_menu();
        $this->data['app_title_logo']   = $this->config->item('ci_app_title_logo');
        $this->data['app_title']        = $this->config->item('ci_app_title');
        $this->data['title_page']       = $this->title_page;
        $data['account']                = $this->authentikasi();
        $data['account_posisition']     = $this->scm_library->include_position($this->kode_akses_position);
        $this->data['content']          = $this->load->view($content,$data,TRUE);

        $this->load->view("template/content",$this->data);
    }

    public function script($script)
    {
        return $this->headscript = $script;
    }

    public function style($style)
    {
        return $this->headstyle = $style;
    }



    public function load_theme_dash($content,$data = null)
    {
       $this->kode_akses_position =  $this->authentikasi()->kode_akses_position;

        $data['account']            = $this->authentikasi();
        $data['account_posisition'] = $this->scm_library->include_position($this->kode_akses_position);
        $this->data['menu']             = $this->app_menu();
        $this->data['app_title_logo']   = $this->config->item('ci_app_title_logo');
        $this->data['app_title']        = $this->config->item('ci_app_title');
        $this->data['title_page']       = $this->title_page;
        $this->data['content']          = $this->load->view($content,$data,TRUE);
        $this->load->view("template/content-dashboard",$this->data);
    }

    public function load_theme_login($content,$data = null)
    {

        $this->data['app_title_logo']   = $this->config->item('ci_app_title_logo');
        $this->data['app_title']        = $this->config->item('ci_app_title');
        $this->data['content']          = $this->load->view($content,$data,TRUE);
        $this->load->view("template/content_login",$this->data);
    }

    public function load_theme_frontend($content,$data = null)
    {
        $this->data['app_title']        = $this->config->item('ci_app_title');
        $this->data['title_page']       = $this->title_page;
        $this->data['content']          = $this->load->view($content,$data,TRUE);
        $this->load->view('template_frontend/content',$this->data);
    }

    public function load_theme_frontend_large($content,$data = null)
    {
        $this->data['app_title']        = $this->config->item('ci_app_title');
        $this->data['title_page']       = $this->title_page;
        $this->data['content']          = $this->load->view($content,$data,TRUE);
        $this->load->view('template_frontend/content-large',$this->data);
    }

    public function load_theme_frontend_home($content,$data = null)
    {
        $this->data['app_title']        = $this->config->item('ci_app_title');
        $this->data['title_page']       = $this->title_page;
        $this->data['content']          = $this->load->view($content,$data,TRUE);
        $this->load->view('template_frontend/content-home',$this->data);
    }

}
