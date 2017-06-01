<div class="row">
  <div class="col-lg-4">
      <div class="form-group">
        <label class="control-label">Kode Barang</label>
        <input type="text" name="" value="<?php echo $kode_barang?>" class="form-control">
      </div>
      <div class="form-group">
        <label class="control-label">Nama Barang</label>
        <input type="text" name="" value="<?php echo $nama_barang?>" class="form-control">
      </div>
      <div class="form-group">
        <label class="control-label">Harga Beli</label>
        <input type="text" name="" value="<?php echo $harga_beli?>" class="form-control">
      </div>
      <div class="form-group">
        <label class="control-label">Keterangan</label>
        <textarea name="" class="form-control"><?php echo $keterangan; ?></textarea>
      </div>

  </div>
  <div class="col-lg-4">
    <div class="form-group">
      <label class="control-label">Satuan</label>
      <input type="text" name="" value="<?php echo satuan($satuan)?>" class="form-control">
    </div>
    <div class="form-group">
      <label class="control-label">Stock</label>
      <input type="text" name="" value="<?php echo $stock?>" class="form-control">
    </div>
    <div class="form-group">
      <label class="control-label">Harga Jual</label>
      <input type="text" name="" value="<?php echo $harga_jual?>" class="form-control">
    </div>
    <div class="form-group">
      <label class="control-label">Kategori</label>
      <input type="text" name="" value="<?php echo kategori($id_kategori)?>" class="form-control">
    </div>
  </div>
  <div class="col-lg-4">
    <div class="form-group" align="center">
      <img src="<?php echo site_url('upload/'.$gambar.'')?>" alt="" class="img-responsive">
    </div>
  </div>
</div>
