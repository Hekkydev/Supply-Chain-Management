
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('scm_agen/create'),'Create', 'class="btn btn-primary btn-flat"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('scm_agen/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('scm_agen'); ?>" class="btn btn-default">Reset</a>
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
            		<th>Kode Agen</th>
            		<th>Nama Agen</th>
            		<th>Telp Agen</th>
            		<th>Alamat Agen</th>
            		<th>Kota</th>
            		<th>Kelurahan</th>
            		<th>Terdaftar</th>
            		<th style="text-align:center">Action</th>
            </tr><?php
            foreach ($scm_agen_data as $scm_agen)
            {
                ?>
                <tr>
			<td width="40px"><?php echo ++$start ?></td>

			<td><?php echo $scm_agen->kode_agen ?></td>
			<td><?php echo $scm_agen->nama_agen ?></td>
			<td><?php echo $scm_agen->no_telp_agen ?></td>
			<td><?php echo $scm_agen->alamat_agen ?></td>
			<td><?php echo $scm_agen->kota ?></td>
			<td><?php echo $scm_agen->kelurahan ?></td>
			<td><?php echo $scm_agen->created ?></td>
			<td style="text-align:center" width="100px">
				<?php
				echo anchor(site_url('scm_agen/read/'.$scm_agen->id_agen),'<i class="fa fa-search"></i>');
				echo ' | ';
				echo anchor(site_url('scm_agen/update/'.$scm_agen->id_agen),'<i class="fa fa-edit"></i>');
				echo ' | ';
				echo anchor(site_url('scm_agen/delete/'.$scm_agen->id_agen),'<i class="fa fa-trash"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
		<?php echo anchor(site_url('scm_agen/excel'), 'Excel', 'class="btn btn-primary btn-flat"'); ?>
    &nbsp;
		<?php echo anchor(site_url('scm_agen/word'), 'Word', 'class="btn btn-primary btn-flat"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
