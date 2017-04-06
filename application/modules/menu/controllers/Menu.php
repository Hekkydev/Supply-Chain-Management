<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Menu Controller 
 * Author : Hekky Nurhikmat
 */
class Menu extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();

    }

    public function masterdata()
    {
        $this->load_theme_dash('menu/master_data');
    }

    public function operasional()
    {
        $this->load_theme_dash('menu/operasional');
    }

    public function laporan()
    {
        $this->load_theme_dash('menu/laporan');
    }
}



/* End of file Menu.php */
