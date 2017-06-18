<?php if ($account == TRUE): ?>
  <script type="text/javascript">
    window.location = "<?php echo site_url('home')?>";
  </script>
<?php else: ?>
  <div class="page-subheader text-center">
      <h1>Sign in</h1>
      <hr/>
      <p>Silahkan sign untuk memasuki client area</p>
  </div>

  <form id="form-client-login" name="form-client-login" action="<?php echo site_url('auth/autorization_client')?>" method="post">

      <div class="form-group">
          <div class="controls">
              <input type="text" placeholder="Username" class="form-control input" name="username"/>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">
              <input type="password" placeholder="Password" class="form-control input" name="password"/>
          </div>
      </div>

      <div class="form-group">
          <div class="controls">

          </div>
      </div>

      <div class="form-group">

          <button class="btn btn-primary" type="submit">Login</button>
          <a href="<?php echo site_url('client_area/register')?>" class="btn btn-primary pull-right">Register</a>

      </div>


  </form>


<script type="text/javascript">
$(function() {
$('#form-client-login').submit(function() {
$.post($('#form-client-login').attr('action'), $('#form-client-login').serialize(), function(json) {
  if (json.status == 0) {
    alert(json.message);
  }else{
    window.location = "<?php echo site_url()?>"+json.url;
  }
},'json');
return false;
});
});
</script>

<?php endif; ?>
