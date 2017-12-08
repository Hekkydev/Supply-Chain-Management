<form action="<?php echo site_url('scm_barang/stock_barang/update_data_stock_pangkalan')?>" method="post">
  <input type="hidden" name="id_stock" value="<?php echo $stock->id_stock?>">
   <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                 <label for="tanggal">Tanggal Update</label>
                <input type="text" name="tanggal" value="<?php echo date('Y-m-d')?>" class="form-control">
            </div>
             <div class="form-group">
                 <label for="tanggal">Nama Agen</label>
                <input type="text" class="form-control" name="" value="<?php echo $stock->nama_pangkalan?>">
            </div>
            <div class="form-group">
                <label for="tanggal">Pilih Barang</label>
                <select class="form-control" name="id_barang">
                   <?php foreach ($barang as $a): ?>
                     <?php if ($stock->id_barang == $a->id_barang): ?>
                       <option value="<?php echo $a->id_barang ?>" selected><?php echo $a->nama_barang ?></option>
                     <?php endif; ?>
                   <?php endforeach; ?>
                </select>
           </div>
           <div class="form-group">
                <label for="tanggal">Jumlah Stock yang dikirm</label>
               <input type="number" name="stock_yang_dikirim"  class="form-control" value="<?php echo $stock->stock_yang_dikirim ?>">
           </div>

           <div class="form-group">
                <label for="tanggal">Satuan Pengiriman</label>
               <input type="text" name="satuan_pengiriman"  class="form-control" value="<?php echo $stock->satuan_pengiriman ?>">
           </div>

           <div class="form-group">
                <label for="tanggal">Jumlah Stock</label>
               <input type="number" name="stock"  class="form-control" value="<?php echo $stock->stock_pangkalan - $stock->stock_yang_dikirim ?>">
           </div>

           <div class="form-group">
                <label for="tanggal">Update Status</label>
              <select class="form-control" name="id_status">
                <?php foreach ($status as $s): ?>
                    <option value="<?php echo $s->id_status ?>"><?php echo $s->tipe_status ?></option>
                <?php endforeach; ?>
              </select>
           </div>


           <div class="form-group">
              <button type="submit">SIMPAN</button>
           </div>
         </div>
   </div>
</form>
