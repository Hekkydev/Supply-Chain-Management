<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="<?php echo base_url()?>/assets/AdminLTE-2.0.5/dist/img/Elpiji.png" type="image/png"/>

    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/font-awesome-4.3.0/css/font-awesome.min.css"/>

    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/bootstrap/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/front/css/main.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/front/css/scm-red.css" type="text/css" />
    <script src="<?php echo base_url()?>assets/js/jquery.min.js" charset="utf-8"></script>
    <style media="screen">
      .btn-white{
        background: #FFF;
        border: 1px solid;
        border-color:#ddd;
      }
      .btn-white:hover{
        background:#DC1111;
        color:#FFF;
      }
      .bg-info{
        background: blue;
      }
      table{
        font-size: 11px;
      }
    </style>
  </head>
  <body>
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
    <table class="table table-striped table-hover table-bordered"  style="margin-bottom: 10px">
        <thead class="bg-info">
          <tr>
            <th>No</th>
            <th>Tanggal Pengiriman</th>
            <th>Kode SPPBE</th>
            <th>Plant</th>
            <th>No. Lo</th>
            <th>Qty (Pcs)</th>
            <th>Qty (Kg)</th>
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
                </tr>
            <?php  endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="8" style="text-align:center;">Tidak ada data</td>
              </tr>
          <?php endif; ?>

        </tbody>
      </table>

      <table style="width:100%;" border="0px;">
        <tr style="margin-bottom:20px;">
          <td>Pengirim</td>
          <td></td>
          <td>Mengetahui,<br><small>PT.Pertamina (Persero)</small></td>
          <td></td>
          <td>Penerima</td>
        </tr>
        <tr>
          <td colspan="5" style="height:50px;"></td>
        </tr>
        <tr>
          <td>Sppbe  : <?php echo sppbe($kode_sppbe)->nama_sppbe ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td>Agen   : <?php echo agen($kode_agen)->nama_agen ?></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td></td>
          <td>Nama</td>
          <td></td>
          <td>Nama</td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td></td>
          <td>Jabatan</td>
          <td></td>
          <td>Jabatan</td>
        </tr>
      </table>
    </div>
    </div>

  </body>
</html>
