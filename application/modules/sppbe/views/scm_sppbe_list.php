<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('sppbe/create'),'Create', 'class="btn btn-primary btn-flat"'); ?>
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
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telephone</th>
        <th>Terdaftar</th>
        <th style="text-align:center">Action</th>
      </tr><?php
    foreach ($sppbe_data as $sppbe)
    {
        ?>
        <tr>
      <td width="80px"><?php echo ++$start ?></td>
      <td><?php echo $sppbe->kode_sppbe ?></td>
      <td><?php echo $sppbe->nama_sppbe ?></td>
      <td><?php echo $sppbe->alamat_sppbe ?></td>
      <td><?php echo $sppbe->telp_sppbe ?></td>
      <td><?php echo $sppbe->created ?></td>
      <td style="text-align:center" width="200px">
      <?php
      echo anchor(site_url('sppbe/read/'.$sppbe->id_spbbe),'<i class="fa fa-search"></i>');
      echo ' | ';
      echo anchor(site_url('sppbe/update/'.$sppbe->id_spbbe),'<i class="fa fa-edit"></i>');
      echo ' | ';
      echo anchor(site_url('sppbe/delete/'.$sppbe->id_spbbe),'<i class="fa fa-trash"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
      ?>
      </td>
</tr>
        <?php
    }
    ?>
</table>
<div class="row">
    <div class="col-md-6">
        <a href="#" class="btn btn-primary btn-flat">Total Record : <?php echo $total_rows ?></a>
<?php echo anchor(site_url('sppbe/excel'), 'Excel', 'class="btn btn-primary btn-flat"'); ?>
<?php echo "&nbsp;" ?>
<?php echo anchor(site_url('sppbe/word'), 'Word', 'class="btn btn-primary btn-flat"'); ?>
</div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>
