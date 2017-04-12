<?php

/**
 *  App Controller Proses Sistem Root by Hekky Nurhikmat
 */

class MY_Controller extends CI_Controller
{

    protected $helper = array('url','form','scm');
    protected $library = array('session','scm_library');
    protected $model   = array(
        '../modules/users/models/Users_model',
        '../modules/users_group/models/Users_group_model',
    );
    protected $configurasi = "config-app";
    protected $title_page;


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

    public function title_page($title)
    {
        $judul = isset($title) ? $title : "";
        return $this->title_page = $judul;
    }

    public function load_theme($content,$data = null)
    {
        $this->data['app_title_logo']   = $this->config->item('ci_app_title_logo');
        $this->data['app_title']        = $this->config->item('ci_app_title');
        $this->data['title_page']       = $this->title_page;
        $this->data['content']          = $this->load->view($content,$data,TRUE);
        $this->load->view("template/content",$this->data);
    }

    public function load_theme_dash($content,$data = null)
    {
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

}
