<div class="row">
  <div class="col-lg-6">
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
        <td><?php echo $pembelian->nama_pangkalan ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $pembelian->alamat_pangkalan.' '.$pembelian->kelurahan ?></td>
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
      <tr>
        <td></td>
        <td></td>
        <td>

          <a href="<?php echo site_url('pembelian/laporan_pembelian_pangkalan')?>" class="btn btn-xs btn-success">Kembali</a>
          <a href="<?php echo site_url('pembelian/laporan_pembelian_pangkalan_pdf/'.$pembelian->Id.'')?>" class="btn btn-xs btn-danger">Cetak</a>
        </td>
      </tr>
    </table>
  </div>
</div>
