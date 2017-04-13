<?php
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header" style="margin-bottom:20px;">
    <h1 style="padding-left:10px;">
        <?php echo strtoupper($title_page);?>
    </h1>
    <?php if($title_page == TRUE):?>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo ucfirst($title_page)?></li>
    </ol>
    <?php endif;?>
</section>

<!-- Main content -->
<section class="content">

   <?php echo $content;?>

</section><!-- /.content -->

<?php
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template/foot');
?>
