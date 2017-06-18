<form action="<?php echo $action; ?>" method="post">
  <div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                  <label for="varchar">Kode User <?php echo form_error('kode_user') ?></label>
                  <input type="text" class="form-control" name="kode_user" id="kode_user" placeholder="Kode User" value="<?php echo $kode_user; ?>" />
              </div>

              <div class="form-group">
                  <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
                  <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
              </div>
              <div class="form-group">
                  <label >Hak Akses</label>
                  <select class="form-control" name="id_group">
                <?php if($account->id_group == 1):?>
                    <?php foreach ($group as $g): ?>
                        <?php if ($g->id_group == $id_group): ?>
                          <option value="<?php echo $id_group; ?>" selected=""><?php echo $g->form_access; ?></option>
                          <?php else: ?>
                          <option value="<?php echo $g->id_group; ?>"><?php echo $g->form_access; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>

                      <?php $akses_ini = $account->id_group;?>
                      <?php foreach ($this->scm_library->akses_group($akses_ini) as $key => $val): ?>
                         <?php if ($key == $id_group): ?>
                              <option value="<?php echo $key; ?>" selected=""><?php echo $val; ?></option>
                           <?php else: ?>  
                              <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                         <?php endif; ?>
                      <?php endforeach; ?>
                <?php endif; ?>   
                  </select>
              </div>

              <div class="form-group">
                  <label for="int">No Telp <?php echo form_error('no_telp') ?></label>
                  <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" />
              </div>

            </div>
            <div class="col-lg-6">

              <div class="form-group">
                <label>Management Rule</label>
                <select class="form-control" name="kode_akses">
                   <?php if($account->id_group == 1):?>

                            <?php if($kode_akses_position != TRUE):?>
                            <option value="" selected="" disabled="">Pilih Area Management</option>
                            <?php endif;?>
                            <?php foreach ($this->akses = $this->scm_library->akses_posision() as $a): ?>
                                <?php if($kode_akses_position == $a['kode']):?>
                                <option value="<?php echo $a['kode'] ?>" selected=""><?php echo $a['posisi'].' - '.$a['nama_posisi'] ?></option>
                                <?php else:?>
                                <option value="<?php echo $a['kode'] ?>"><?php echo $a['posisi'].' - '.$a['nama_posisi'] ?></option>
                                <?php endif;?>
                            <?php endforeach; ?>

                    <?php else:?>
                          <?php $akses_ini = $account->kode_akses_position;?>
                          <?php foreach ($this->akses = $this->scm_library->akses_posision() as $a): ?>
                                <?php if( $a['kode'] == $akses_ini):?>
                                    <?php if($kode_akses_position == $a['kode']):?>
                                        <option value="<?php echo $a['kode'] ?>" selected=""><?php echo $a['posisi'].' - '.$a['nama_posisi'] ?></option>
                                        <?php else:?>
                                        <option value="<?php echo $a['kode'] ?>"><?php echo $a['posisi'].' - '.$a['nama_posisi'] ?></option>
                                    <?php endif;?>
                                <?php endif;?>
                            <?php endforeach; ?>




                   <?php endif;?>
                </select>
              </div>

              <div class="form-group">
                  <label for="varchar">Username <?php echo form_error('username') ?></label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
              </div>
              <div class="form-group">
                  <label for="varchar">Password <?php echo form_error('password') ?></label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />
                  <input type="hidden" name="last_password" value="<?php echo $password?>">
              </div>
               <div class="form-group">
                  <label for="varchar">Status Akun </label>
                   <select class="form-control" name="id_status">
                    <?php if($id_status == TRUE):?>
                    <?php foreach ($this->scm_library->akun_status('pengguna') as $a): ?>
                      <?php if($id_status == $a->id_status):?>
                        <option value="<?php echo $a->id_status?>" selected=""><?php echo $a->tipe_status ?></option>
                        <?php else:?>
                        <option value="<?php echo $a->id_status?>"><?php echo $a->tipe_status ?></option>
                      <?php endif;?>
                    <?php endforeach; ?>
                    <?php else:?>
                    <option value="" selected="" disabled="">Pilih Status</option>>
                    <?php foreach ($this->scm_library->akun_status('pengguna') as $a): ?>
                      <option value="<?php echo $a->id_status?>"><?php echo $a->tipe_status ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                    </select>
              </div>
            </div>
            <div class="col-lg-12">

                            <input type="hidden" name="created" value="<?php echo $created;?>">
                            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                            <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
  </div>
</form>
