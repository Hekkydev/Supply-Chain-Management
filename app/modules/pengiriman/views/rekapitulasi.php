<a href="<?php echo site_url('pengiriman')?>" class="btn btn-primary btn-sm"><i class="fa fa-chevron-left"></i>  KEMBALI</a>
<a target="_blank" href="<?php echo site_url('pengiriman/pengiriman/pdf?tanggal_pengiriman='.$tanggal_pengiriman.'&kode_sppbe='.$kode_sppbe.'&kode_agen='.$kode_agen.'')?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i>   PDF</a>
<br><br>
<div class="row">
  <div class="col-lg-6">
    <table class="table">
    	    <tr><td>Kode SPPBE</td><td>:</td><td><?php echo $kode_sppbe; ?></td></tr>
          <tr><td>SPPBE</td><td>:</td><td><?php echo sppbe($kode_sppbe)->nama_sppbe; ?></td></tr>
          <tr><td>AGEN</td><td>:</td><td><?php echo agen($kode_agen)->nama_agen; ?></td></tr>
          <tr><td>ALAMAT AGEN</td><td>:</td><td><?php echo agen($kode_agen)->alamat_agen; ?></td></tr>
          <tr><td>KOTA</td><td>:</td><td><?php echo agen($kode_agen)->kota; ?></td></tr>
    	</table>
  </div>
<div class="col-lg-12">
<table class="table table-striped table-hover table-bordered">
    <thead class="bg-info">
      <tr>
        <th>No</th>
        <th>Tanggal Pengiriman</th>
        <th>Kode SPPBE</th>
        <th>Plant</th>
        <th>No. Lo</th>
        <th>Qty (Pcs)</th>
        <th>Qty (Kg)</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if ($pengiriman == TRUE): ?>
        <?php $start = 0; foreach ($pengiriman as $p): ?>
            <tr>
              <td><?php echo ++$start; ?></td>
              <td><?php echo $p->tanggal_pengiriman ?></td>
              <td><?php echo $p->kode_sppbe ?></td>
              <td><?php echo $p->plant ?></td>
              <td><?php echo $p->no_lo ?></td>
              <td><?php echo $p->qty_pcs ?></td>
              <td><?php echo $p->qty_kg ?></td>
              <td></td>
            </tr>
        <?php  endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="8" style="text-align:center;">Tidak ada data</td>
          </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</div>
