<div class="row">
  <div class="col-lg-6">
    <form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
          <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Kode Sppbe <?php echo form_error('kode_sppbe') ?></label>
        <input type="text" class="form-control" name="kode_sppbe" id="kode_sppbe" placeholder="Kode Sppbe" value="<?php echo $kode_sppbe; ?>" readonly="" />
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
          <input type="hidden" class="form-control" name="created" id="created" placeholder="Created" value="<?php echo $created; ?>" />
    </div>

    <input type="hidden" name="id_spbbe" value="<?php echo $id_spbbe; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('sppbe') ?>" class="btn btn-default">Cancel</a>
    </form>

  </div>
</div>
