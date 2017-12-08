<div class="login-logo">
    <a href="#">
      <img src="<?php echo site_url('assets/AdminLTE-2.0.5/dist/img/logo.png')?>" style="width:100px;">
    </a>
</div><!-- /.login-logo -->
<div class="login-box-body ">
    <div align="center">
        <div class="loading"></div>
    </div>
    <p class="login-box-msg" style="margin:10px;">Access Management System</p>
    <form  method="post" id="login-form" autocomplete="off">
        <div class="form-group has-feedback ">
            <span id="error_username"></span>
            <input type="text" class="form-control form-pertamina" placeholder="Username" id="username"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control form-pertamina" placeholder="Password" id="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <button type="button" class="btn btn-primary btn-block btn-flat"  onClick="return login();">LOGIN</button>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <button type="button" class="btn btn-danger btn-block btn-flat"  onClick="return front_site();">FRONT SITE</button>
          </div><!-- /.col -->
        </div>
    </form>

    <!-- <a href="#">I forgot my password</a><br> -->

</div><!-- /.login-box-body -->
