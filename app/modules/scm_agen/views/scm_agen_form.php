<form class="" action="<?php echo $action ?>" method="post">

<div class="row">
  <div class="col-lg-6">


    	    <div class="form-group">
                  <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
            </div>
    	    <div class="form-group">
                <label for="varchar">Kode Agen <?php echo form_error('kode_agen') ?></label>
                <input type="text" class="form-control" name="kode_agen" id="kode_agen" placeholder="Kode Agen" value="<?php echo $kode_agen; ?>" readonly="" />
            </div>
    	    <div class="form-group">
                <label for="varchar">Nama Agen <?php echo form_error('nama_agen') ?></label>
                <input type="text" class="form-control" name="nama_agen" id="nama_agen" placeholder="Nama Agen" value="<?php echo $nama_agen; ?>" />
            </div>
    	    <div class="form-group">
                <label for="int">No Telp Agen <?php echo form_error('no_telp_agen') ?></label>
                <input type="text" class="form-control" name="no_telp_agen" id="no_telp_agen" placeholder="No Telp Agen" value="<?php echo $no_telp_agen; ?>" />
            </div>
    	    <div class="form-group">
                <label for="alamat_agen">Alamat Agen <?php echo form_error('alamat_agen') ?></label>
                <textarea class="form-control" rows="3" name="alamat_agen" id="alamat_agen" placeholder="Alamat Agen"><?php echo $alamat_agen; ?></textarea>
            </div>

    	    <input type="hidden" name="id_agen" value="<?php echo $id_agen; ?>" />
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    	    <a href="<?php echo site_url('scm_agen') ?>" class="btn btn-default">Cancel</a>


  </div>
  <div class="col-lg-6">
    <div class="form-group"></div>
    <div class="form-group">
          <label for="varchar">Kota <?php echo form_error('kota') ?></label>
          <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
      </div>
    <div class="form-group">
          <label for="varchar">Kelurahan <?php echo form_error('kelurahan') ?></label>
          <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" />
      </div>
    <div class="form-group">
          <input type="hidden" class="form-control" name="created" id="created" placeholder="Created" value="<?php echo $created; ?>" />
      </div>
  </div>
</div>
	</form>
