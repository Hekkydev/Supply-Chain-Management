<?php
defined("BASEPATH") or exit("Jangan Sembarangan Hacking");

/**
 * SCM Library by Hekky Nurhikmat
 *  general library untuk aplikasi supply chain management
 *
 */
class SCM_library
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
        $this->model_pangkalan = '../modules/scm_pangkalan/modles/scm_pangkalan_model';
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
        $result = $this->SCM->scm_pangkalan_model->generate_auto_kode();
        return $result;
    }


    public function menu($link,$title,$icon)
    {
        $html  = '';
        $html .= '<div class="col-lg-3">';
        $html .= '<a href="'.site_url($link).'" class="icon-link">';
        $html .= '<div align="center" class="icon-master">';
        $html .= '<img src="'.base_url().'assets/icon-scm/'.$icon.'" style="width:50px;">';
        $html .= '<h6 class="icon-title">'.$title.'</h6>';
        $html .= '</div></a></div>';
        return $html;
    }




}
