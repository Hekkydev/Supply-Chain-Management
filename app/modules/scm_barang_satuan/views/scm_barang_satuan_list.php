<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('scm_barang_satuan/create'),'Create', 'class="btn btn-primary btn-flat"'); ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('scm_barang_satuan/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php
                        if ($q <> '')
                        {
                            ?>
                            <a href="<?php echo site_url('scm_barang_satuan'); ?>" class="btn btn-default">Reset</a>
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
<th>Tipe Satuan</th>
<th>Action</th>
    </tr><?php
    foreach ($scm_barang_satuan_data as $scm_barang_satuan)
    {
        ?>
        <tr>
<td width="80px"><?php echo ++$start ?></td>
<td><?php echo $scm_barang_satuan->tipe_satuan ?></td>
<td style="text-align:center" width="200px">
<?php
echo anchor(site_url('scm_barang_satuan/read/'.$scm_barang_satuan->id_satuan),'Read');
echo ' | ';
echo anchor(site_url('scm_barang_satuan/update/'.$scm_barang_satuan->id_satuan),'Update');
echo ' | ';
echo anchor(site_url('scm_barang_satuan/delete/'.$scm_barang_satuan->id_satuan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
</div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>
