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
        $this->account = $this->authentikasi();
        $this->account_posisition = $this->scm_library->include_position($this->account->kode_akses_position);
  

    }

    function index()
    {
        $group = $this->account->id_group;
        switch ($group) {
          case '4':
              $this->load_theme_dash("dashboard/index_admin_agen");
            break;
          case '5':
              $this->load_theme_dash("dashboard/index_user_agen");
            break;
          case '7':
              $this->load_theme_dash("dashboard/index_konsumen");
            break;

          default:
              $this->load_theme_dash("dashboard/index");
            break;
        }

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

    public function management()
    {
        $this->title_page("Management Akun");
        $id_group = $this->account->id_group;

        switch ($id_group) {
          case '1':
            $this->load_theme_dash('menu/admin/management_akun');
            break;
          case '2':
            $this->load_theme_dash('menu/users_sppbe/management_akun');
            break;
          case '3':
            $this->load_theme_dash('menu/admin_sppbe/management_akun');
            break;
          case '4':
            $this->load_theme_dash('menu/admin_agen/management_akun');
            break;
          case '5':
            $this->load_theme_dash('menu/users_agen/management_akun');
            break;
          case '6':
            $this->load_theme_dash('menu/users_pangkalan/management_akun');
            break;
          default:
              redirect('home');
            break;
        }



    }

}



/* End of file Menu.php */
