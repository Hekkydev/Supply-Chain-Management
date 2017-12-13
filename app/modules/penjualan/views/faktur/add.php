<form action="" method="POST">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group ">
                <label for="" class="control-label">Nomor Invoice</label>
                <input type="text" class="form-control" name="invoice" value="<?php echo $invoice ?>">
            </div>
           
            <div class="form-group ">
                <label for="" class="control-label">Nama Pangkalan</label>
                <select name="kode_pangkalan" id="" class="form-control">
                    <option value="" selected disable hidden>Pilih Pangkalan</option>
                <?php foreach ($pangkalan as $p): ?>
                            <option value="<?php echo $p->kode_pangkalan ?>"><?php echo strtoupper($p->nama_pangkalan) ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="control-label">Note</label>
                <textarea name="note" class="form-control" id="" cols="30" rows="3"></textarea>
            </div>

        </div>
        <div class="col-lg-6">
          <div class="form-group ">
                <label for="" class="control-label">Agen</label>
                <input type="text" class="form-control" name="agen" value="<?php echo($account_posisition['nama_usaha']); ?>">
                <input type="hidden" name="kode_agen" value="<?php echo $account_posisition['kode_usaha']?>">
            </div>
            <div class="form-group ">
                <label for="" class="control-label">Tanggal Invoice</label>
                <input type="date" class="form-control" name="tglinvoice" >
            </div>
           
           
            
        </div>
    </div>
    <div class="row">

        <div class="col-md-12" id="additem">
        <hr>
         <div class="form-group">
                <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Simpan</button>
                <a data-toggle="modal" data-target="#addItem"  class="btn btn-primary"><i class="fa fa-plus"></i> tambah item</a><br><br>
       
        </div>
           
         
        <table class="table table-bordered table-striped" id="listtable">
            <thead>
                <tr>
                   
                    <th width="2em"><input type="checkbox" name="" id=""></th>
                    <th>Kode item</th>
                    <th>Nama item</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th width="5em">Opsi</th>
                </tr>
            </thead>
            <tbody id="listfaktur">
              
            </tbody>
        </table>
        </div>
    </div>
</form>