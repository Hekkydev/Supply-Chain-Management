<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends MY_Controller{

  public function __construct()
  {
          parent::__construct();
          $this->account = $this->authentikasi();
          $this->account_posisition = (object) $this->scm_library->include_position($this->account->kode_akses_position);
          $this->load->model(array(
              'pengiriman_model',
              '../modules/scm_agen/models/scm_agen_model',
              '../modules/sppbe/models/sppbe_model',
          ));
          $this->agen = $this->scm_agen_model->get_all();
          $this->sppbe_data = $this->sppbe_model->get_all();

  }
  function using_agen()
  {
        $data = array(
            'action'=>site_url('pengiriman/pengiriman/rekapitulasi'),
            'kode_sppbe'=>$this->sppbe_data,
            'kode_agen'=>$this->account_posisition->kode_usaha,
            'nama_usaha'=>$this->account_posisition->nama_usaha,
            'agen'=>$this->agen,
            'tanggal_pengiriman'=>set_value('tanggal_pengiriman',date('Y-m-d')),
        );
        $this->title_page("Laporan Pengiriman LPG");
        $this->load_theme('pengiriman/form-search-for-agen', $data);
  }
  function index()
  {
            if ($this->account->id_group == 1 || $this->account->id_group == 4 || $this->account->id_group == 5 ) {
              redirect('pengiriman/using_agen');
            }else{
            $q = urldecode($this->input->get('q', TRUE));
            $start = intval($this->input->get('start'));

            if ($q <> '') {
                $config['base_url'] = base_url() . 'pengiriman/index?q=' . urlencode($q);
                $config['first_url'] = base_url() . 'pengiriman/index?q=' . urlencode($q);
            } else {
                $config['base_url'] = base_url() . 'pengiriman/index';
                $config['first_url'] = base_url() . 'pengiriman/index';
            }

            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;
            $config['total_rows'] = $this->pengiriman_model->total_rows($q);
            $pengiriman = $this->pengiriman_model->get_limit_data($config['per_page'], $start, $q);

            $this->load->library('pagination');
            $this->pagination->initialize($config);

            $data = array(
                'action'=>site_url('pengiriman/pengiriman/rekapitulasi'),
                'kode_sppbe'=>$this->account_posisition->kode_usaha,
                'nama_usaha'=>$this->account_posisition->nama_usaha,
                'agen'=>$this->agen,
                'tanggal_pengiriman'=>set_value('tanggal_pengiriman',date('Y-m-d')),
                'pengiriman' => $pengiriman,
                'q' => $q,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],
                'start' => $start,
            );
            $this->title_page("Laporan Pengiriman LPG");
            $this->load_theme('pengiriman/laporan', $data);
            }
  }


  function create()
  {

      $data = array(
          'action' => site_url('pengiriman/pengiriman/submit'),
          'kode_sppbe'=>$this->account_posisition->kode_usaha,
          'nama_usaha'=>$this->account_posisition->nama_usaha,
          'agen'=>$this->agen,
          'tanggal_pengiriman'=>set_value('tanggal_pengiriman',date('Y-m-d')),
      );
      $this->title_page('Input Pengiriman LPG');
      $this->load_theme('pengiriman/create', $data);
  }

  function submit()
  {
    $pengiriman_data = array(
      'tanggal_pengiriman'=>$this->input->post('tanggal_pengiriman'),
      'kode_sppbe'=>$this->input->post('kode_sppbe'),
      'kode_agen'=>$this->input->post('kode_agen'),
      'plant'=>$this->input->post('plat'),
      'no_lo'=>$this->input->post('no_lo'),
      'qty_pcs'=>$this->input->post('qty_pcs'),
      'qty_kg'=>$this->input->post('qty_kg'),
    );
    //print_r($pengiriman_data); die();
    $simpan = $this->pengiriman_model->insert($pengiriman_data);
    if ($simpan == TRUE) {
      redirect('pengiriman');
    }
  }

  function pdf()
  {
      $tanggal = $this->input->get('tanggal_pengiriman');
      $kode_agen = $this->input->get('kode_agen');
      $kode_sppbe = $this->input->get('kode_sppbe');
      $data = array(
        'tanggal_pengiriman'=>$this->input->get('tanggal_pengiriman'),
        'kode_sppbe'=>$this->input->get('kode_sppbe'),
        'kode_agen'=>$this->input->get('kode_agen'),
        'pengiriman'=>$this->pengiriman_model->rekapitulasi($tanggal,$kode_sppbe,$kode_agen),
      );
      $report = [
        'footer' =>'Supply Chain Management',
        'title'=>'Rekapitulasi Pengiriman LPG',
        'body'=>$this->load->view('pengiriman/pdf', $data,TRUE),
        'filename'=>'Rekapitulasi Pengiriman LPG',
      ];


      // print_r($report); die();
      $this->load->library('pdf');
      $pdf = $this->pdf->load();
      $pdf->SetHeader($report['footer'].'|'.$report['title'].'|'.date(DATE_RFC822));
      $pdf->SetFooter($report['footer'].'|{PAGENO}|'.date(DATE_RFC822));
      $pdf->WriteHTML($report['body']);
      $pdf->Output(''.$report['filename'].'_report.pdf','D');
  }

  function rekapitulasi() {
    $tanggal = $this->input->post('tanggal_pengiriman');
    $kode_sppbe = $this->input->post('kode_sppbe');
    $kode_agen = $this->input->post('kode_agen');
    $pengiriman = $this->pengiriman_model->rekapitulasi($tanggal,$kode_sppbe,$kode_agen);
    $this->data = array(
      'tanggal_pengiriman'=>$this->input->post('tanggal_pengiriman'),
      'kode_sppbe'=>$this->input->post('kode_sppbe'),
      'kode_agen'=>$this->input->post('kode_agen'),
      'pengiriman'=>$pengiriman,
    );
    $this->title_page('Rekapitulasi Pengiriman Produk');
    $this->load_theme('pengiriman/rekapitulasi', $this->data);
  }


}
