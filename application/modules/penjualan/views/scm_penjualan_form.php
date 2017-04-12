<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Scm_penjualan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kode Penjualan <?php echo form_error('kode_penjualan') ?></label>
            <input type="text" class="form-control" name="kode_penjualan" id="kode_penjualan" placeholder="Kode Penjualan" value="<?php echo $kode_penjualan; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Penjualan <?php echo form_error('tanggal_penjualan') ?></label>
            <input type="text" class="form-control" name="tanggal_penjualan" id="tanggal_penjualan" placeholder="Tanggal Penjualan" value="<?php echo $tanggal_penjualan; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Created <?php echo form_error('created') ?></label>
            <input type="text" class="form-control" name="created" id="created" placeholder="Created" value="<?php echo $created; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Modified <?php echo form_error('modified') ?></label>
            <input type="text" class="form-control" name="modified" id="modified" placeholder="Modified" value="<?php echo $modified; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Deleted <?php echo form_error('deleted') ?></label>
            <input type="text" class="form-control" name="deleted" id="deleted" placeholder="Deleted" value="<?php echo $deleted; ?>" />
        </div>
	    <input type="hidden" name="id_penjualan" value="<?php echo $id_penjualan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penjualan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>