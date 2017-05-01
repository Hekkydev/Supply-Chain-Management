<style media="screen">
  .table-cart{
    font-size: 13px !important;
    width: 100%;
  }
</style>


<div class="row" style="margin-top:20px;">
    <div class="col-lg-offset-1 col-lg-10">
      <?php $session = $this->session->flashdata('message');
        if ($session == TRUE) {
        ?>
            <div class="alert" align="center">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $session; ?>
                <br>
            </div>
        <?php
      }
       ?>
    </div>
    <form class="" action="<?php echo site_url('pembelian/pembelian/add_to_transaksi')?>" method="post">
      <div class="col-lg-offset-1 col-lg-10">
        <div class="row">
            <div class="col-lg-6">
              <div class="form-horizontal">
                  <div class="form-group">
                      <label class="control-label col-lg-4">Kode Pembelian</label>
                      <div class="col-lg-8">
                          <input type="text" name="kode_pembelian"  class="form-control" value="<?php echo $kode_pembelian ?>" readonly="">
                      </div>
                  </div>
                   <div class="form-group">
                      <label class="control-label col-lg-4">Tanggal Pembelian</label>
                      <div class="col-lg-8">
                          <input type="text" name="tanggal_pembelian" value="<?php echo date('Y-m-d')?>" class="form-control" readonly="">
                      </div>
                  </div>
                   <div class="form-group">
                      <label class="control-label col-lg-4">Pelanggan</label>
                      <div class="col-lg-8">
                          <input type="text"  value="<?php echo $nama_pelanggan ?>" class="form-control" readonly="">
                          <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                      </div>
                  </div>
                   <div class="form-group">
                      <label class="control-label col-lg-4">Note:</label>
                      <div class="col-lg-8">

                         <textarea name="keterangan" id="keterangan" class="form-control" rows="3" required="required"><?php echo $keterangan?></textarea>

                      </div>
                  </div>
                  
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-horizontal">
                  <div class="form-group">
                      <label class="control-label col-lg-4">Penerima</label>
                      <div class="col-lg-8">
                          <input type="text" name="nama_penerima"  class="form-control" value="<?php echo $nama_penerima?>" required="">
                      </div>
                  </div>
                   <div class="form-group">
                      <label class="control-label col-lg-4">Telp Penerima</label>
                      <div class="col-lg-8">
                          <input type="text"  class="form-control" name="telp_penerima" required="" value="<?php echo $telp_penerima;?>">
                      </div>
                  </div>
                   <div class="form-group">
                      <label class="control-label col-lg-4">Kota:</label>
                      <div class="col-lg-8">
                          <input type="text" class="form-control" name="kota_penerima" required="" value="<?php echo $kota_penerima;?>">

                      </div>
                  </div>
                   <div class="form-group">
                      <label class="control-label col-lg-4">Alamat Penerima:</label>
                      <div class="col-lg-8">

                         <textarea name="alamat_penerima" id="alamat_penerima" class="form-control" rows="3" required="required"><?php echo $alamat_penerima;?></textarea>

                      </div>
                  </div>

                  <hr>
              </div>
            </div>
        </div>
      </div>
    </form>

    <div class="col-lg-offset-1 col-lg-10">
      <div class="row">
        <div class="col-lg-12"  style="margin-bottom:20px;">
          <h4>DAFTAR PEMESANAN BARANG</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12" id="postList">

                         <div class="panel panel-primary">
  <div class="panel-body">
    <table class=" table-cart table  table-responsive table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Qty</th>
          <th style="text-align:right;">Harga</th>
          <th style="text-align:right;">Total</th>
        </tr>
      </thead>
      <tbody>

        <?php if ($list_pembelian == FALSE): ?>
            <tr>
              <td colspan="7" style="text-align:center;">Tidak ada daftar pemesanan barang!</td>
            </tr>
          <?php else: ?>
            <?php $sub_total = 0; $grand_total = 0; ?>
            <?php $no=0;foreach ($list_pembelian as $items): ?>
                <tr>
                  <td><?php echo ++$no; ?></td>
                  <td><?php echo $items['kode_item'] ?></td>
                  <td><?php echo cek_item($items['kode_item'])->nama_barang ?></td>
                  <td><?php echo $items['jumlah_item'] ?></td>
                  <td style="text-align:right;"><?php echo rupiah($items['harga_item']) ?></td>
                  <td style="text-align:right;"><?php echo rupiah($items['jumlah_item'] * $items['harga_item']) ?></td>
                </tr>
                <?php $sub_total = $items['jumlah_item'] * $items['harga_item']; ?>
                <?php $grand_total += $sub_total; ?>
              <?php $no++; endforeach; ?>
              <tr>
                <td></td>
                <td colspan="4"><h5 style="font-weight:bold;">TOTAL HARGA</h5></td>
                <td><h5 style="font-weight:bold;text-align:right;"><?php echo rupiah($grand_total) ?></h5></td>
                
              </tr>
        <?php endif; ?>
      </tbody>
    </table>

  </div>
</div>

        </div>
      </div>
    </div>
</div>

