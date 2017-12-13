
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $app_title ?></title>
        <meta content='width=device-width, initial-scale=1' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/skins/_all-skins.css') ?>" rel="stylesheet" type="text/css" />

       <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/Elpiji.png') ?>">
       <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/icon-scm/icons-scm.css');?>">
       <script src="<?php echo base_url()?>assets/firebug-lite/build/firebug-lite.js" charset="utf-8"></script>
       <script src="<?php echo base_url()?>assets/js/jquery.min.js" charset="utf-8"></script>
        <?php echo isset($style) ? $style : ''; ?>
       <style media="screen">
         .table {
           font-size: 12px;
         }
       </style>
