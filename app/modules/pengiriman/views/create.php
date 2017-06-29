<div class="">
    <form class="form-horizontal" action="<?php echo $action; ?>" method="post">
      <legend>Form Pengiriman LPG</legend>
        <div class="form-group">
            <label class="control-label col-lg-3">SPPBE</label>
            <div class="col-lg-7">
                <input type="hidden" name="kode_sppbe" value="<?php echo $kode_sppbe;?>">
                <input type="text" class="form-control" value="<?php echo $nama_usaha;?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">Plant No</label>
            <div class="col-lg-7">
                <input type="text" class="form-control" name="plant">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">Agen</label>
            <div class="col-lg-7">
              <select class="form-control" name="kode_agen">
                <?php foreach ($agen as $a): ?>
                  <option value="<?php echo $a->kode_agen ?>"><?php echo '('.$a->kode_agen.') '.$a->nama_agen ?></option>
                <?php endforeach; ?>
              </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">Tanggal Pengiriman</label>
            <div class="col-lg-7">
                <input type="date" name="tanggal_pengiriman" class="form-control" id="tanggal-pengiriman" value="<?php echo $tanggal_pengiriman?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">No. LO</label>
            <div class="col-lg-7">
                <input type="text" class="form-control" name="no_lo">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">Jumlah Qty(Pcs)</label>
            <div class="col-lg-7">
                <input type="text" class="form-control" name="qty_pcs">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">Jumlah Qty(Kg)</label>
            <div class="col-lg-7">
                <input type="text" class="form-control" name="qty_kg">
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label class="control-label col-lg-3"></label>
            <div class="col-lg-7">
                <button type="submit" class="btn btn-warning btn-flat">SIMPAN</button>
                <button type="reset" class="btn btn-flat btn-border">RESET</button>
            </div>
        </div>
    </form>
</div>
