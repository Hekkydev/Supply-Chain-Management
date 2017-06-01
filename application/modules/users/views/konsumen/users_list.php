<div class="row" style="margin-bottom: 10px">
          <div class="col-md-4">
              <?php echo anchor(site_url('users/create'),'Create', 'class="btn btn-primary btn-md btn-flat"'); ?>
          </div>
          <div class="col-md-4 text-center">
              <div style="margin-top: 8px" id="message">
                  <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
              </div>
          </div>
          <div class="col-md-1 text-right">
          </div>
          <div class="col-md-3 text-right">
              <form action="<?php echo site_url('users/index'); ?>" class="form-inline" method="get">
                  <div class="input-group">
                      <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                      <span class="input-group-btn">
                          <?php
                              if ($q <> '')
                              {
                                  ?>
                                  <a href="<?php echo site_url('users'); ?>" class="btn btn-default">Reset</a>
                                  <?php
                              }
                          ?>
                        <button class="btn btn-primary btn-md btn-flat" type="submit">Search</button>
                      </span>
                  </div>
              </form>
          </div>
      </div>
      <table class="table table-bordered" style="margin-bottom: 10px">
          <tr>
              <th>No</th>
  <th>Tipe Group</th>
  <th>Kode User</th>
  <th>Nama Lengkap</th>
  <th>No Telp</th>
  <th>Username</th>
  <th>Action</th>
          </tr><?php
          foreach ($users_data as $users)
          {
              if ($users->id_group == 7) {
                if($account->id_group != 1){
                  if($account->kode_akses_position == $users->kode_akses_position){
                  ?>
                  <tr>
                      <td width="80px"><?php echo ++$start ?></td>
                      <td><?php echo $users->form_access ?></td>
                      <td><?php echo $users->kode_user ?></td>
                      <td><?php echo $users->nama_lengkap ?></td>
                      <td><?php echo $users->no_telp ?></td>
                      <td><?php echo $users->username ?></td>
                      <td style="text-align:center" width="200px">
                        <a style="cursor:pointer;" class="btn btn-xs btn-flat btn-primary" onclick="read('<?php echo $users->id_user; ?>')"><i class="fa fa-search"></i> Read</a>
                          <?php

                                  echo ' &nbsp; ';
                                  echo anchor(site_url('users/update/'.$users->id_user),'<i class="fa fa-edit"></i> Update','class="btn btn-xs btn-flat btn-success"');
                                  echo ' &nbsp;  ';
                                  echo anchor(site_url('users/delete/'.$users->id_user),'<i class="fa fa-trash"></i> Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')" class="btn btn-xs btn-flat btn-danger" ');
                                  ?>
                      </td>
              </tr>
                  <?php
                  }
                }else{?>
                <tr>
                      <td width="80px"><?php echo ++$start ?></td>
                      <td><?php echo $users->form_access ?></td>
                      <td><?php echo $users->kode_user ?></td>
                      <td><?php echo $users->nama_lengkap ?></td>
                      <td><?php echo $users->no_telp ?></td>
                      <td><?php echo $users->username ?></td>
                      <td style="text-align:center" width="200px">
                        <a style="cursor:pointer;" class="btn btn-xs btn-flat btn-primary" onclick="read('<?php echo $users->id_user; ?>')"><i class="fa fa-search"></i> Read</a>
                          <?php

                                  echo ' &nbsp; ';
                                  echo anchor(site_url('users/update/'.$users->id_user),'<i class="fa fa-edit"></i> Update','class="btn btn-xs btn-flat btn-success"');
                                  echo ' &nbsp;  ';
                                  echo anchor(site_url('users/delete/'.$users->id_user),'<i class="fa fa-trash"></i> Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')" class="btn btn-xs btn-flat btn-danger" ');
                                  ?>
                      </td>
              </tr>
                <?php
                }
              }
          }
          ?>
      </table>
      <div class="row">
          <div class="col-md-6">
              <a href="#" class="btn btn-primary btn-md btn-flat">Total Record : <?php echo $total_rows ?></a>
  <?php echo anchor(site_url('users/excel'), 'Excel', 'class="btn btn-primary btn-md btn-flat"'); ?>
  <?php echo anchor(site_url('users/word'), 'Word', 'class="btn btn-primary btn-md btn-flat"'); ?>
    </div>
          <div class="col-md-6 text-right">
              <?php echo $pagination ?>
          </div>
      </div>


      <script type="text/javascript">
          var BASE_URL = "<?php echo base_url('users'); ?>";

          function read(id_user) {
              var id_user = id_user;
              $.ajax({
                  url: BASE_URL + '/read/' + id_user,
                  type: 'POST',
                  dataType: 'html',
                  cache: false,
                  success: function(result) {
                      $('#read_view').modal('show');
                      $('#info_read').html(result);
                  },
              });
          }
      </script>
