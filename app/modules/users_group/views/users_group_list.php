
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('users_group/create'),'Create', 'class="btn btn-primary btn-sm btn-flat"'); ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('users_group/index'); ?>" class="form-inline" method="get">
            <div class="form-group form-group-sm">
              <div class="input-group">
                  <input type="text" class="form-control " name="q" value="<?php echo $q; ?>">
                  <span class="input-group-btn">
                      <?php
                          if ($q <> '')
                          {
                              ?>
                              <a href="<?php echo site_url('users_group'); ?>" class="btn btn-default">Reset</a>
                              <?php
                          }
                      ?>
                    <button class="btn btn-primary btn-sm btn-flat" type="submit">Search</button>
                  </span>
              </div>
            </div>
        </form>
    </div>
</div>
<table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
        <th>No</th>
        <th>Form Access</th>
        <th>Action</th>
            </tr><?php
            foreach ($users_group_data as $users_group)
            {
        ?>
        <tr>
<td width="80px"><?php echo ++$start ?></td>
<td><?php echo $users_group->form_access ?></td>
<td style="text-align:center" width="300px">
<?php
echo anchor(site_url('users_group/read/'.$users_group->id_group),'<i class="fa fa-search "></i> Read','class="btn btn-sm btn-success btn-flat"');
  switch ($this->account->id_group) {
  case '1':
    echo  $link_edit   =  anchor(site_url('users_group/update/'.$users_group->id_group),'<i class="fa fa-edit "></i> Update','class="btn btn-sm btn-flat bg-primary "');
    echo  $link_remove =  anchor(site_url('users_group/delete/'.$users_group->id_group),'<i class="fa fa-trash "></i> Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')" class="btn btn-sm btn-flat btn-dangers "');
    break;

  default:
    $link = null;
    break;
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
        <a href="#" class="btn btn-primary btn-sm btn-flat">Total Record : <?php echo $total_rows ?></a>
<?php echo anchor(site_url('users_group/excel'), 'Excel', 'class="btn btn-primary btn-sm btn-flat"'); ?>

<?php echo anchor(site_url('users_group/word'), 'Word', 'class="btn btn-primary btn-sm btn-flat"'); ?>
</div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>
