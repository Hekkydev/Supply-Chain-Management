
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('scm_pangkalan/create'),'Create', 'class="btn btn-primary btn-flat"'); ?>
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
      <?php if ($account->id_group == 1): ?>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Kode Pangkalan</th>
                <th>Kode Agen</th>
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
                      <td><?php echo $scm_pangkalan->kode_agen ?></td>
                      <td><?php echo $scm_pangkalan->nama_pangkalan ?></td>
                      <td><?php echo $scm_pangkalan->alamat_pangkalan ?></td>
                      <td><?php echo $scm_pangkalan->kelurahan ?></td>
                      <td><?php echo $scm_pangkalan->no_telp ?></td>
                      <td style="text-align:center" width="200px">
                      <?php
                      echo anchor(site_url('scm_pangkalan/read/'.$scm_pangkalan->id_pangkalan),'Read');
                      echo ' | ';
                      echo anchor(site_url('scm_pangkalan/update/'.$scm_pangkalan->id_pangkalan),'Update');
                      echo ' | ';
                      echo anchor(site_url('scm_pangkalan/delete/'.$scm_pangkalan->id_pangkalan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
                    if ($account_position->kode_usaha == $scm_pangkalan->kode_agen) {
                      ?>
                      <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $scm_pangkalan->kode_pangkalan ?></td>
                            <td><?php echo $scm_pangkalan->nama_pangkalan ?></td>
                            <td><?php echo $scm_pangkalan->alamat_pangkalan ?></td>
                            <td><?php echo $scm_pangkalan->kelurahan ?></td>
                            <td><?php echo $scm_pangkalan->no_telp ?></td>
                            <td style="text-align:center" width="200px">
                            <?php
                            echo anchor(site_url('scm_pangkalan/read/'.$scm_pangkalan->id_pangkalan),'Read');
                            echo ' | ';
                            echo anchor(site_url('scm_pangkalan/update/'.$scm_pangkalan->id_pangkalan),'Update');
                            echo ' | ';
                            echo anchor(site_url('scm_pangkalan/delete/'.$scm_pangkalan->id_pangkalan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                            ?>
                            </td>
                    </tr>
                      <?php

                      }
                        }
                        ?>
                  </table>
      <?php endif; ?>
<div class="row">
    <div class="col-md-6">
        <a href="#" class="btn btn-primary btn-flat">Total Record : <?php echo $total_rows ?></a>
        <?php echo anchor(site_url('scm_pangkalan/excel'), 'Excel', 'class="btn btn-primary btn-flat"'); ?>
        <?php echo anchor(site_url('scm_pangkalan/word'), 'Word', 'class="btn btn-primary btn-flat"'); ?>
      </div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>
