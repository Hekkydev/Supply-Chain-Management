
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('scm_barang/stock_barang/create'),'Tambah Stock', 'class="btn btn-primary btn-flat"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">

            </div>
        </div>


        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Agen</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
            <tbody>
            <?php if ($account->id_group == 1): ?>
              <?php if ($barang != TRUE): ?>
                  <tr>
                    <td colspan="7" style="text-align:center"><h4><i class="fa fa-exclamation-triangle"></i>Tidak ada laporan stock</h4></td>
                  </tr>
                <?php else: ?>
                  <?php $no=0; foreach ($barang as $b): ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $b->tanggal_update ?></td>
                      <td><?php echo $b->nama_agen; ?></td>
                      <td><?php echo $b->kode_barang; ?></td>
                      <td><?php echo $b->nama_barang ?></td>
                      <td><?php echo $b->stock_agen + $b->stock ?></td>
                      <td><a href="<?php echo site_url('scm_barang/stock_barang/deleted_stock?id_stock='.$b->id_stock.'')?>"><i class="fa fa-remove"></i> Hapus</a></td>
                    </tr>
                  <?php endforeach; ?>
              <?php endif; ?>
              <?php else: ?>
                <?php if ($barang != TRUE): ?>
                    <tr>
                      <td colspan="7" style="text-align:center"><h4><i class="fa fa-exclamation-triangle"></i>Tidak ada laporan stock</h4></td>
                    </tr>
                  <?php else: ?>
                    <?php $no=0; foreach ($barang as $b): ?>
                      <?php if ($b->kode_agen == $account_position->kode_usaha): ?>
                        <tr>
                          <td><?php echo ++$no; ?></td>
                          <td><?php echo $b->tanggal_update ?></td>
                          <td><?php echo $b->nama_agen; ?></td>
                          <td><?php echo $b->kode_barang; ?></td>
                          <td><?php echo $b->nama_barang ?></td>
                          <td><?php echo $b->stock_agen + $b->stock ?></td>
                          <td><a href="<?php echo site_url('scm_barang/stock_barang/deleted_stock?id_stock='.$b->id_stock.'')?>"><i class="fa fa-remove"></i> Hapus</a></td>
                        </tr>
                      <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
            </tbody>
        </table>
