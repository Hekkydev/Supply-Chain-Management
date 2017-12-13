<div class="col-lg-4">
    <form action="<?php echo site_url('faktur/pangkalan_verifikasi')?>" method="post">
        <input type="hidden" name="kode_faktur" value="<?php echo $kode_faktur ?>">
        <div class="form-group">
        <br> <br>
            <label for="update" class="control-label">Konfirmasi</label>
            <select class="form-control" name="status">
                <option value="13">Belum di verifikasi</option>
                <option value="12">Sudah di verifikasi</option>
            </select>
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-save"></i>Update</button>
        </div>
    </form>
</div>