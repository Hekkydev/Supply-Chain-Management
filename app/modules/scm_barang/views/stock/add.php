<form action="<?php echo site_url('scm_barang/stock_barang/update_stock')?>" method="post">
   <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                 <label for="tanggal">Tanggal Update</label>
                <input type="text" name="tanggal" value="<?php echo date('Y-m-d')?>" class="form-control">
            </div>
             <div class="form-group">
                 <label for="tanggal">Nama Agen</label>
                 <select class="form-control" name="id_agen">
                   <?php if ($account->id_group == 1): ?>
                      <?php foreach ($agen as $a): ?>
                        <option value="<?php echo $a->id_agen ?>"><?php echo $a->nama_agen ?></option>
                      <?php endforeach; ?>
                      <?php else: ?>
                         <?php foreach ($agen as $a): ?>
                           <?php if ($account_position->kode_usaha == $a->kode_agen): ?>
                             <option value="<?php echo $a->id_agen ?>" selected=""><?php echo $a->nama_agen ?></option>
                           <?php endif; ?>
                         <?php endforeach; ?>
                   <?php endif; ?>
                 </select>
            </div>
            <div class="form-group">
                <label for="tanggal">Pilih Barang</label>
                <select class="form-control" name="id_barang">
                   <?php foreach ($barang as $a): ?>
                     <option value="<?php echo $a->id_barang ?>"><?php echo $a->nama_barang ?></option>
                   <?php endforeach; ?>
                </select>
           </div>
           <div class="form-group">
                <label for="tanggal">Jumlah Stock</label>
               <input type="number" name="stock"  class="form-control">
           </div>
           <div class="form-group">
              <button type="submit">SIMPAN</button>
           </div>
         </div>
   </div>
</form>
