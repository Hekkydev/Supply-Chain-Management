
  <div class="row" style="margin-bottom: 10px">
      <div class="col-md-4">
        <?php if ($account->id_group == 7): ?>
          <?php echo anchor(site_url('scm_barang/stock_barang/pangkalan_create'),'Tambah Stock', 'class="btn btn-primary btn-flat"'); ?>
              <?php endif; ?>
      </div>
      <div class="col-md-4 text-center">
          <div style="margin-top: 8px" id="message" style="background:#f5f5f5">
              <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
          </div>
      </div>
      <div class="col-md-1 text-right">
      </div>
      <div class="col-md-3 text-right">

      </div>
  </div>
<div class="row">
  <div class="col-md-12">
    <table class="table table-responsive table-bordered">
      <thead>
        <tr>
          <th>Hari Tanggal</th>
          <th>Nama Pangkalan</th>
          <th>Stock Sisa Tabung</th>
          <th>Stock yang di kirim</th>
          <th>Satuan Pengiriman</th>
          <th>Status Pengiriman</th>
          <th>Jumlah Stock Setelah dikirim</th>
          <?php if ($account->id_group == 4): ?>
          <th>Action</th>

      <?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($barang as $b): ?>
          <tr>
            <td><?php echo $b->tanggal_update ?></td>
            <td><?php echo $b->nama_pangkalan ?></td>
            <td><?php echo $b->stock_pangkalan ?></td>
            <td><?php echo $b->stock_yang_dikirim?></td>
            <td><?php echo $b->satuan_pengiriman ?></td>
            <td><?php echo $b->tipe_status ?></td>
            <td><?php echo $b->stock_pangkalan -  $b->stock_yang_dikirim ?></td>
            <?php if ($account->id_group == 4): ?>
            <td>

                <a href="<?php echo site_url('scm_barang/stock_barang/pangkalan_read?id='.$b->id_stock.'')?>"><i class="fa fa-edit"></i></a>

            </td>
          <?php endif; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
