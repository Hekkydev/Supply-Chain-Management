<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends MY_Controller{

  public function __construct()
  {
          parent::__construct();
          $this->account = $this->authentikasi();
          $this->load->model(array(
              'pengiriman_model'
          ));
  }

  function index()
  {
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
                'pengiriman' => $pengiriman,
                'q' => $q,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],
                'start' => $start,
            );
            $this->title_page("Laporan Pengiriman LPG");
            $this->load_theme('pengiriman/laporan', $data);
  }


  function create()
  {
      $data = array(
          'button' => 'Create',
          'action' => site_url('pengiriman/submit'),
          'id_pembelian' => set_value('id_pembelian'),
          'kode_pembelian' => set_value('kode_pembelian'),
          'tanggal_pembelian' => set_value('tanggal_pembelian'),
          'keterangan' => set_value('keterangan'),
          'created' => set_value('created'),
          'modified' => set_value('modified'),
          'deleted' => set_value('deleted'),
      );
      $this->title_page('Input Pengiriman LPG');
      $this->load_theme('pengiriman/create', $data);
  }

  function submit()
  {
    $pengiriman_data = array(
      'tanggal_pengiriman'=>$this->input->post('tanggal_pengiriman'),
      'kode_sppbe'=>$this->input->post('kode_sppbe'),
      'plant'=>$this->input->post('plat'),
      'no_lo'=>$this->input->post('no_lo'),
      'qty_pcs'=>$this->input->post('qty_pcs'),
      'qty_kg'=>$this->input->post('qty_kg'),
    );

    $simpan = $this->pengiriman_model->insert($pengiriman_data);
    if ($simpan) {
      redirect('pengiriman');
    }
  }

  function pdf()
  {
    # code...
  }

  function search() {
    # code...
  }


}
