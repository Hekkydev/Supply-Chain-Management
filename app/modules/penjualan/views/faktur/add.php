<form action="">
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
                <input type="text" class="form-control" name="agen">
            </div>
            <div class="form-group ">
                <label for="" class="control-label">Tanggal Invoice</label>
                <input type="text" class="form-control" name="tglinvoice">
            </div>
           
           
            
        </div>
    </div>
    <div class="row">
    
        <div class="col-md-12" id="additem">
        <hr>

        <a data-toggle="modal" data-target="#addItem"  class="btn btn-primary"><i class="fa fa-plus"></i> tambah</a><br><br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                   
                    <th><input type="checkbox" name="" id=""></th>
                    <th>Kode item</th>
                    <th>Nama item</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>
        </div>
    </div>
</form>