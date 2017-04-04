<?php

/**
 *  App Controller Proses Sistem Root by Hekky Nurhikmat
 */
class MY_Controller extends CI_Controller
{
    
    protected $helper = array('url','form');
    protected $library = array('session');


    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper($this->helper);
        $this->load->library($this->library);
    }


    public function load_theme($content,$data = null)
    {
        $this->data['app_title']    = $this->config->item('ci_app_title');
        $this->data['content']      = $this->load->view($content,$data,TRUE);
        $this->load->view("template_base/content",$data);
    }
}
