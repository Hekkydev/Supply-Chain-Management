<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyaluran extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->account = $this->authentikasi();
    $this->account_posisition = (object) $this->scm_library->include_position($this->account->kode_akses_position);
    $this->load->model('../modules/scm_pangkalan/models/scm_pangkalan_model');
    $this->load->model('../modules/scm_barang/models/scm_barang_model');
    $this->load->model('../modules/scm_agen/models/scm_agen_model');
    $this->load->model(array('penyaluran_model'));
    $this->bulan = $this->scm_library->select_bulan();
    $this->load->library('form_validation');

  }

  function rencana()
  {
        $data = array(
          'agen'=>$this->scm_agen_model->get_all(),
          'barang'=>$this->scm_barang_model->get_all(),
          'informasi'=>$this->account_posisition,
          'pangkalan'=>$this->scm_pangkalan_model->get_all(),
          'bulan'=>$this->bulan,
        );
        $this->title_page('LAPORAN RENCANA PENYALURAN');
        $this->load_theme('penyaluran/rencana/rencana_laporan',$data);
  }



  function add_rencana() {
      $kode_penyaluran = $this->penyaluran_model->kode_penyaluran();
      $kode_agen = $this->account_posisition->kode_usaha;
      $data = array(
        'agen'=>$this->scm_agen_model->get_all(),
        'kode_penyaluran'=>set_value('kode_penyaluran',$kode_penyaluran),
        'tanggal_penyaluran'=>set_value('tanggal_penyaluran',date('Y-m-d')),
        'kode_agen'=>set_value('kode_agen',$kode_agen),
        'pangkalan'=>$this->scm_pangkalan_model->get_all(),
        'barang'=>$this->scm_barang_model->get_all(),
        'id_penyaluran_kondisi'=>set_value('id_penyaluran_kondisi',2),
      );
      $this->title_page('INPUT RENCANA PENYALURAN');
      $this->load_theme('penyaluran/rencana/form_rencana',$data);
  }



  function add_realisasi() {
      $kode_penyaluran = $this->penyaluran_model->kode_penyaluran();
      $kode_agen = $this->account_posisition->kode_usaha;
      $data = array(
        'agen'=>$this->scm_agen_model->get_all(),
        'kode_penyaluran'=>set_value('kode_penyaluran',$kode_penyaluran),
        'tanggal_penyaluran'=>set_value('tanggal_penyaluran',date('Y-m-d')),
        'kode_agen'=>set_value('kode_agen',$kode_agen),
        'pangkalan'=>$this->scm_pangkalan_model->get_all(),
        'barang'=>$this->scm_barang_model->get_all(),
        'id_penyaluran_kondisi'=>set_value('id_penyaluran_kondisi',1),
      );
      $this->title_page('INPUT REALISASI PENYALURAN');
      $this->load_theme('penyaluran/realisasi/form_realisasi',$data);
  }

  function add_realisasi_proses() {
    $this->_rules_add_penyaluran();
    if ($this->form_validation->run() == FALSE) {
      $proses = array(
        'error'=>1,
        'message'=>'Error Menyimpan Realisasi'
      );
      echo json_encode($proses);
    }else{
      $data  = array(
        'kode_penyaluran'=>$this->input->post('kode_penyaluran'),
        'tanggal_penyaluran'=>$this->input->post('tanggal_penyaluran'),
        'kode_barang'=>$this->input->post('kode_barang'),
        'kode_pangkalan'=>$this->input->post('kode_pangkalan'),
        'jumlah_penyaluran'=>$this->input->post('jumlah_penyaluran'),
        'id_penyaluran_kondisi'=>$this->input->post('id_penyaluran_kondisi'),
        'id_user'=>$this->account->id_user,
        'created'=>$this->date_now(),
      );
      $simpan = $this->penyaluran_model->insert_penyaluran_data($data);
      if ($simpan == TRUE) {
        $proses = array(
          'error'=>0,
          'message'=>'Berhasil menyimpan realisasi'
        );
        echo json_encode($proses);
      }else{
        $proses = array(
          'error'=>1,
          'message'=>'Error Menyimpan Realisasi'
        );
        echo json_encode($proses);
      }
    }

  }

  function add_rencana_proses() {
    $this->_rules_add_penyaluran();
    if ($this->form_validation->run() == FALSE) {
      $proses = array(
        'error'=>1,
        'message'=>'Error Menyimpan Realisasi'
      );
      echo json_encode($proses);
    }else{
      $data  = array(
        'kode_penyaluran'=>$this->input->post('kode_penyaluran'),
        'tanggal_penyaluran'=>$this->input->post('tanggal_penyaluran'),
        'kode_barang'=>$this->input->post('kode_barang'),
        'kode_pangkalan'=>$this->input->post('kode_pangkalan'),
        'jumlah_penyaluran'=>$this->input->post('jumlah_penyaluran'),
        'id_penyaluran_kondisi'=>$this->input->post('id_penyaluran_kondisi'),
        'id_user'=>$this->account->id_user,
        'created'=>$this->date_now(),
      );
      $simpan = $this->penyaluran_model->insert_penyaluran_data($data);
      if ($simpan == TRUE) {
        $proses = array(
          'error'=>0,
          'message'=>'Berhasil menyimpan realisasi'
        );
        echo json_encode($proses);
      }else{
        $proses = array(
          'error'=>1,
          'message'=>'Error Menyimpan Realisasi'
        );
        echo json_encode($proses);
      }
    }

  }

  function _rules_add_penyaluran() {
    $this->form_validation->set_rules('kode_penyaluran', 'KODE PENYALURAN', 'required|trim');
    $this->form_validation->set_rules('tanggal_penyaluran', 'TANGGAL PENYALURAN', 'required|trim');
    $this->form_validation->set_rules('kode_barang', 'KODE BARANG', 'required|trim');
  }

  function realisasi() {
        $data = array(
          'agen'=>$this->scm_agen_model->get_all(),
          'barang'=>$this->scm_barang_model->get_all(),
          'informasi'=>$this->account_posisition,
          'pangkalan'=>$this->scm_pangkalan_model->get_all(),
          'bulan'=>$this->bulan,
        );
        $this->title_page('LAPORAN REALISASI PENYALURAN');
        $this->load_theme('penyaluran/realisasi/realisasi_laporan',$data);
  }

  function cari_data_laporan_realisasi() {

        $data = array(
          'post'=>$_POST,
          'agen'=>$this->scm_agen_model->get_all(),
          'barang'=>$this->scm_barang_model->get_all(),
          'informasi'=>$this->account_posisition,
          'pangkalan'=>$this->scm_pangkalan_model->get_all(),
          'bulan'=>$this->bulan,
        );
      $this->load->view('penyaluran/realisasi/list_laporan',$data);
  }


  function cari_data_laporan_rencana() {

        $data = array(
          'post'=>$_POST,
          'agen'=>$this->scm_agen_model->get_all(),
          'barang'=>$this->scm_barang_model->get_all(),
          'informasi'=>$this->account_posisition,
          'pangkalan'=>$this->scm_pangkalan_model->get_all(),
          'bulan'=>$this->bulan,
        );
      $this->load->view('penyaluran/rencana/list_laporan',$data);
  }


  function realisasi_pdf()
  {
       $data = array(
          'post'=>$_POST,
          'agen'=>$this->scm_agen_model->get_all(),
          'barang'=>$this->scm_barang_model->get_all(),
          'informasi'=>$this->account_posisition,
          'pangkalan'=>$this->scm_pangkalan_model->get_all(),
          'bulan'=>$this->bulan,
        );
        $report = [
          'footer' =>'Supply Chain Management',
          'title'=>'Laporan Realisasi',
          'body'=>$this->load->view('penyaluran/rencana/list_laporan', $data,TRUE),
          'filename'=>'Laporan Realisasi',
        ];

        //print_r($report);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->SetHeader($report['footer'].'|'.$report['title'].'|'.date(DATE_RFC822));
        $pdf->SetFooter($report['footer'].'|{PAGENO}|'.date(DATE_RFC822));
        $pdf->WriteHTML($report['body']);
        $pdf->Output(''.$report['filename'].'_report.pdf','D');
  }

    function rencana_pdf()
  {
       $data = array(
          'post'=>$_POST,
          'agen'=>$this->scm_agen_model->get_all(),
          'barang'=>$this->scm_barang_model->get_all(),
          'informasi'=>$this->account_posisition,
          'pangkalan'=>$this->scm_pangkalan_model->get_all(),
          'bulan'=>$this->bulan,
        );
        $report = [
          'footer' =>'Supply Chain Management',
          'title'=>'Laporan Rencana',
          'body'=>$this->load->view('penyaluran/rencana/list_laporan', $data,TRUE),
          'filename'=>'Laporan Rencana',
        ];

        //print_r($report);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->SetHeader($report['footer'].'|'.$report['title'].'|'.date(DATE_RFC822));
        $pdf->SetFooter($report['footer'].'|{PAGENO}|'.date(DATE_RFC822));
        $pdf->WriteHTML($report['body']);
        $pdf->Output(''.$report['filename'].'_report.pdf','D');
  }



}
