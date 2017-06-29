<div class="form-searh">
  <form class="form-horizontal" action="<?php echo $action ?>" method="post">
    <legend>Form Rekapitulasi Pengiriman LPG</legend>
    <div class="form-group">
      <label class="control-label col-lg-3">SPPBE</label>
      <div class="col-lg-5">
        <input type="hidden" name="kode_sppbe" value="<?php echo $kode_sppbe;?>">
        <input type="text" class="form-control" value="<?php echo $nama_usaha;?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-3">NAMA AGEN</label>
      <div class="col-lg-5">
        <select class="form-control" name="kode_agen">
          <?php foreach ($agen as $a): ?>
            <option value="<?php echo $a->kode_agen ?>"><?php echo '('.$a->kode_agen.') '.$a->nama_agen ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-3">TGL.PENGIRIMAN</label>
        <div class="col-lg-5">
            <input type="date" name="tanggal_pengiriman" class="form-control" id="tanggal-pengiriman" value="<?php echo $tanggal_pengiriman?>">
        </div>
    </div>
    <hr>
    <div class="form-group">
        <label class="control-label col-lg-3"></label>
        <div class="col-lg-7">
            <button type="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i> SEARCH</button>
            <button type="reset" class="btn btn-flat btn-border">RESET</button>
        </div>
    </div>
  </form>
</div>
