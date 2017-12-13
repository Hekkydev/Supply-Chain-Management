<?php
defined("BASEPATH") or exit("Jangan Sembarangan Hacking");

/**
 * SCM Library by Hekky Nurhikmat
 *  general library untuk aplikasi supply chain management
 *
 */
class scm_library
{
    var $SCM;

    function __construct()
    {
        $this->SCM =& get_instance();
        $this->model_kategori = '../modules/kategori/models/kategori_model';
        $this->model_user = '../modules/users/models/Users_model';
        $this->model_barang = '../modules/scm_barang/models/scm_barang_model';
        $this->model_sppbe = '../modules/sppbe/models/sppbe_model';
        $this->model_agen = '../modules/scm_agen/models/scm_agen_model';
        $this->model_pangkalan = '../modules/scm_pangkalan/models/scm_pangkalan_model';
        $this->model_satuan_barang = '../modules/scm_barang_satuan/models/scm_barang_satuan_model';
        $this->model_pembelian= '../modules/pembelian/models/pembelian_model';
        $this->model_aplikasi = 'Aplikasi_model';
        $this->model_penyaluran = '../modules/penyaluran/models/penyaluran_model';



    }


    public function kode_kategori()
    {
        $this->SCM->load->model($this->model_kategori);
        $result = $this->SCM->kategori_model->generate_auto_kode();
        return $result;
    }

    public function kategori()
    {
      $this->SCM->load->model($this->model_kategori);
      $result = $this->SCM->kategori_model->get_all();
      return $result;
    }

    public function kode_user()
    {
        $this->SCM->load->model($this->model_user);
        $result = $this->SCM->Users_model->generate_auto_kode();
        return $result;
    }

    public function kode_barang()
    {
        $this->SCM->load->model($this->model_barang);
        $result = $this->SCM->scm_barang_model->generate_auto_kode();
        return $result;
    }

    public function satuan_barang()
    {
        $this->SCM->load->model($this->model_satuan_barang);
        $satuan = $this->SCM->scm_barang_satuan_model->get_all();
        return $satuan;
    }


    public function kode_sppbe()
    {
      $this->SCM->load->model($this->model_sppbe);
      $result = $this->SCM->sppbe_model->generate_auto_kode();
      return $result;
    }

    public function kode_agen()
    {
        $this->SCM->load->model($this->model_agen);
        $result = $this->SCM->scm_agen_model->generate_auto_kode();
        return $result;
    }

    public function kode_pangkalan()
    {
        $this->SCM->load->model($this->model_pangkalan);
        $result = $this->SCM->pembelian_model->generate_auto_kode();
        return $result;
    }

    public function kode_transaksi_pembelian()
    {
        $this->SCM->load->model($this->model_pembelian);
        $result = $this->SCM->pembelian_model->generate_auto_kode();
        return $result;
    }

    public function akses_posision()
    {
          $this->SCM->load->model($this->model_sppbe);
          $this->SCM->load->model($this->model_pangkalan);
          $this->SCM->load->model($this->model_agen);

          $agen = $this->SCM->scm_agen_model->get_all();
          $sppbe = $this->SCM->sppbe_model->get_all();
          $pangkalan  = $this->SCM->scm_pangkalan_model->get_all();

          foreach ($agen as $a) {
              $result[] = array('kode'=>$a->kode_agen,'posisi'=>'AGEN','nama_posisi'=>$a->nama_agen);
          }
          foreach ($sppbe as $s) {
              $result[] = array('kode'=>$s->kode_sppbe,'posisi'=>'SPPBE','nama_posisi'=>$s->nama_sppbe);
          }
          foreach ($pangkalan as $p) {
              $result[] = array('kode'=>$p->kode_pangkalan,'posisi'=>'PANGKALAN','nama_posisi'=>$p->nama_pangkalan);
          }
          return  $result;
    }

    public function include_position($kode_akses)
    {
            $r = array();
            foreach ($this->akses_posision() as $akses) {
               $a =  $akses['kode'];
               array_push($r,$a);
            }

            if (in_array($kode_akses,$r)) {
              $result = 1;
            }else{
              $result = 0;
            }

            if ($result == 1) {
               $value_akses = $this->search_posisition($kode_akses);
               return $value_akses;
            }else{
               return  array('nama_usaha'=>NULL);
            }

    }


