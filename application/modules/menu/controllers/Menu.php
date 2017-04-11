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
        $this->title_page("Master Data");
        $this->load_theme_dash('menu/master_data');
    }

    public function operasional()
    {
        $this->title_page("Operasional");
        $this->load_theme_dash('menu/operasional');
    }

    public function laporan()
    {
        $this->title_page("Laporan");
        $this->load_theme_dash('menu/laporan');
    }

    public function flow()
    {
        $this->title_page("Penyaluran");
        $this->load_theme_dash('menu/penyaluran');
    }

}



/* End of file Menu.php */
