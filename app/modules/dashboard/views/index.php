<div class="row" style="margin-top:30px;">
      <!--<div class="col-lg-offset-2 col-lg-8">

        <div class="alert alert-default" style="margin-left:30px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Title!</strong> Alert body ...
        </div>

       </div>
    </div>-->
    <div class="col-lg-offset-2 col-lg-10" >
       <div class="row" >
           <div class="col-lg-5" style="border-bottom:1px solid #DC1111;">
                <h4>DASHBOARD | MENU OPERASIONAL</h4>
           </div>

           <div class="col-lg-5" style="border-bottom:1px solid #DC1111;">
                <h4 class="pull-right"><?php echo nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')).' '.date('H:i:s'); ?></h4>
           </div>
       </div>
    </div>
    <div class="col-lg-offset-2 col-lg-9">
        <div class="row">
            <a href="<?php echo site_url('menu/masterdata');?>">
                <div class="col-lg-3" style="background:#DC1111; padding:5px; border: 1px solid #dc1111;text-align:center; border-radius:2px; margin:3px;cursor:pointer;" >
                <?php echo '<img src="'.base_url().'assets/icon-scm/master-data.svg" style="width:70px; text-align:center;">';?>
                <h5 style="text-align:center;color:#FFF; font-weight:200;">MASTER DATA</h5>
                </div>
            </a>

             <a href="<?php echo site_url('menu/management');?>">
             <div class="col-lg-3" style="background:#DC1111; padding:5px; border: 1px solid #dc1111;text-align:center; border-radius:2px; margin:3px;cursor:pointer;" >
                <?php echo '<img src="'.base_url().'assets/icon-scm/management.svg" style="width:70px; text-align:center;">';?>
                <h5 style="text-align:center;color:#FFF; font-weight:300;">MANAGEMENT</h5>
            </div>
            </a>

            <a href="<?php echo site_url('inbox');?>">
           <div class="col-lg-3" style="background:#DC1111; padding:5px; border: 1px solid #dc1111;text-align:center; border-radius:2px; margin:3px;cursor:pointer;" >
               <?php echo '<img src="'.base_url().'assets/icon-scm/report.svg" style="width:70px; text-align:center;">';?>
               <h5 style="text-align:center;color:#FFF; font-weight:200;">INBOX</h5>
           </div>
           </a>

           <a href="<?php echo site_url('menu/setting');?>">
          <div class="col-lg-3" style="background:#DC1111; padding:5px; border: 1px solid #dc1111;text-align:center; border-radius:2px; margin:3px;cursor:pointer;" >
              <?php echo '<img src="'.base_url().'assets/icon-scm/report.svg" style="width:70px; text-align:center;">';?>
              <h5 style="text-align:center;color:#FFF; font-weight:200;">MENU</h5>
          </div>
          </a>


        </div>
    </div>
</div>
