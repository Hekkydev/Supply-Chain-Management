<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Faktur yang digunakan sebagai proses data faktur berjalan 
 * author : hekky nurhikmat
 * nama class : Faktur
 * extends : ke core/MY_controller
 */
class Faktur extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->account = $this->authentikasi();
        $this->load->model('Faktur_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $this->title_page('Faktur');
        $this->load_theme('penjualan/faktur/page');
    }
    

    public function add()
    {
        //print_r($this->account); die();
        $data = [
            'invoice'=>$this->no_invoice(),
            'pangkalan'=>$this->pangkalan(),
            'item'=>$this->item(),
        ];
        $this->title_page('Form Faktur Baru');
        $this->style('penjualan/faktur/addstyle');
        $this->script('penjualan/faktur/addscript');
        $this->load_theme('penjualan/faktur/add',$data);
    }

    function additem()
    {
        print_r($_POST);
    }

    function item()
    {
        return $this->db->get('scm_barang')->result();
    }


    function no_invoice()
    {
        $agen = $this->account->kode_akses_position;
        $tanggal = date('Ymd');
        $uniqcode = uniqid($agen);

        $invoice = $tanggal.$uniqcode;
        return strtoupper($invoice);
    }

    function pangkalan()
    {
        return $this->db->get('scm_pangkalan')->result();
    }



    /**
     * -----------PANGKALAN-----------------------------------------------------------------------------
     * fungsi faktur laporan pada session pangkalan
     *
     * fungsi ini digunakan sebagai fungsi pada group pangkalan yang dapat melihat
     * laporan faktur pada pangkalan berdasarkan pangkalan yang terdaftar
     *
     * @param Session posision akses pangkalan
     * @return Result informasi data yang di tampilkan adalah berupa tabel data invoice/faktur
     * @throws conditon berdasarkan session login pangkalan jadi masing masing pangkalan berbeda
     **/
    public function faktur_pangkalan()
    {
        $kode_pangkalan = $this->account->kode_akses_position;

        $dataFaktur = $this->db->get_where('scm_faktur',['kode_pangkalan'=>$kode_pangkalan])->result();

        $data = [
            'invoice'=>$dataFaktur
        ];

        $this->title_page('Laporan Faktur');
        $this->load_theme('penjualan/faktur_pangkalan/page.php');


    } 


   /**
    * Fungsi perubahan status invoice
    *
    * fungsi ini digunakan sebagai merubah status data invoice pada pangkalan
    *
    * @param Type $kode_invoice sebagai primary key nya
    * @return type 
    * @throws conditon berdasarkan nomor invoice (kode_invoice faktur) maka data yang di kembalikan berupa status
    **/
   public function updateFakturStatus()
   {
       
   }




}

/* End of file Faktur.php */
