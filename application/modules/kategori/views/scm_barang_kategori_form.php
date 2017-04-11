<div class="row">
    <div class="col-lg-4">
     <form action="<?php echo $action; ?>" method="post">
       <div class="form-group">
            <label for="varchar">Kode Kategori <?php echo form_error('kode_kategori') ?></label>
            <input type="text" class="form-control" name="kode_kategori" id="kode_kategori" value="<?php echo $kode_kategori; ?>" readonly="readonly" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kategori <?php echo form_error('nama_kategori') ?></label>
            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori" value="<?php echo $nama_kategori; ?>" />
        </div>
	    <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kategori') ?>" class="btn btn-default">Cancel</a>
	</form>
</div>
</div>