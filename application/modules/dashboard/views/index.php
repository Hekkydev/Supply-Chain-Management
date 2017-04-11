<div class="row" style="margin-top:30px;">
    <div class="col-lg-offset-2 col-lg-10" >
       <div class="row" >
           <div class="col-lg-5" style="border-bottom:1px solid #DC1111;">
                <h4>DASHBOARD | MENU OPERASIONAL</h4>       
           </div>
           
           <div class="col-lg-5" style="border-bottom:1px solid #DC1111;">
                <h4 class="pull-right"><?php echo tgl_indo(date('Y-m-d')).' '.date('H:i:s'); ?></h4>       
           </div>
       </div>
    </div>    
    <div class="col-lg-offset-2 col-lg-9">
        <div class="row">
            <a href="<?php echo site_url('menu/masterdata');?>">
                <div class="col-lg-2" style="background:#DC1111; padding:10px; border: 1px solid #dc1111;text-align:center; border-radius:2px; margin:10px;cursor:pointer;" >
                <?php echo '<img src="'.base_url().'assets/icon-scm/master-data.svg" style="width:70px; text-align:center;">';?>
                <h5 style="text-align:center;color:#FFF; font-weight:200;">MASTER DATA</h5>
                </div>
            </a>
             <a href="<?php echo site_url('menu/laporan');?>">
            <div class="col-lg-2" style="background:#DC1111; padding:10px; border: 1px solid #dc1111;text-align:center; border-radius:2px; margin:10px;cursor:pointer;" >
                <?php echo '<img src="'.base_url().'assets/icon-scm/report.svg" style="width:70px; text-align:center;">';?>
                <h5 style="text-align:center;color:#FFF; font-weight:200;">LAPORAN</h5>
            </div>
            </a>
             <a href="<?php echo site_url('menu/penyaluran');?>">
            <div class="col-lg-2" style="background:#DC1111; padding:10px; border: 1px solid #dc1111;text-align:center; border-radius:2px; margin:10px;cursor:pointer;" >
                <?php echo '<img src="'.base_url().'assets/icon-scm/flow.svg" style="width:70px; text-align:center;">';?>
                <h5 style="text-align:center;color:#FFF; font-weight:300;">PENYALURAN</h5>
            </div>
            </a>
             <a href="<?php echo site_url('menu/transaksi');?>">
            <div class="col-lg-2" style="background:#DC1111; padding:10px; border: 1px solid #dc1111;text-align:center; border-radius:2px; margin:10px;cursor:pointer;" >
                <?php echo '<img src="'.base_url().'assets/icon-scm/transaksi.svg" style="width:70px; text-align:center;">';?>
                <h5 style="text-align:center;color:#FFF; font-weight:300;">TRANSAKSI</h5>
            </div>
            </a>
             <a href="">
             <div class="col-lg-2" style="background:#DC1111; padding:10px; border: 1px solid #dc1111;text-align:center; border-radius:2px; margin:10px;cursor:pointer;" >
                <?php echo '<img src="'.base_url().'assets/icon-scm/management.svg" style="width:70px; text-align:center;">';?>
                <h5 style="text-align:center;color:#FFF; font-weight:300;">MANAGEMENT</h5>
            </div>
            </a>
            
        </div>
    </div>
</div>