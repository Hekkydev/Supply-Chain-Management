<div class="row">
  <div class="col-lg-3">
      <form method="post" id="form_rencana">
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
                      <?php for($i = 2015 ; $i <= date('Y'); $i++): ?>
                        <option value="<?php echo $i;?>"><?php echo $i ?></option>
                      <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
              <label for="">SP AGEN</label>
                <?php if ($account->id_group == 1 || $account->id_group == 6): ?>
                  <select class="form-control" name="kode_agen">
                      <?php foreach ($agen as $var): ?>
                          <option value="<?php echo $var->kode_agen; ?>"><?php echo $var->kode_agen.' - '.$var->nama_agen ?></option>
                      <?php endforeach; ?>
                  </select>
                <?php else: ?>
                  <input type="text"  value="<?php echo $informasi->nama_usaha?>" class="form-control" readonly="">
                  <input type="hidden" name="kode_agen" value="<?php echo $informasi->kode_usaha?>" class="form-control" readonly="">
                <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="">SUB PENYALUR / PANGKALAN</label>
              <select class="form-control" name="kode_pangkalan">
                      <option value="">Semua Pangkalan</option>
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
              <button type="submit" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-search"></i> LIHAT LAPORAN RENCANA</button>
              <a style="cursor:pointer" class="btn btn-xs btn-default btn-flat" onclick="window.location.reload();"><i class="fa fa-reload"></i>REFRESH</a>
            </div>
      </form>
  </div>
  <div class="col-lg-1">

  </div>
  <?php if ($informasi->nama_usaha == TRUE): ?>
    <div class="col-lg-8">
      <h4>INFORMASI AGEN</h4>
      <table class="table" >
        <thead>
          <tr>
            <th style="text-align:left;">NAMA AGEN</th>
            <th>:</th>
            <th style="text-align:left;"><?php echo $informasi->nama_usaha; ?></th>
          </tr>
          <tr>
            <th style="text-align:left;">ALAMAT AGEN</th>
            <th>:</th>
            <th style="text-align:left;"><?php echo $informasi->alamat; ?></th>
          </tr>
          <tr>
            <th style="text-align:left;">EMAIl</th>
            <th>:</th>
            <th style="text-align:left;"></th>
          </tr>
          <tr>
            <th style="text-align:left;">KONTAK</th>
            <th>:</th>
            <th style="text-align:left;"><?php echo $informasi->telephone; ?></th>
          </tr>
          <tr>
            <th style="text-align:left;">KOTA</th>
            <th>:</th>
            <th style="text-align:left;"><?php echo $informasi->kota; ?></th>
          </tr>
        </thead>
      </table>
    </div>
  <?php endif; ?>
</div>
<div id="data-rencana"></div>
<div id="data-rencana-pdf"></div>
<script src="<?php echo site_url('assets/jquery/external/jquery/jquery.js')?>"></script>
<script type="text/javascript">
$(function(){
  $('#form_rencana').submit(function() {
      $.ajax({
        url: '<?php echo site_url('penyaluran/penyaluran/cari_data_laporan_rencana')?>',
        type: 'POST',
        data: $('#form_rencana').serialize(),
        success:function(html)
        {
          $('#data-rencana').html(html);
        }
      }).done(function(){
          $('body').addClass('sidebar-collapse');
          $('a#toggle').removeAttr('data-toggle');
          $('a#toggle').removeAttr('class');
      });
    return false;
  });
});

 function pdf()
  {
    $.ajax({
        url: '<?php echo site_url('penyaluran/penyaluran/rencana_pdf')?>',
        type: 'POST',
        data: $('#form_rencana').serialize(),
        success:function(html)
        {
          $('#data-rencana-pdf').html(html);
        }
      });
  }
</script>
