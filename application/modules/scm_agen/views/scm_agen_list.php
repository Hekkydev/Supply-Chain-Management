<h2 style="margin-top:0px">Scm_agen List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('scm_agen/create'),'Create', 'class="btn btn-primary"'); ?>
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
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id User</th>
		<th>Kode Agen</th>
		<th>Nama Agen</th>
		<th>No Telp Agen</th>
		<th>Alamat Agen</th>
		<th>Kota</th>
		<th>Kelurahan</th>
		<th>Created</th>
		<th>Modified</th>
		<th>Action</th>
            </tr><?php
            foreach ($scm_agen_data as $scm_agen)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $scm_agen->id_user ?></td>
			<td><?php echo $scm_agen->kode_agen ?></td>
			<td><?php echo $scm_agen->nama_agen ?></td>
			<td><?php echo $scm_agen->no_telp_agen ?></td>
			<td><?php echo $scm_agen->alamat_agen ?></td>
			<td><?php echo $scm_agen->kota ?></td>
			<td><?php echo $scm_agen->kelurahan ?></td>
			<td><?php echo $scm_agen->created ?></td>
			<td><?php echo $scm_agen->modified ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('scm_agen/read/'.$scm_agen->id_agen),'Read'); 
				echo ' | '; 
				echo anchor(site_url('scm_agen/update/'.$scm_agen->id_agen),'Update'); 
				echo ' | '; 
				echo anchor(site_url('scm_agen/delete/'.$scm_agen->id_agen),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('scm_agen/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('scm_agen/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>