<style media="screen">
  .client-area{
    margin-bottom:20px;
  }
  .article-client-area{
    margin-top: 20px;
    margin-bottom: 30px;
    color: #DC1111;
    background: #f7f7f7;
    border-radius:10px;
    padding:30px;
    border-bottom:3px solid #dc1111
  }
  .portal-login{
    background: #FFFFFF;
    padding:10px;
  }


</style>

<div class="row">
  <div class="col-lg-12  client-area" align="center">
    <img src="<?php echo base_url('assets/icon-scm/users-groups.svg')?>" alt="" style="width:120px;">
    <br>
    <article class="article-client-area" >
      Dalam sistem ini, kami memudahkan hubungan antar konsumen dan produsen.
      Pilih portal dibawah ini jika anda belum memiliki akun silahkan pilih Register dan setelah menjadi member silahkan Login! untuk kelanjutan pemesanan produk kami. Dengan cara pilih Menu Client Area, kemudian masukkan Username dan Password pada saat Register.
    </article>
  </div>

  <div class="col-lg-offset-4 col-lg-4">
    <div class="portal-login">
      <?php include 'sign-in.php'; ?>
    </div>

    <br><br>    <br><br>    <br><br>
  </div>

  </div>
