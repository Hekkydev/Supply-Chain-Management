<div class="row">
    <div class="col-lg-4">
        <div class="form-group form-group-sm">
                <label for="kode_user">KODE AKUN</label>
                <input type="text" name="kode_user" value="<?php echo $account->kode_user; ?>" class="form-control" readonly="">
        </div>
        <div class="form-group form-group-sm">
            <label for="nama_lengkap">NAMA PROFILE</label>
            <input type="text" name="nama_lengkap" value="<?php echo $account->nama_lengkap; ?>" class="form-control">
        </div>
        <div class="form-group form-group-sm">
            <label for="no_telp">NO TELP</label>
            <input type="text" name="no_telp" value="<?php echo $account->no_telp; ?>" class="form-control">
        </div>
         <div class="form-group form-group-sm">
            <label for="email">EMAIl</label>
            <input type="text" name="email" value="<?php echo $account->email; ?>" class="form-control">
        </div>
        <div class="form-group form-group-sm">
            <label for="username">USERNAME</label>
            <input type="text" name="username" value="<?php echo $account->username; ?>" class="form-control">
        </div>
         <div class="form-group form-group-sm">
            <label for="password">PASSWORD</label>
            <input type="password" name="password" value="" class="form-control">
        </div>
        <div class="form-group form-group-sm">
            <label for="created">AKUN TERDAFTAR</label>
            <input type="text" name="created" value="<?php echo $account->created; ?>" class="form-control">
        </div>
        <div class="form-group form-group-sm">
            <label for="created">STATUS AKUN</label>
            <select class="form-control">
                <?php foreach($this->scm_library->akun_status('pengguna') as $a):?>
                        <?php if($a->id_status == $account->id_status):?>
                            <option value="<?php echo $a->id_status?>"><?php echo $a->tipe_status?></option>
                        <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <?php if($account_position->nama_usaha == TRUE):?>
       <div class="col-lg-8">
       <div class="panel panel-danger" style="margin-top:10px;">
           <div class="panel panel-body">
                <legend>INFORMASI MANAGEMENT PERUSAHAAN</legend>
        <table class="table">
            <tr>
                <th>NAMA PERUSAHAAN</th>
                <th>:</th>
                <th><?php echo $account_position->nama_usaha;?></th>
            </tr>
            <tr>
                <th>TANGGAL TERDAFTAR</th>
                <th>:</th>
                <th><?php echo $account_position->terdaftar;?></th>
            </tr>
            <tr>
                <th>JENIS USAHA</th>
                <th>:</th>
                <th><?php echo $account_position->kategori;?></th>
            </tr>
            <tr>
                <th>KODE PERUSAHAAN</th>
                <th>:</th>
                <th><?php echo $account_position->kode_usaha;?></th>
            </tr>
            <tr>
                <th>ALAMAT</th>
                <th>:</th>
                <th><?php echo $account_position->alamat;?></th>
            </tr>
            <tr>
                <th>KOTA</th>
                <th>:</th>
                <th><?php echo $account_position->kota;?></th>
            </tr>
            <tr>
                <th>KELURAHAN</th>
                <th>:</th>
                <th><?php echo $account_position->kelurahan;?></th>
            </tr>
            <tr>
                <th>CP / TELEPHONE</th>
                <th>:</th>
                <th><?php echo $account_position->telephone;?></th>
            </tr>
        </table>
           </div>
       </div>
    </div>
    <?php endif;?>
</div>
