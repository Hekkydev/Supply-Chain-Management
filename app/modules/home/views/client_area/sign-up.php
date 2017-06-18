<?php if ($account == TRUE): ?>
  <script type="text/javascript">
    window.location = "<?php echo site_url('home')?>";
  </script>
<?php else: ?>

                              <div class="page-subheader text-center">
                                  <h1>Register</h1>
                                  <hr/>
                                  <p >Form pendaftar akun konsumen</p>
                                  <div id="session">

                                  </div>
                              </div>

                              <form action="<?php echo site_url('client_area/register_client')?>" method="post" id="form-register-konsumen">
                                  <input type="hidden" name="id_group" value="<?php echo $register->id_group?>">
                                  <input type="hidden" name="kode_user" value="<?php echo $register->kode_user?>">
                                  <div class="form-group">
                                      <div class="controls">
                                          <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control input" value="<?php echo $register->nama_lengkap ?>"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="controls">
                                          <input type="text" name="no_telp" placeholder="nomor handphone" class="form-control input" value="<?php echo $register->no_telp ?>"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="controls">
                                          <input type="email" name="email" placeholder="Email" class="form-control input" value="<?php echo $register->email;?>"/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="controls">
                                          <input type="text" name="username" placeholder="Username" class="form-control input" value="<?php echo $register->username;?>"/>
                                      </div>
                                  </div>


                                  <div class="form-group">
                                      <div class="controls">
                                          <input type="password" name="password" placeholder="Password" class="form-control input" value="<?php echo $register->password;?>"/>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="controls">
                                          <input type="password" name="repeat_password" placeholder="Repeat password" class="form-control input"/>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="controls">
                                          <div class="checkbox">
                                              <input name="checkbox" id="checkbox1" value="checkbox1" checked="" type="checkbox">
                                              <label for="checkbox1">
                                                  Saya menyetujui <a href="#">segala aturan dan hukum</a>.
                                              </label>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group">

                                      <button class="btn btn-block btn-primary">Sign up</button>

                                  </div>

                              </form>


  <script type="text/javascript">
    $(function(){
      $('#form-register-konsumen').submit(function() {

          $.post($('#form-register-konsumen').attr('action'),$('#form-register-konsumen').serialize(), function(json) {
          if (json.error == 1) {
              alert(json.message);
          }else{
            $("#session").html(json.message);
            setTimeout(refresh(),12000);
          }
          },'json');
          return false;
      });
    });
    function refresh()
    {
      for (var i = 0; i <= 25000; i++) {
        if (i == 20000) {
          window.location.reload();
        }
      }
    }
  </script>
<?php endif; ?>
