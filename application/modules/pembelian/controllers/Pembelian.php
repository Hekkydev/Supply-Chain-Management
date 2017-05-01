<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembelian extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->account = $this->authentikasi();
        $this->load->model('Pembelian_model');
        $this->load->model('../modules/scm_barang/models/Scm_barang_model');
        $this->load->library(array('form_validation','cart'));
        
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembelian/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembelian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembelian/index.html';
            $config['first_url'] = base_url() . 'pembelian/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembelian_model->total_rows($q);
        $pembelian = $this->Pembelian_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembelian_data' => $pembelian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->title_page("Laporan Pembelian");
        $this->load_theme('pembelian/scm_pembelian_list', $data);
    }

    public function read($id)
    {
        $row = $this->Pembelian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pembelian' => $row->id_pembelian,
		'kode_pembelian' => $row->kode_pembelian,
		'tanggal_pembelian' => $row->tanggal_pembelian,
		'keterangan' => $row->keterangan,
		'created' => $row->created,
		'modified' => $row->modified,
		'deleted' => $row->deleted,
	    );
            $this->load_theme('pembelian/scm_pembelian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembelian/create_action'),
            'id_pembelian' => set_value('id_pembelian'),
            'kode_pembelian' => set_value('kode_pembelian'),
            'tanggal_pembelian' => set_value('tanggal_pembelian'),
            'keterangan' => set_value('keterangan'),
            'created' => set_value('created'),
            'modified' => set_value('modified'),
            'deleted' => set_value('deleted'),
        );
        $this->title_page('Transaksi Pembelian');
        $this->load_theme('pembelian/scm_pembelian_form', $data);
        //$this->load_theme('pembelian/scm_pembelian_form', $data);
    }


    public function create_transaksi_pembelian_konsumen()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembelian/create_action'),
            'id_pembelian' => set_value('id_pembelian'),
            'kode_pembelian' => set_value('kode_pembelian',$this->scm_library->kode_transaksi_pembelian()),
            'tanggal_pembelian' => set_value('tanggal_pembelian'),
            'keterangan' => set_value('keterangan'),
            'created' => set_value('created'),
            'modified' => set_value('modified'),
            'deleted' => set_value('deleted'),
        );
        $data['account'] = $this->account;

        $this->title_page('Transaksi Pembelian');
        $this->load_theme('pembelian/transaksi/add', $data);
        //$this->load_theme('pembelian/scm_pembelian_form', $data);
    }

    public function itemsList()
    {

          $data['item'] = $this->Scm_barang_model->get_product();
          $this->load->view('pembelian/transaksi/list_item', $data);
    }

    public function cartlist()
    {
          $content = $this->load->view('pembelian/transaksi/list');
    }


    public function add_to_cart()
    {

       $id = $this->input->post('id_barang');
       $qty = $this->input->post('qty');

       $item = $this->Scm_barang_model->get_product_detail($id);
       if ($item == TRUE) {
         $data = array(
          'id'      => $item->kode_barang,
          'qty'     => $qty,
          'price'   => $item->harga_jual,
          'name'    => $item->nama_barang,
          'options' => array()
        );
        $this->cart->insert($data);
       }
    }

    public function remove_cart_id()
    {
      $id_barang =   $this->input->get('rowid');
        $data = array(
            'rowid' => $id_barang,
            'qty'   => 0
        );

        $this->cart->update($data);
    }


    public function add_to_transaksi()
    {
        if($this->cart->contents() == TRUE):
          $data_transaksi_pembelian = array(
            'id_user'=>$this->input->post('id_user'),
            'kode_pembelian'=>$this->input->post('kode_pembelian'),
            'tanggal_pembelian'=>$this->input->post('tanggal_pembelian'),
            'keterangan'=>$this->input->post('keterangan'),
            'created'=>$this->date_now(),
          );


          $data_transaksi_pengiriman = array(
            'kode_pembelian'=>$this->input->post('kode_pembelian'),
            'nama_penerima'=>$this->input->post('nama_penerima'),
            'alamat_penerima'=>$this->input->post('alamat_penerima'),
            'kota_penerima'=>$this->input->post('kota_penerima'),
            'telp_penerima'=>$this->input->post('telp_penerima'),
          );
        
        $simpan_transaksi_pembelian = $this->db->insert('scm_pembelian', $data_transaksi_pembelian);
        $simpan_transaksi_pengiriman = $this->db->insert('scm_pembelian_pengiriman', $data_transaksi_pengiriman);

        foreach ($this->cart->contents() as $items):
          $data_item_pembelian = array(
              'kode_pembelian'=>$this->input->post('kode_pembelian'),
              'kode_item'=>$items['id'],
              'jumlah_item'=>$items['qty'],
              'harga_item'=>$items['price'],
              'created'=>$this->date_now(),
          );

          $simpan = $this->db->insert('scm_pembelian_item', $data_item_pembelian);
        endforeach;
        $this->cart->destroy();
        endif;
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('pembelian/create_transaksi_pembelian_konsumen'));
    }

    public function laporan_for_konsumen()
    {
                $q = urldecode($this->input->get('q', TRUE));
                $start = intval($this->input->get('start'));

                if ($q <> '') {
                    $config['base_url'] = base_url() . 'pembelian/laporan_for_konsumen?q=' . urlencode($q);
                    $config['first_url'] = base_url() . 'pembelian/laporan_for_konsumen?q=' . urlencode($q);
                } else {
                    $config['base_url'] = base_url() . 'pembelian/laporan_for_konsumen';
                    $config['first_url'] = base_url() . 'pembelian/laporan_for_konsumen';
                }

                $config['per_page'] = 10;
                $config['page_query_string'] = TRUE;
                $config['total_rows'] = $this->Pembelian_model->total_rows_pembelian($q,$this->account->id_user);
                $pembelian = $this->Pembelian_model->get_limit_data_pembelian($config['per_page'], $start, $q,$this->account->id_user);

                $this->load->library('pagination');
                $this->pagination->initialize($config);

                $data = array(
                    'pembelian_data' => $pembelian,
                    'q' => $q,
                    'pagination' => $this->pagination->create_links(),
                    'total_rows' => $config['total_rows'],
                    'start' => $start,
                );
                $this->title_page("Laporan Pembelian");
                $this->load_theme('pembelian/transaksi/list_laporan', $data);
    }

    public function read_permintaan($id = null)
    {
                $this->load->helper(array('scm'));
                $row = $this->Pembelian_model->get_by_id($id);
                 
                 
                if ($row) {
                    $penerima = $this->Pembelian_model->get_penerima_by_kode_pembelian($row->kode_pembelian);
                    $data = array(
                    'id_pembelian' => $row->id_pembelian,
                    'kode_pembelian' => $row->kode_pembelian,
                    'tanggal_pembelian' => $row->tanggal_pembelian,
                    'nama_pelanggan'=>cek_user($row->id_user)->nama_lengkap,
                    'id_user'=>$row->id_user,
                    'keterangan' => $row->keterangan,
                    'created' => $row->created,
                    'modified' => $row->modified,
                    'deleted' => $row->deleted,
                    'nama_penerima'=>$penerima->nama_penerima,
                    'alamat_penerima'=>$penerima->alamat_penerima,
                    'kota_penerima'=>$penerima->kota_penerima,
                    'telp_penerima' =>$penerima->telp_penerima,
                    'list_pembelian'=>$this->Pembelian_model->list_item($row->kode_pembelian),
                    );
                   
                    $this->load_theme('pembelian/transaksi/read_permintaan', $data);
                } else {
                    $this->session->set_flashdata('message', 'Record Not Found');
                    redirect(site_url('pembelian'));
                }
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_pembelian' => $this->input->post('kode_pembelian',TRUE),
		'tanggal_pembelian' => $this->input->post('tanggal_pembelian',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'created' => $this->input->post('created',TRUE),
		'modified' => $this->input->post('modified',TRUE),
		'deleted' => $this->input->post('deleted',TRUE),
	    );

            $this->Pembelian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembelian'));
        }
    }

    public function update($id)
    {
        $row = $this->Pembelian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembelian/update_action'),
		'id_pembelian' => set_value('id_pembelian', $row->id_pembelian),
		'kode_pembelian' => set_value('kode_pembelian', $row->kode_pembelian),
		'tanggal_pembelian' => set_value('tanggal_pembelian', $row->tanggal_pembelian),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'created' => set_value('created', $row->created),
		'modified' => set_value('modified', $row->modified),
		'deleted' => set_value('deleted', $row->deleted),
	    );
            $this->load_theme('pembelian/scm_pembelian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembelian', TRUE));
        } else {
            $data = array(
            'kode_pembelian' => $this->input->post('kode_pembelian',TRUE),
            'tanggal_pembelian' => $this->input->post('tanggal_pembelian',TRUE),
            'keterangan' => $this->input->post('keterangan',TRUE),
            'created' => $this->input->post('created',TRUE),
            'modified' => $this->input->post('modified',TRUE),
            'deleted' => $this->input->post('deleted',TRUE),
            );

            $this->Pembelian_model->update($this->input->post('id_pembelian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembelian'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pembelian_model->get_by_id($id);

        if ($row) {
            $this->Pembelian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembelian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

     public function delete_laporan_konsumen($id)
    {
        $row = $this->Pembelian_model->get_by_id($id);

        if ($row) {
            $this->Pembelian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembelian/laporan_for_konsumen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian/laporan_for_konsumen'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('kode_pembelian', 'kode pembelian', 'trim|required');
	$this->form_validation->set_rules('tanggal_pembelian', 'tanggal pembelian', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('created', 'created', 'trim|required');
	$this->form_validation->set_rules('modified', 'modified', 'trim|required');
	$this->form_validation->set_rules('deleted', 'deleted', 'trim|required');

	$this->form_validation->set_rules('id_pembelian', 'id_pembelian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "scm_pembelian.xls";
        $judul = "scm_pembelian";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Kode Pembelian");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pembelian");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
        xlsWriteLabel($tablehead, $kolomhead++, "Created");
        xlsWriteLabel($tablehead, $kolomhead++, "Modified");
        xlsWriteLabel($tablehead, $kolomhead++, "Deleted");

	foreach ($this->Pembelian_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->kode_pembelian);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_pembelian);
            xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
            xlsWriteLabel($tablebody, $kolombody++, $data->created);
            xlsWriteLabel($tablebody, $kolombody++, $data->modified);
            xlsWriteLabel($tablebody, $kolombody++, $data->deleted);

            $tablebody++;
                $nourut++;
            }

            xlsEOF();
            exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=scm_pembelian.doc");

        $data = array(
            'scm_pembelian_data' => $this->Pembelian_model->get_all(),
            'start' => 0
        );

        $this->load_theme('pembelian/scm_pembelian_doc',$data);
    }

}
