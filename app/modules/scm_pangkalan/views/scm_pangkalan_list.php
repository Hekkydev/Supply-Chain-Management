
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
      <?php if ($account->id_group == 1 || $account->id_group == 6): ?>
        <?php echo anchor(site_url('scm_pangkalan/create'),'Create', 'class="btn btn-primary btn-flat"'); ?>
      <?php endif; ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('scm_pangkalan/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php
                        if ($q <> '')
                        {
                            ?>
                            <a href="<?php echo site_url('scm_pangkalan'); ?>" class="btn btn-default">Reset</a>
                            <?php
                        }
                    ?>
                  <button class="btn btn-primary btn-flat" type="submit">Search</button>
                </span>
            </div>
        </form>
    </div>
</div>
      <?php if ($account->id_group == 1 || $account->id_group == 5): ?>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Kode Pangkalan</th>
                <th>Kode Agen</th>
                <th>Nama Pangkalan</th>
                <th>Alamat Pangkalan</th>
                <th>Kelurahan</th>
                <th>No Telp</th>
                <th style="text-align:center;">Action</th>
            </tr>

            <?php
            foreach ($scm_pangkalan_data as $scm_pangkalan)
            {
                ?>
                <tr>
                      <td width="80px"><?php echo ++$start ?></td>
                      <td><?php echo $scm_pangkalan->kode_pangkalan ?></td>
                      <td><?php echo $scm_pangkalan->kode_agen ?></td>
                      <td><?php echo $scm_pangkalan->nama_pangkalan ?></td>
                      <td><?php echo $scm_pangkalan->alamat_pangkalan ?></td>
                      <td><?php echo $scm_pangkalan->kelurahan ?></td>
                      <td><?php echo $scm_pangkalan->no_telp ?></td>
                      <td style="text-align:center" width="200px">
                      <a style="cursor:pointer" onclick="read_pangkalan('<?php echo $scm_pangkalan->id_pangkalan?>')" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-search"></i> Read</a>
                    <?php if ($account->id_group == 1 || $account->id_group == 4 || $account->id_group == 6):
                      echo anchor(site_url('scm_pangkalan/update/'.$scm_pangkalan->id_pangkalan),'<i class="fa fa-edit"></i> Update','class="btn  btn-xs btn-success btn-flat"');
                      echo "&nbsp;";
                      echo anchor(site_url('scm_pangkalan/delete/'.$scm_pangkalan->id_pangkalan),'<i class="fa fa-trash"></i> Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')" class="btn btn-flat btn-xs btn-danger"');
                    endif;
                      ?>
                      </td>
              </tr>
                <?php
                  }
                  ?>
            </table>

      <?php else: ?>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Kode Pangkalan</th>
                <th>Nama Pangkalan</th>
                <th>Alamat Pangkalan</th>
                <th>Kelurahan</th>
                <th>No Telp</th>
                <th>Action</th>
            </tr>

            <?php
            foreach ($scm_pangkalan_data as $scm_pangkalan)
            {
                  ?>
                <tr>
                      <td width="80px"><?php echo ++$start ?></td>
                      <td><?php echo $scm_pangkalan->kode_pangkalan ?></td>
                      <td><?php echo $scm_pangkalan->nama_pangkalan ?></td>
                      <td><?php echo $scm_pangkalan->alamat_pangkalan ?></td>
                      <td><?php echo $scm_pangkalan->kelurahan ?></td>
                      <td><?php echo $scm_pangkalan->no_telp ?></td>
                      <td style="text-align:center" width="200px">
                      <a href="#" onclick="read_pangkalan('<?php echo $scm_pangkalan->id_pangkalan?>')" class="btn btn-xs btn-flat btn-primary">Read</a>
                    <?php if ($account->id_group == 1 || $account->id_group == 4 || $account->id_group == 6):
                      echo ' &nbsp; ';
                      echo anchor(site_url('scm_pangkalan/update/'.$scm_pangkalan->id_pangkalan),'Update', 'class="btn btn-xs btn-flat btn-success"');
                      echo ' &nbsp; ';
                      echo anchor(site_url('scm_pangkalan/delete/'.$scm_pangkalan->id_pangkalan),'Delete','class="btn btn-xs btn-flat btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                    endif;
                      ?>
                      </td>
              </tr>
                <?php

                  }
                  ?>
            </table>
      <?php endif; ?>
<div class="row">
    <div class="col-md-6">
        <!-- <a href="#" class="btn btn-primary btn-flat">Total Record : <?php echo $total_rows ?></a>
        <?php echo anchor(site_url('scm_pangkalan/excel'), 'Excel', 'class="btn btn-primary btn-flat"'); ?>
        <?php echo anchor(site_url('scm_pangkalan/word'), 'Word', 'class="btn btn-primary btn-flat"'); ?> -->
      </div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>

<!-- Modal -->
  <div class="modal fade" id="read_view" role="dialog" data-backdrop="static">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Informasi Detail Pangkalan</h4>
        </div>
        <div class="modal-body">
          <div id="info_read">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
<script type="text/javascript">
  var BASE_URL = "<?php echo base_url('scm_pangkalan'); ?>";
  function read_pangkalan(id_pangkalan) {
    var id_pangkalan = id_pangkalan;
    $.ajax({
      url: BASE_URL+'/read/'+id_pangkalan,
      type: 'POST',
      dataType: 'html',
      cache:false,
      success:function(result)
      {
            $('#read_view').modal('show');
            $('#info_read').html(result);
      },
    });
  }
</script>
