<!-- Bootstrap 3.3.2 -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />

<div class="row">
  <div class="col-lg-12">
    <table class="table table-responsive ">
      <tr>
        <td>
          <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/logo-login.png')?>" alt="" width="200px">
      </td>
        <td></td>
        <td>

          <div align="center" style="text-align:center">
              <h4>AGEN LPG 3KG PERTAMINA</h4>
              <h5>PT. MITRA GASINDO PERSADA</h5>
              <h6>Bakomsari RT 01/02 Harjasari Bogor Selatan</h6>
              <h6>16138</h6>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <div class="col-lg-12">
    <table class="table table-responsive ">
      <tr>
        <td>Kode Pembelian</td>
        <td>:</td>
        <td><?php echo $pembelian->kode_pembelian ?></td>
      </tr>
      <tr>
        <td>Tanggal Pembelian</td>
        <td>:</td>
        <td><?php echo $pembelian->tanggal_pembelian ?></td>
      </tr>
      <tr>
        <td>Pangkalan</td>
        <td>:</td>
        <td></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td></td>
      </tr>
      <tr>
        <td>Jumlah Barang</td>
        <td>:</td>
        <td><?php echo $pembelian->jumlah_barang ?></td>
      </tr>
      <tr>
        <td>Total Biaya</td>
        <td>:</td>
        <td><?php echo rupiah($pembelian->harga_total) ?></td>
      </tr>

    </table>
    <table class="table">
      <tr>
        <td>Pangkalan LPG</td>
        <td></td>
        <td>Tempat Tanggal</td>
      </tr>
      <tr>
        <td><?php echo $pembelian->nama_pangkalan ?></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td style="height:20px;"></td>
        <td style="height:20px;"></td>
        <td style="height:20px;"></td>
      </tr>

      <tr>
        <td>Nama</td>
        <td></td>
        <td>Nama</td>
      </tr>
    </table>
  </div>
</div>
