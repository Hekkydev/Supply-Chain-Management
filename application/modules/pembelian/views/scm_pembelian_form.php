<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kode Pembelian <?php echo form_error('kode_pembelian') ?></label>
            <input type="text" class="form-control" name="kode_pembelian" id="kode_pembelian" placeholder="Kode Pembelian" value="<?php echo $kode_pembelian; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Pembelian <?php echo form_error('tanggal_pembelian') ?></label>
            <input type="text" class="form-control" name="tanggal_pembelian" id="tanggal_pembelian" placeholder="Tanggal Pembelian" value="<?php echo $tanggal_pembelian; ?>" />
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
	    <input type="hidden" name="id_pembelian" value="<?php echo $id_pembelian; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pembelian') ?>" class="btn btn-default">Cancel</a>
	</form>