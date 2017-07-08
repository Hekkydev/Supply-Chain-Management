<div class="row">
  <div class="col-lg-4">

    <form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Kode Sub Penyalur / Pangkalan <?php echo form_error('kode_pangkalan') ?></label>
        <input type="text" class="form-control" name="kode_pangkalan" id="kode_pangkalan" placeholder="Kode Pangkalan" value="<?php echo $kode_pangkalan; ?>" />
    </div>
    <?php if ($account->id_group == 1 || $account->id_group == 6): ?>
        <div class="form-group">
          <label for="">Pilih Agen</label>
          <select class="form-control" name="kode_agen">
            <?php foreach ($agen as $a): ?>
              <option value="<?php echo $a->kode_agen?>"><?php echo $a->nama_agen ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      <?php else: ?>
        <div class="form-group">
            <label for="varchar">Kode Agen <?php echo form_error('kode_agen') ?></label>
            <input type="text" name="nama_agen" value="<?php echo $nama_agen?>" class="form-control" readonly="">
            <input type="hidden" class="form-control" name="kode_agen" id="kode_agen" placeholder="Kode Agen" value="<?php echo $kode_agen; ?>" />
        </div>
    <?php endif; ?>
    <div class="form-group">
        <label for="varchar">Nama Pangkalan <?php echo form_error('nama_pangkalan') ?></label>
        <input type="text" class="form-control" name="nama_pangkalan" id="nama_pangkalan" placeholder="Nama Pangkalan" value="<?php echo $nama_pangkalan; ?>" />
    </div>
    <div class="form-group">
        <label for="alamat_pangkalan">Alamat Pangkalan <?php echo form_error('alamat_pangkalan') ?></label>
        <textarea class="form-control" rows="3" name="alamat_pangkalan" id="alamat_pangkalan" placeholder="Alamat Pangkalan"><?php echo $alamat_pangkalan; ?></textarea>
    </div>
    <div class="form-group">
        <label for="varchar">Kelurahan <?php echo form_error('kelurahan') ?></label>
        <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" />
    </div>
    <div class="form-group">
        <label for="int">No Telp <?php echo form_error('no_telp') ?></label>
        <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" />
    </div>
    <input type="hidden" name="id_pangkalan" value="<?php echo $id_pangkalan; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('scm_pangkalan') ?>" class="btn btn-default">Cancel</a>
    </form>

  </div>
</div>
