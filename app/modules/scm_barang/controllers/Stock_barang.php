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
        $this->model_pangkalan = '../modules/scm_pangkalan/models/scm_pangkalan_model';
        $this->load->model($this->model_pangkalan);
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


    function pangkalan()
    {
        $data = [
          'barang'=>$this->scm_pangkalan_model->get_all_stock()
        ];
        //print_r($data); die();
        $this->title_page('stock barang pangkalan');
        $this->load_theme('scm_barang/stock/list_pangkalan',$data);
    }

    function pangkalan_read()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $stock = $this->scm_pangkalan_model->get_stock_detail($id);
        $status = $this->db->query('SELECT * FROM scm_status WHERE id_status NOT IN(1,2,3,4,5,6,7) ')->result();
        $data = [
          'stock'=>$stock,
          'barang' =>$this->scm_barang_model->get_all_stock()->result(),
          'account_position'=>$this->account_position,
          'status'=>$status
        ];
        $this->title_page('stock barang pangkalan');
        $this->load_theme('scm_barang/stock/edit_pangkalan',$data);
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


    function pangkalan_create()
    {

        $data = [
            'pangkalan'=>$this->scm_pangkalan_model->get_all(),
            'barang'=>$this->scm_barang_model->get_all(),
            'account_position'=>$this->account_position,
        ];

        $this->title_page('Tambah stock barang');
        $this->load_theme('scm_barang/stock/add_pangkalan',$data);
    }

    function add_data_stock_pangkalan()
    {
        $data = [
            'id_pangkalan'=>$this->input->post('id_pangkalan'),
            'id_barang'=>$this->input->post('id_barang'),
            'id_status'=>'9',
            'stock_pangkalan'=>$this->input->post('stock'),
            'satuan_pengiriman'=>$this->input->post('satuan_pengiriman'),
            'stock_yang_dikirim'=>$this->input->post('stock_yang_dikirim'),
            'tanggal_update'=>$this->input->post('tanggal')

        ];

        // echo "<pre>";
        // print_r($data);

          $this->load->database();
          $insert = $this->db->insert('scm_barang_stock_pangkalan',$data);
          if ($insert) {
            $this->session->set_flashdata('message','Berhasil mengambahkan stock pangkalan');
            redirect('scm_barang/stock_barang/pangkalan');
          }
    }


    function update_data_stock_pangkalan()
    {
      $id_stock = $this->input->post('id_stock');
        $data = [

            'id_status'=>$this->input->post('id_status'),

        ];

        // echo "<pre>";
        // print_r($data);

          $this->load->database();
          $insert = $this->db->where('id_stock',$id_stock)->update('scm_barang_stock_pangkalan',$data);
          if ($insert) {
            $this->session->set_flashdata('message','Berhasil merubah status pangkalan');
            redirect('scm_barang/stock_barang/pangkalan');
          }
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
