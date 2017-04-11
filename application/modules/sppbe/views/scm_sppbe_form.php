 <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kode Spbbe <?php echo form_error('kode_spbbe') ?></label>
            <input type="text" class="form-control" name="kode_spbbe" id="kode_spbbe" placeholder="Kode Spbbe" value="<?php echo $kode_spbbe; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Sppbe <?php echo form_error('nama_sppbe') ?></label>
            <input type="text" class="form-control" name="nama_sppbe" id="nama_sppbe" placeholder="Nama Sppbe" value="<?php echo $nama_sppbe; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat_sppbe">Alamat Sppbe <?php echo form_error('alamat_sppbe') ?></label>
            <textarea class="form-control" rows="3" name="alamat_sppbe" id="alamat_sppbe" placeholder="Alamat Sppbe"><?php echo $alamat_sppbe; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Telp Sppbe <?php echo form_error('telp_sppbe') ?></label>
            <input type="text" class="form-control" name="telp_sppbe" id="telp_sppbe" placeholder="Telp Sppbe" value="<?php echo $telp_sppbe; ?>" />
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
	    <input type="hidden" name="id_spbbe" value="<?php echo $id_spbbe; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sppbe') ?>" class="btn btn-default">Cancel</a>
	</form>