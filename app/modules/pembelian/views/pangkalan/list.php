<table class="table">
  <tr>
    <th>No</th>
    <th>Kode Pembelian</th>
    <th>Tanggal Pembelian</th>
    <th>Kode Pangkalan</th>
    <th>Nama Pangkalan</th>
    <th>Jumlah Barang</th>
    <th>Harga Beli</th>
    <td>Action</td>
  </tr>
  <?php $no = 0; foreach ($pembelian as $p): ?>
    <tr>
      <td><?php echo ++$no; ?></td>
      <td><?php echo $p->kode_pembelian; ?></td>
      <td><?php echo $p->tanggal_pembelian; ?></td>
      <td><?php echo $p->kode_pangkalan ?></td>
      <td><?php echo $p->nama_pangkalan; ?></td>
      <td><?php echo $p->jumlah_barang ?></td>
      <td><?php echo $p->harga_barang; ?></td>
      <td>
        <a href="<?php echo site_url('pembelian/laporan_pembelian_pangkalan/'.$p->Id.'')?>" class="btn btn-xs btn-success"><i class="fa fa-file"></i> Detail</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