    public function search_posisition($kode_akses)
    {
            $this->SCM->load->model($this->model_sppbe);
            $this->SCM->load->model($this->model_pangkalan);
            $this->SCM->load->model($this->model_agen);
            $agen = $this->SCM->scm_agen_model->get_by_kode($kode_akses);
            $sppbe = $this->SCM->sppbe_model->get_by_kode($kode_akses);
            $pangkalan = $this->SCM->scm_pangkalan_model->get_by_kode($kode_akses);
            if ($agen == TRUE) {
                  return $data = array(
                    'kode_usaha'=>$agen->kode_agen,
                    'nama_usaha'=>$agen->nama_agen,
                    'alamat'=>$agen->alamat_agen,
                    'telephone'=>$agen->no_telp_agen,
                    'kota'=>$agen->kota,
                    'kelurahan'=>$agen->kelurahan,
                    'terdaftar'=>$agen->created,
                    'kategori'=>'AGEN',
                  );
            }

            if ($sppbe == TRUE) {
              return $data = array(
                'kode_usaha'=>$sppbe->kode_sppbe,
                'nama_usaha'=>$sppbe->nama_sppbe,
                'alamat'=>$sppbe->alamat_sppbe,
                'telephone'=>$sppbe->telp_sppbe,
                'kota'=>'',
                'kelurahan'=>'',
                'terdaftar'=>$sppbe->created,
                'kategori'=>'SPPBE',
              );
            }


            if ($pangkalan == TRUE) {
              return $data = array(
                'kode_usaha'=>$pangkalan->kode_pangkalan,
                'nama_usaha'=>$pangkalan->nama_pangkalan,
                'alamat'=>$pangkalan->alamat_pangkalan,
                'telephone'=>$pangkalan->no_telp,
                'kota'=>'',
                'kelurahan'=>$pangkalan->kelurahan,
                'terdaftar'=>$pangkalan->created_date,
                'kategori'=>'PANGKALAN',
              );
            }




    }


    public function menu($link,$title,$icon)
    {
        $html  = '';
        $html .= '<div class="col-lg-3">';
        $html .= '<a href="'.site_url($link).'" class="icon-link">';
        $html .= '<div align="center" class="icon-master">';
        $html .= '<img src="'.base_url().'assets/icon-scm/'.$icon.'" style="width:50px;">';
        $html .= '<h6 class="icon-title">'.$title.'</h6>';
        $html .= '</div>';
        $html .= '</a>';
        $html .= '</div>';
        return $html;
    }

    public function akun_status($tipe)
    {

        $this->SCM->load->model($this->model_aplikasi);

        if($tipe == 'pengguna')
        {
            return $this->SCM->Aplikasi_model->status_pengguna();

        }else{
            return (object) array();
        }

    }


    public function akses_group($tipe)
    {
                if($tipe == 3)
                {
                    return (object) array('2'=>'User SPPBE', '3'=>'Admin SPPBE');
                }
                else if($tipe == 4)
                {
                    return (object) array('4'=>'Admin Agen','5'=>'User Agen');
                }else if($tipe == 5)
                {
                    return (object) array('5'=>'User Agen');
                }else if($tipe == 6)
                {
                    return (object) array('6'=>'Pangkalan');
                }else if($tipe == 7)
                {
                    return (object) array('7'=>'Konsumen');
                }
    }

    function select_bulan() {
          $data = array(
            '1'=>'January',
            '2'=>'February',
            '3'=>'Maret',
            '4'=>'April',
            '5'=>'Mei',
            '6'=>'Juni',
            '7'=>'Juli',
            '8'=>'Agustus',
            '9'=>'September',
            '10'=>'Oktober',
            '11'=>'November',
            '12'=>'Desember'
          );

          return (object) $data;
    }



    function penyaluran_data($tanggal,$kode_barang,$kode_agen,$kode_pangkalan,$kondisi) {
          $this->SCM->load->model($this->model_penyaluran);
          $jumlah_penyaluran = $this->SCM->penyaluran_model->jumlah_penyaluran($tanggal,$kode_barang,$kode_agen,$kode_pangkalan,$kondisi);
          return $jumlah_penyaluran;
    }

}
