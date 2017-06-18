<form action="<?php echo $action; ?>" method="post">
<div class="form-group">
    <label for="varchar">Tipe Satuan <?php echo form_error('tipe_satuan') ?></label>
    <input type="text" class="form-control" name="tipe_satuan" id="tipe_satuan" placeholder="Tipe Satuan" value="<?php echo $tipe_satuan; ?>" />
</div>
<input type="hidden" name="id_satuan" value="<?php echo $id_satuan; ?>" />
<button type="submit" class="btn btn-primary btn-flat"><?php echo $button ?></button>
<a href="<?php echo site_url('scm_barang_satuan') ?>" class="btn btn-default">Cancel</a>
</form>
