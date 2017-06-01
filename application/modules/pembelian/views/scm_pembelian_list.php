<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('pembelian/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pembelian/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pembelian'); ?>" class="btn btn-default">Reset</a>
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
            <th>Kode Pembelian</th>
            <th>Tanggal Pembelian</th>
            <th>Keterangan</th>
            <th>Created</th>
            <th>Modified</th>
            <th>Deleted</th>
            <th>Action</th>
            </tr><?php
            foreach ($pembelian_data as $pembelian)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pembelian->kode_pembelian ?></td>
			<td><?php echo $pembelian->tanggal_pembelian ?></td>
			<td><?php echo $pembelian->keterangan ?></td>
			<td><?php echo $pembelian->created ?></td>
			<td><?php echo $pembelian->modified ?></td>
			<td><?php echo $pembelian->deleted ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pembelian/read/'.$pembelian->id_pembelian),'Read'); 
				echo ' | '; 
				echo anchor(site_url('pembelian/update/'.$pembelian->id_pembelian),'Update'); 
				echo ' | '; 
				echo anchor(site_url('pembelian/delete/'.$pembelian->id_pembelian),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('pembelian/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pembelian/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>