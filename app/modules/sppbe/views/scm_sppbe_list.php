<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php if ($account->id_group == 1 || $account->id_group == 3): ?>
          <?php echo anchor(site_url('sppbe/create'),'Create', 'class="btn btn-primary btn-flat"'); ?>
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
        <form action="<?php echo site_url('sppbe/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php
                        if ($q <> '')
                        {
                            ?>
                            <a href="<?php echo site_url('sppbe'); ?>" class="btn btn-default">Reset</a>
                            <?php
                        }
                    ?>
                  <button class="btn btn-primary btn-flat" type="submit">Search</button>
                </span>
            </div>
        </form>
    </div>
</div>
<table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
        <th style="width:20px;">No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telephone</th>
        <th>Terdaftar</th>
        <th style="text-align:center; width:300px;">Action</th>
      </tr>
        <?php
        foreach ($sppbe_data as $sppbe)
        {
        ?>
        <tr>
      <td width="20px"><?php echo ++$start ?></td>
      <td><?php echo $sppbe->kode_sppbe ?></td>
      <td><?php echo $sppbe->nama_sppbe ?></td>
      <td><?php echo $sppbe->alamat_sppbe ?></td>
      <td><?php echo $sppbe->telp_sppbe ?></td>
      <td><?php echo $sppbe->created ?></td>
      <td style="text-align:center" width="200px">
        <a style="cursor:pointer;" class="btn btn-xs btn-flat btn-primary" onclick="read('<?php echo $sppbe->id_spbbe; ?>')"><i class="fa fa-search"></i> Read</a>
      <?php
      if ($account->id_group == 1 || $account->id_group == 4 || $account->id_group == 3 ) {
        echo anchor(site_url('sppbe/update/'.$sppbe->id_spbbe),'<i class="fa fa-edit"></i> Update','class="btn btn-xs btn-flat btn-success"');
        echo ' ';
        echo anchor(site_url('sppbe/delete/'.$sppbe->id_spbbe),'<i class="fa fa-trash"></i> Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')" class="btn btn-xs btn-flat btn-danger"');
      }
          ?>
      </td>
      </tr>
      <?php
      }
      ?>
</table>
<div class="row">
    <div class="col-md-6">
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
                <h4 class="modal-title">Informasi Detail SPPBE</h4>
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
    var BASE_URL = "<?php echo base_url('sppbe'); ?>";
    function read(id_sppbe) {
        var id_sppbe = id_sppbe;
        $.ajax({
            url: BASE_URL + '/read/' + id_sppbe,
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
