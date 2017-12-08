<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_area extends MY_Controller{

  public function __construct()
  {
      parent::__construct();

  }

  function index()
  {
      $this->account = $this->authentikasi_client();
      $this->data['account'] = $this->account;
      $this->title_page("Client Area");
      $this->load_theme_frontend_large('home/client_area/index',$this->data);
  }

  function aktivasi()
  {
    error_reporting(0);
        $id = $_GET['id'];
        if ($id == TRUE) {


          $this->load->database();
          $cek = $this->db->get_where('users', ['password'=>$id])->first_row();

          if ($cek == TRUE) {
              $data = [
                  'id_status'=>6
              ];
              $update = $this->db->where('password',$id)->update('users', $data);
              if ($update == TRUE) {
                $this->title_page("Client Area Register");
                $this->load_theme_frontend_large('home/client_area/activated',$data);
              }else {
                echo 'tidak ada akun';
              }
          }else {
            echo 'tidak ada akun';
          }

        }else {
          show_404();
        }
  }



  public function register()
  {
    $this->account = $this->authentikasi_client();
    $this->data['account'] = $this->account;
    $this->data['register'] = $this->register_value();
    $this->title_page("Client Area Register");
    $this->load_theme_frontend_large('home/client_area/register',$this->data);
  }
  function register_value()
  {
    $this->data['register'] = (object) array(
        'id_group' =>7,
        'kode_user' => $this->scm_library->kode_user(),
        'nama_lengkap' =>'',
        'no_telp' =>'',
        'email'=>'',
        'username' =>'',
        'password' =>''
       );
    return $this->data['register'];
  }
  public function register_client()
  {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'Nomor Hanphone', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->input->post('password') == $this->input->post('repeat_password')) {
          if ($this->form_validation->run() === FALSE) {
            echo json_encode(array('error'=>1,'message'=>'Lengkapi data registrasi!'));
          }else{


            $data = array(
            'id_group' => $this->input->post('id_group'),
            'id_status'=>7,
            'kode_user' => $this->input->post('kode_user'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'created' =>$this->date_now(),
           );

            $message = $this->load->view('email/registrasi',$data,TRUE);
            $this->sendingmail($message);
            $this->sendingmailcustomer($data);

           $simpan = $this->registrasi_konsumen_my_controller($data);
           echo json_encode(array('error'=>0,'message'=>'<div class="alert alert-info">Berhasil melakukan registrasi!</div>'));

          }
        }else{
            echo json_encode(array('error'=>1,'message'=>'Password tidak sama!'));
        }


  }

  public function sendingmail($message)
  {
        $dataMail  = $message;
        $email = 'customerservice@scm-mgp.com';
        $fromEmail = 'registrasi@scm-mgp.com';
        $textEmail = $dataMail;
        $mail = new PHPMailer();
        $mail->IsHTML(true);    // set email format to HTML
        $mail->IsSMTP();   // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "mail.scm-mgp.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = $fromEmail;  // alamat email kamu
        $mail->Password   = "anisa123";            // password GMail
        $mail->SetFrom('registrasi@scm-mgp.com','New Client');  //Siapa yg mengirim email
       //  $mail->SetBcc('customerservice@yutakaglobal.com','noreply');
        $mail->Subject    = "Pendaftaran Client";
        $mail->Body       = $textEmail;
        $toEmail          = $email; // siapa yg menerima email ini
        $mail->AddAddress($toEmail);


        if(!$mail->Send()) {
             return FALSE;
        } else {
             return TRUE;
        }
  }


  public function sendingmailcustomer($params)
  {
        $dataMail  = $this->load->view('email/registrasi_aktivasi',$params,TRUE);
        $email = $params['email'];
        $fromEmail = 'registrasi@scm-mgp.com';
        $textEmail = $dataMail;
        $mail = new PHPMailer();
        $mail->IsHTML(true);    // set email format to HTML
        $mail->IsSMTP();   // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "mail.scm-mgp.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = $fromEmail;  // alamat email kamu
        $mail->Password   = "anisa123";            // password GMail
        $mail->SetFrom('registrasi@scm-mgp.com','PT.MGP - Supply Chain Management');  //Siapa yg mengirim email
       //  $mail->SetBcc('customerservice@yutakaglobal.com','noreply');
        $mail->Subject    = "Aktivasi akun anda sekarang !";
        $mail->Body       = $textEmail;
        $toEmail          = $email; // siapa yg menerima email ini
        $mail->AddAddress($toEmail);


        if(!$mail->Send()) {
             return FALSE;
        } else {
             return TRUE;
        }
  }
}
