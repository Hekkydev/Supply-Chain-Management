<h4>Tambah User</h4>
<hr>
<form action="<?php echo $action; ?>" method="POST">
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
    <label for="varchar">Kode User <?php echo form_error('kode_user') ?></label>
    <input type="text" class="form-control" name="kode_user" id="kode_user" placeholder="Kode User" value="<?php echo $kode_user; ?>" />
    </div>
    <div class="form-group">
        <label for="int">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
    </div>
    <div class="form-group">
        <label for="int">No Telp <?php echo form_error('no_telp') ?></label>
        <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" />
    </div>

    </div>
    <div class="col-lg-6">

        <div class="form-group">
        <label for="varchar">Username <?php echo form_error('username') ?></label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
        <div class="form-group">
            <label for="password">Password <?php echo form_error('password') ?></label>
            <input type="password" class="form-control"  name="password" id="password" value="<?php echo $password; ?>">
        </div>
         <div class="form-group">
            <label for="int">Hak Otoritas <?php echo form_error('id_group') ?></label>
            <select class="form-control" name="id_group" id="id_group">
                <?php foreach($group as $group):?>
                        <?php if($id_group == $group->id_group):?>
                        <option value="<?php echo $group->id_group; ?>" selected=""><?php echo $group->form_access; ?></option>
                        <?php else:?>
                        <option value="<?php echo $group->id_group; ?>"><?php echo $group->form_access; ?></option>
                       <?php endif;?>
                <?php endforeach;?>
            </select>
        </div>



    </div>
    <div class="col-lg-12">

    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
    </div>
</div>
</form>
