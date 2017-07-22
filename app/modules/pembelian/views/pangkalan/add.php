<form class="form-horizontal" action="<?php echo $action; ?>" method="post">
  <legend>Form Transaksi Pembelian Pangkalan</legend>
  <div class="form-group">
    <label class="control-label col-lg-3">No Pembelian</label>
    <div class="col-lg-6">
        <input type="text" name="kode_pembelian" value="<?php echo $kode_pembelian; ?>" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-3">Tanggal Pembelian</label>
    <div class="col-lg-6">
        <input type="text" name="tanggal_pembelian"  class="form-control" value="<?php echo $tanggal_pembelian; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-3">Pelanggan</label>
    <div class="col-lg-6">
        <select class="form-control" name="pangkalan">
            <?php foreach ($pangkalan as $p): ?>
              <option value="<?php echo $p->kode_pangkalan; ?>"><?php echo $p->nama_pangkalan ?></option>
            <?php endforeach; ?>
        </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-3">Jumlah Barang</label>
    <div class="col-lg-6">
        <input type="text" name="jumlah_barang"  class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-3">Harga Beli</label>
    <div class="col-lg-6">
        <input type="text" name="harga_beli"  class="form-control" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-3">Sub Total</label>
    <div class="col-lg-6">
        <input type="text" name="harga_sub_total"  class="form-control" readonly>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-3">Uang Bayar</label>
    <div class="col-lg-6">
        <input type="text" name="uang_bayar"  class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-3"></label>
    <div class="col-lg-6">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>


<script type="text/javascript">
  $('input[name=harga_beli]').keyup(function(){
      var harga_beli = $('input[name=harga_beli]').val();
      var jumlah_barang = $('input[name=jumlah_barang]').val();
      var sub_total = harga_beli * jumlah_barang;
      $('input[name=harga_sub_total]').val(sub_total);
  });

  $('input[name=jumlah_barang]').keyup(function(){
      var harga_beli = $('input[name=harga_beli]').val();
      var jumlah_barang = $('input[name=jumlah_barang]').val();
      var sub_total = harga_beli * jumlah_barang;
      $('input[name=harga_sub_total]').val(sub_total);
  });
</script>
