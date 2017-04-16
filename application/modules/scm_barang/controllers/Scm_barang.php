<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Scm_barang extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->account = $this->authentikasi();
        $this->load->model('Scm_barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'scm_barang/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'scm_barang/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'scm_barang/index';
            $config['first_url'] = base_url() . 'scm_barang/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Scm_barang_model->total_rows($q);
        $scm_barang = $this->Scm_barang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'scm_barang_data' => $scm_barang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->title_page('Data Barang');
        $this->load_theme('scm_barang/scm_barang_list', $data);
    }

    public function read($id)
    {
        $row = $this->Scm_barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang' => $row->id_barang,
		'id_user' => $row->id_user,
		'kode_barang' => $row->kode_barang,
		'nama_barang' => $row->nama_barang,
		'stock' => $row->stock,
		'satuan' => $row->satuan,
		'harga_jual' => $row->harga_jual,
		'harga_beli' => $row->harga_beli,
		'diskon' => $row->diskon,
		'id_kategori' => $row->id_kategori,
		'keterangan' => $row->keterangan,
		'gambar' => $row->gambar,
		'created' => $row->created,
		'modified' => $row->modified,
	    );
         $this->title_page('Data Barang');
            $this->load_theme('scm_barang/scm_barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('scm_barang'));
        }
    }

    public function create()
    {
        $this->load->model('../modules/kategori/models/kategori_model');
        $kode_barang = $this->scm_library->kode_barang();

        //print_r($data['kategori_barang']); die();
        $data = array(
            'button' => 'Create',
            'action' => site_url('scm_barang/create_action'),
      	    'id_barang' => set_value('id_barang'),
      	    'id_user' => set_value('id_user'),
      	    'kode_barang' => $kode_barang,
      	    'nama_barang' => set_value('nama_barang'),
      	    'stock' => set_value('stock'),
      	    'satuan' => set_value('satuan'),
      	    'harga_jual' => set_value('harga_jual'),
      	    'harga_beli' => set_value('harga_beli'),
      	    'diskon' => set_value('diskon'),
      	    'id_kategori' => set_value('id_kategori'),
      	    'keterangan' => set_value('keterangan'),
      	    'gambar' => set_value('gambar'),
      	    'created' => set_value('created'),
      	    'modified' => set_value('modified'),
      	   );
          $data['kategori_barang'] = $this->kategori_model->get_all();
          $this->title_page('Data Barang');
          $this->load_theme('scm_barang/add', $data);
    }

    public function create_action()
    {


        $upload_file = $_FILES;
        $upload = $this->uploaded_image($upload_file);
        if ($upload->status == 1) {
          $gambar = $upload->gambar;
        }else{
          $gambar = $upload->gambar;
        }


        $data = array(
    		'id_user' => $this->account->id_user,
    		'kode_barang' => $this->input->post('kode_barang',TRUE),
    		'nama_barang' => $this->input->post('nama_barang',TRUE),
    		'stock' => $this->input->post('stock',TRUE),
    		'satuan' => $this->input->post('satuan',TRUE),
    		'harga_jual' => $this->input->post('harga_jual',TRUE),
    		'harga_beli' => $this->input->post('harga_beli',TRUE),
    		'diskon' => $this->input->post('diskon',TRUE),
    		'id_kategori' => $this->input->post('id_kategori',TRUE),
    		'keterangan' => $this->input->post('keterangan',TRUE),
    		'gambar' => $gambar,
    		'created' => $this->date_now(),
    	    );

        $this->Scm_barang_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('scm_barang'));

    }

    public function uploaded_image($upload_file = array())
    {
          $file = $upload_file;

          $target_dir = "./upload/";
          $target_file = $target_dir . basename($file["gambar"]["name"]);
          $uploadOk = 1;
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          // Check if image file is a actual image or fake image
          if(isset($_POST["submit"])) {
              $check = getimagesize($file["gambar"]["tmp_name"]);
              if($check !== false) {
                  // echo "File is an image - " . $check["mime"] . ".";
                  $uploadOk = 1;
              } else {
                  // echo "File is not an image.";
                  $uploadOk = 0;
              }
          }

                  // Check if file already exists
            if (file_exists($target_file)) {
                // echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($file["gambar"]["size"] > 500000) {
                // echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            $type_image = array('JPG','PNG','JPEG','GIF','jpg','png','jpeg','gif');
            // Allow certain file formats
            if(array_key_exists($imageFileType,$type_image,TRUE)) {
                //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                // echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($file["gambar"]["tmp_name"], $target_file)) {
                    // echo "The file ". basename( $file["gambar"]["name"]). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
            }


            return $result = (object) array(
              'status'=>$uploadOk,
              'gambar'=>$file['gambar']['name'],
            );
    }



    public function update($id)
    {
        $row = $this->Scm_barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('scm_barang/update_action'),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'id_user' => set_value('id_user', $row->id_user),
		'kode_barang' => set_value('kode_barang', $row->kode_barang),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
		'stock' => set_value('stock', $row->stock),
		'satuan' => set_value('satuan', $row->satuan),
		'harga_jual' => set_value('harga_jual', $row->harga_jual),
		'harga_beli' => set_value('harga_beli', $row->harga_beli),
		'diskon' => set_value('diskon', $row->diskon),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'gambar' => set_value('gambar', $row->gambar),
		'created' => set_value('created', $row->created),
		'modified' => set_value('modified', $row->modified),
	    );
            $this->load_theme('scm_barang/scm_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('scm_barang'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'stock' => $this->input->post('stock',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'harga_jual' => $this->input->post('harga_jual',TRUE),
		'harga_beli' => $this->input->post('harga_beli',TRUE),
		'diskon' => $this->input->post('diskon',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'created' => $this->input->post('created',TRUE),
		'modified' => $this->input->post('modified',TRUE),
	    );

            $this->Scm_barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('scm_barang'));
        }
    }

    public function delete($id)
    {
        $row = $this->Scm_barang_model->get_by_id($id);

        if ($row) {
            $this->Scm_barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('scm_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('scm_barang'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('kode_barang', 'kode barang', 'trim|required');
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('stock', 'stock', 'trim|required');
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
	$this->form_validation->set_rules('harga_jual', 'harga jual', 'trim|required|numeric');
	$this->form_validation->set_rules('harga_beli', 'harga beli', 'trim|required|numeric');
	$this->form_validation->set_rules('diskon', 'diskon', 'trim|required|numeric');
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	$this->form_validation->set_rules('created', 'created', 'trim|required');
	$this->form_validation->set_rules('modified', 'modified', 'trim|required');

	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "scm_barang.xls";
        $judul = "scm_barang";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id User");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Stock");
	xlsWriteLabel($tablehead, $kolomhead++, "Satuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Jual");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Beli");
	xlsWriteLabel($tablehead, $kolomhead++, "Diskon");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "Created");
	xlsWriteLabel($tablehead, $kolomhead++, "Modified");

	foreach ($this->Scm_barang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stock);
	    xlsWriteNumber($tablebody, $kolombody++, $data->satuan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga_jual);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga_beli);
	    xlsWriteNumber($tablebody, $kolombody++, $data->diskon);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created);
	    xlsWriteLabel($tablebody, $kolombody++, $data->modified);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=scm_barang.doc");

        $data = array(
            'scm_barang_data' => $this->Scm_barang_model->get_all(),
            'start' => 0
        );

        $this->load->view('scm_barang/scm_barang_doc',$data);
    }

}

/* End of file Scm_barang.php */
/* Location: ./application/controllers/Scm_barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-07 12:26:54 */
/* http://harviacode.com */
