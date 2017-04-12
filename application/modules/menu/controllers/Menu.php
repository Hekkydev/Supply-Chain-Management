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

    function index()
    {
        // $this->title_page("Dashboard");
        $this->load_theme_dash("dashboard/index");
    }

    public function masterdata()
    {
        $this->title_page("Master Data");
        $this->load_theme_dash('menu/master_data');
    }

    public function transaksi()
    {
        $this->title_page("Transaksi");
        $this->load_theme_dash('menu/transaksi');
    }

    public function laporan()
    {
        $this->title_page("Laporan");
        $this->load_theme_dash('menu/laporan');
    }

    public function penyaluran()
    {
        $this->title_page("Penyaluran");
        $this->load_theme_dash('menu/penyaluran');
    }


    public function order_agen()
    {
        $this->title_page("Pemesanan Pangkalan Ke Agen");
        $this->load_theme_dash("menu/pemesanan/agen");
    }

      public function order_sppbe()
    {
        $this->title_page("Pemesanan Ke SPPBE");
        $this->load_theme_dash("menu/pemesanan/sppbe");
    }

    public function users()
    {
        $this->title_page("Management Akun");
        $this->load_theme_dash('menu/management_akun');
    }

}



/* End of file Menu.php */
