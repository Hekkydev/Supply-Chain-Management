
<link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE-2.0.5/plugins/datepicker/datepicker3.css')?>">
<div class="row">
    <div class="col-lg-6">
      <legend>FORM REALISASI</legend>
        <form id="form-penyaluran" class="form-horizontal" action="<?php echo site_url('penyaluran/add_realisasi_proses')?>" method="post">
            <div class="form-group">
                    <label class="control-label col-lg-4 small">KODE REALISASI</label>
                    <div class="col-lg-8">
                        <input type="text" name="kode_penyaluran" value="<?php echo $kode_penyaluran?>" class="form-control">
                    </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-lg-4 small">TANGGAL REALISASI</label>
                    <div class="col-lg-8">
                        <input id="tanggal_penyaluran" type="text" name="tanggal_penyaluran" value="<?php echo $tanggal_penyaluran?>" class="form-control">
                    </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-4 small">KODE PANGKALAN</label>
              <div class="col-lg-8">
                <select class="form-control" name="kode_pangkalan">
                  <?php foreach ($pangkalan as $p): ?>
                      <option value="<?php echo $p->kode_pangkalan?>"><?php echo $p->nama_pangkalan; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-4 small">KODE BARANG</label>
              <div class="col-lg-8">
                <select class="form-control" name="kode_barang">
                  <?php foreach ($barang as $p): ?>
                      <option value="<?php echo $p->kode_barang?>"><?php echo $p->nama_barang; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-lg-4 small">JUMLAH REALISASI PENYALURAN</label>
                    <div class="col-lg-8">
                        <input type="text" name="jumlah_penyaluran"  class="form-control">
                    </div>
            </div>

            <?php if ($this->account_posisition->kode_usaha == FALSE): ?>
                    <div class="form-group">
                          <label class="control-label col-lg-4 small">AGEN</label>
                          <div class="col-lg-8">
                            <select class="form-control" name="kode_agen">
                              <?php foreach ($agen as $agen): ?>
                                <option value="<?php echo $agen->kode_agen; ?>"><?php echo $agen->nama_agen; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                    </div>

                <?php else: ?>
                  <input type="hidden" name="kode_agen" value="<?php echo $this->account_posisition->kode_usaha?>">
            <?php endif; ?>
            <input type="hidden" name="id_penyaluran_kondisi" value="<?php echo $id_penyaluran_kondisi; ?>">

            <div class="form-group">
                    <label class="control-label col-lg-4 small"><br></label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-sm btn-primary btn-flat">SIMPAN</button>
                        <a class="btn btn-sm btn-default btn-flat">KEMBALI</a>
                         
                    </div>
            </div>
        </form>
    </div>
</div>


<script src="<?php echo site_url('assets/jquery/external/jquery/jquery.js')?>" charset="utf-8"></script>
<script type="text/javascript">
$(function(){
  $('#form-penyaluran').submit(function(){
    $.post($('#form-penyaluran').attr('action'), $('#form-penyaluran').serialize(), function(json) {
      if (json.error == 0) {
        alert(json.message);
        window.location.reload();
      }
    },'json');
    return false;
  });
});

 
</script>
