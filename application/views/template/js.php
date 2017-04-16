</div><!-- /.content-wrapper -->



<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/slimScroll/jquery.slimScroll.min.js') ?>" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url('assets/AdminLTE-2.0.5/plugins/fastclick/fastclick.min.js') ?>'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/app.min.js') ?>" type="text/javascript"></script>

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
<?php endif;?>
