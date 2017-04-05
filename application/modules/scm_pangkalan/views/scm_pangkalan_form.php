<h2 style="margin-top:0px">Scm_pangkalan <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">
<div class="form-group">
    <label for="int">Id User <?php echo form_error('id_user') ?></label>
    <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Kode Pangkalan <?php echo form_error('kode_pangkalan') ?></label>
    <input type="text" class="form-control" name="kode_pangkalan" id="kode_pangkalan" placeholder="Kode Pangkalan" value="<?php echo $kode_pangkalan; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Kode Agen <?php echo form_error('kode_agen') ?></label>
    <input type="text" class="form-control" name="kode_agen" id="kode_agen" placeholder="Kode Agen" value="<?php echo $kode_agen; ?>" />
</div>
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
<div class="form-group">
    <label for="datetime">Created Date <?php echo form_error('created_date') ?></label>
    <input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo $created_date; ?>" />
</div>
<div class="form-group">
    <label for="datetime">Deleted Date <?php echo form_error('deleted_date') ?></label>
    <input type="text" class="form-control" name="deleted_date" id="deleted_date" placeholder="Deleted Date" value="<?php echo $deleted_date; ?>" />
</div>
<input type="hidden" name="id_pangkalan" value="<?php echo $id_pangkalan; ?>" />
<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
<a href="<?php echo site_url('scm_pangkalan') ?>" class="btn btn-default">Cancel</a>
</form>
