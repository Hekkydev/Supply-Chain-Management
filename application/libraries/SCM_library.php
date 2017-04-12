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

    }


    public function kode_kategori()
    {
        $this->SCM->load->model($this->model_kategori);
        $result = $this->SCM->kategori_model->generate_auto_kode();
        return $result;
    }

    public function kode_user()
    {
        $this->SCM->load->model($this->model_user);
        $result = $this->SCM->Users_model->generate_auto_kode();
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
