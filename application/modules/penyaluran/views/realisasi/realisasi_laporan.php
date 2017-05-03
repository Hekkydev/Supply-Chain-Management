<div class="row">
  <div class="col-lg-3">
      <form method="post" id="form_realisasi">
            <div class="form-group">
              <label for="">Bulan</label>
                <select class="form-control" name="bulan">
                  <?php foreach ($bulan as $key => $val): ?>
                      <option value="<?php echo $key?>"><?php echo $val ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
              <label for="">Tahun</label>
                <select class="form-control" name="tahun">
                      <?php for($i = 1990 ; $i <= date('Y'); $i++): ?>
                        <option value="<?php echo $i;?>"><?php echo $i ?></option>
                      <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
              <label for="">SP AGEN</label>
                <?php if ($account->id_group == 1): ?>
                  <select class="form-control" name="kode_agen">
                      <?php foreach ($agen as $var): ?>
                          <option value="<?php echo $var->kode_agen; ?>"><?php echo $var->kode_agen.' - '.$var->nama_agen ?></option>
                      <?php endforeach; ?>
                  </select>
                <?php else: ?>
                  <input type="text" name="kode_agen" value="<?php echo $informasi->nama_usaha?>" class="form-control" readonly="">
                <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="">SUB PENYALUR / PANGKALAN</label>
              <select class="form-control" name="kode_pangkalan">
                  <?php foreach ($pangkalan as $v): ?>
                      <option value="<?php echo $v->kode_pangkalan ?>"><?php echo $v->nama_pangkalan ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
                <label for="">BARANG</label>
                <select class="form-control" name="kode_barang">
                      <?php foreach ($barang as $val): ?>
                          <option value="<?php echo $val->kode_barang?>"><?php echo $val->nama_barang ?></option>
                      <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
              <button type="submit">LIHAT LAPORAN REALISASI</button>
            </div>
      </form>
  </div>
  <div class="col-lg-1">

  </div>
  <?php if ($informasi->nama_usaha == TRUE): ?>
    <div class="col-lg-8">
      <h4>INFORMASI AGEN</h4>
      <table class="table">
        <thead>
          <tr>
            <th>NAMA AGEN</th>
            <th>:</th>
            <th><?php echo $informasi->nama_usaha; ?></th>
          </tr>
          <tr>
            <th>ALAMAT AGEN</th>
            <th>:</th>
            <th><?php echo $informasi->alamat; ?></th>
          </tr>
          <tr>
            <th>EMAIl</th>
            <th>:</th>
            <th></th>
          </tr>
          <tr>
            <th>KONTAK</th>
            <th>:</th>
            <th><?php echo $informasi->telephone; ?></th>
          </tr>
          <tr>
            <th>KOTA</th>
            <th>:</th>
            <th><?php echo $informasi->kota; ?></th>
          </tr>
        </thead>
      </table>
    </div>
  <?php endif; ?>
</div>
<div class="row">
  <div class="col-lg-12">
    <button  class="sidebar-toggle btn btn-sm btn-primary" data-toggle="offcanvas" role="button" id="toggle" name="button"><i class="fa fa-chevron-left"></i>   Toggle</button>
    <hr>
  </div>
</div>
<div id="data-realisasi"></div>
<script src="<?php echo site_url('assets/jquery/external/jquery/jquery.js')?>"></script>
<script type="text/javascript">
$(function(){
  $('#form_realisasi').submit(function() {
      $.ajax({
        url: '<?php echo site_url('penyaluran/penyaluran/cari_data_laporan_realisasi')?>',
        type: 'POST',
        data: $('#form_realisasi').serialize(),
        success:function(html)
        {
          $('#data-realisasi').html(html);
        }
      });
    return false;
  });
});
</script>
