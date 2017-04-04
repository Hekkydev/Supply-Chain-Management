<?php

/**
 *  App Controller Proses Sistem Root by Hekky Nurhikmat
 */
class MY_Controller extends CI_Controller
{
    
    private $helper = array('url','form');
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper($this->helper);
    }
}
