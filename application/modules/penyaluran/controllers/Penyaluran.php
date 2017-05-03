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
    $this->bulan = $this->scm_library->select_bulan();

  }

  function rencana()
  {

        $this->title_page('LAPORAN RENCANA PENYALURAN');
        $this->load_theme('penyaluran/rencana/rencana_laporan');
  }



  function add_rencana() {
      $this->title_page('INPUT RENCANA PENYALURAN');
      $this->load_theme('penyaluran/rencana/form_rencana');
  }



  function add_realisasi() {
      $this->title_page('INPUT REALISASI PENYALURAN');
      $this->load_theme('penyaluran/realisasi/form_realisasi');
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
          'agen'=>$this->scm_agen_model->get_all(),
          'barang'=>$this->scm_barang_model->get_all(),
          'informasi'=>$this->account_posisition,
          'pangkalan'=>$this->scm_pangkalan_model->get_all(),
          'bulan'=>$this->bulan,
        );
      $this->load->view('penyaluran/realisasi/list_laporan',$data);
  }

}
