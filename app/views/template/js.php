</div><!-- /.content-wrapper -->



<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQueryUI/jquery-ui-1.10.3.js') ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/slimScroll/jquery.slimScroll.min.js') ?>" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url('assets/AdminLTE-2.0.5/plugins/fastclick/fastclick.min.js') ?>'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/app.js') ?>" type="text/javascript"></script>
<?php echo isset($script) ? $script : ''; ?>
<!-- jQuery 2.1.3 -->
<?php if($this->uri->segment(1) == "home"):?>
<script>
    $(document).ready(function(){
        $('body').addClass('sidebar-collapse');
         $('a#toggle').removeAttr('data-toggle');
         $('a#toggle').removeAttr('class');
    });
</script>
<?php elseif($this->uri->segment(1) == "administrator"):?>
<script>
    $(document).ready(function(){
        $('body').addClass('sidebar-collapse');
         $('a#toggle').removeAttr('data-toggle');
         $('a#toggle').removeAttr('class');
    });
</script>
<?php elseif($this->uri->segment(1) == "about_page"):?>
<script>
    $(document).ready(function(){
        $('body').addClass('sidebar-collapse');
         $('a#toggle').removeAttr('data-toggle');
         $('a#toggle').removeAttr('class');
    });
</script>
<?php endif;?>

<!-- Bootstrap WYSIHTML5 -->
<?php if($this->uri->segment(1) == "about_page"):?>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
$(function () {
  $(".textarea").wysihtml5();
});
</script>
<?php endif;?>
<?php if ($this->uri->segment(2) == 'add_realisasi'): ?>
  <script src="<?php echo site_url('assets/AdminLTE-2.0.5/plugins/datepicker/bootstrap-datepicker.js')?>" charset="utf-8"></script>
  <script type="text/javascript">
    $(function(){
        $('#tanggal_penyaluran').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    });
  </script>
<?php endif; ?>
