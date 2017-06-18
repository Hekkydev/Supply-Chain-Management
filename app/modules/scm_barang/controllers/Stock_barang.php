<?php
defined('BASEPATH') or exit("Jangan Masuk Sembarangan!");
/**
 * Control Stock Barang
 */
class Stock_Barang extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->account = $this->Authentikasi();
        $this->account_position = (object) $this->scm_library->include_position($this->account->kode_akses_position);
        $this->model_agen = '../modules/scm_agen/models/Scm_agen_model';
        $this->load->model(array($this->model_agen,'scm_barang_model'));
    }

    function index()
    {
        $data = array(
          'barang' =>$this->scm_barang_model->get_all_stock()->result(),
          'account_position'=>$this->account_position,
        );
        $this->title_page("Stock Barang");
        $this->load_theme('scm_barang/stock/list',$data);
    }

    function create()
    {
        $data = array(
            'agen'=>$this->Scm_agen_model->get_all(),
            'barang'=>$this->scm_barang_model->get_all(),
            'account_position'=>$this->account_position,
        );

        $this->title_page("Tambah Stock Barang");
        $this->load_theme('scm_barang/stock/add',$data);
    }

    function update_stock() {
          $id_agen = $this->input->post('id_agen');
          $id_barang = $this->input->post('id_barang');
          $stock = $this->input->post('stock');
          $tanggal = $this->input->post('tanggal');

          $data = array(
            'id_barang' =>$id_barang,
            'id_agen'=>$id_agen,
            'stock_agen'=>$stock,
            'tanggal_update'=>$tanggal
          );
          $simpan = $this->scm_barang_model->insert_stock($data);
          if ($simpan == TRUE) {
              redirect('scm_barang/stock_barang');
          }
    }


    function deleted_stock() {
        $id = $this->input->get('id_stock');
        $deleted = $this->scm_barang_model->deleted_stock($id);
        if ($deleted == TRUE) {
          redirect('scm_barang/stock_barang');
        }

    }
}
