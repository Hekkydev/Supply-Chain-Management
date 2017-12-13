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
        $this->load->library('cart');

    }
    
    public function index()
    {
        $this->title_page('Faktur');
        $this->style('penjualan/faktur/style');
        $this->script('penjualan/faktur/script');
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

    
    function loaditem(){ echo $this->load->view('penjualan/faktur/cart-table-item'); }

    function additem()
    {
       $kode_item =  $this->input->post('kodeitem');
       $qty =  !empty($this->input->post('qty')) ? $_POST['qty'] : '';
        

        $item = cek_item($kode_item);
        $this->load->library('cart');

        $data = array(
            'id'      => $kode_item,
            'qty'     => $qty,
            'price'   => $qty * $item->harga_beli,
            'name'    => $item->nama_barang,
            'options' => array('Size' => 'L', 'Color' => 'Red')
        );

 
        $this->cart->insert($data);

        echo $this->load->view('penjualan/faktur/cart-table-item');

    }


    function removeitem()
    {
            $data = array(
                    'rowid' => $this->input->post('rowid'),
                    'qty'   => 0
            );
            
            $this->cart->update($data);
            echo $this->load->view('penjualan/faktur/cart-table-item');
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
     * SIMPAN DATA FAKTUR
     *
     * Proses simpan/ request data invoice faktur oleh agen
     *
     * @param Data $kode_faktur,$kode_agen,$kode_pangkalan,$kode_item = array(),$tanggal_request
     * @return type data item
     * @throws conditon save to table scm_faktur
     **/
    public function StoredFaktur()
    {
        $kode_faktur = $this->input->post('kode_faktur');
        $kode_agen = $this->input->post('kode_agen');
        $kode_pangkalan = $this->input->post('kode_pangkalan');
        

        $data = [

        ];

        $simpan = $this->db->insert('scm_faktur',$data);
        if($simpan){
            $this->session->set_flashdata('info','Permintaan berhasil di proses');
            
            redirect('faktur','refresh');
            
        }
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
    * Fungsi perubahan status invoice oleh pangkalan
    *
    * fungsi ini digunakan sebagai merubah status data invoice pada pangkalan
    * redirect ke faktur pangkalan { laporan/laporan-faktur } - routing pangkalan
    * @param Type $kode_invoice sebagai primary key nya
    * @return type 
    * @throws conditon berdasarkan nomor invoice (kode_invoice faktur) maka data yang di kembalikan berupa status
    **/
   public function updateFakturStatus()
   {
        $kode_faktur = $this->input->post('kode_faktor');
        if ($kode_faktor == TRUE) {
            $data = [
                'id_status'=>12
            ];

            $update = $this->db->where('kode_faktur',$kode_faktor)->update('scm_faktur',$data);
            if($update){
                $this->session->set_flashdata('info','Proses Berhasil di lakukan');
                
                redirect('laporan/laporan-faktur','refresh');
                                
            }
        }   
   }


   




}

/* End of file Faktur.php */
