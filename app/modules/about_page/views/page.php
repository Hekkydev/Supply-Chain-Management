<div class="row">
  <div class="col-lg-12">
    <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.0.5/')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <form id="form-about" action="<?php echo site_url('about_page/about_update')?>" method="post">
  <textarea name="about" class="textarea" placeholder=".." style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $about ?></textarea>
  <button type="submit" name="button" class="btn btn-md bg-primary">SIMPAN</button>
  <a href="<?php echo site_url('home')?>" class="btn btn-md bg-red">KEMBALI</a>
  </form>

  <script type="text/javascript">
    $(function(){
      $('#form-about').submit(function() {
        $.post(  $('#form-about').attr('action'),   $('#form-about').serialize(), function(json) {
          if (json.error == 0) {
            alert(json.message);
            window.location.reload();
          }
        },'json');
        return false;
      });
    });
  </script>

  </div>
</div>
