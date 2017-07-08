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

        $this->load->model(array('../modules/users_group/models/users_group_model'));
    }

    function created()
    {

      $menu = [
        'nama_menu'=>$this->input->post('nama_menu'),
        'link'=>$this->input->post('link'),
        'icon'=>$this->input->post('icon'),
        'id_group'=>$this->input->post('id_group'),
        'id_status'=>1,
      ];

      $post = $this->users_group_model->created_menu($menu);
      redirect('menu/setting');

    }
    function remove($id = null)
    {
      $post = $this->users_group_model->remove_menu($id);
      redirect('menu/setting');
    }
    function setting()
    {
        $data = [
          'group'=>$this->users_group_model->get_all(),
          'menu'=>$this->users_group_model->get_all_menu()
        ];
        $this->title_page('Menu Setting');
        $this->load_theme('menu/setting',$data);
    }
    function index()
    {
        $group = $this->account->id_group;
        switch ($group) {
          case '1';
            $this->load_theme_dash("dashboard/index");
          break;
          case '2';
            redirect('menu/masterdata');
          break;
          case '3';
            redirect('menu/masterdata');
          break;
          case '4':
            redirect('menu/masterdata');
            break;
          case '5':
            redirect('menu/masterdata');
            break;
          case '6':
            redirect('menu/masterdata');
            break;
          case '7':
            redirect('menu/masterdata');
            break;

          default:
              redirect('menu/masterdata');
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
