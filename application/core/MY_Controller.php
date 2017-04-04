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
}
