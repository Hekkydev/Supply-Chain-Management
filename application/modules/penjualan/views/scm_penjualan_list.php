<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('penjualan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('penjualan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('penjualan'); ?>" class="btn btn-default">Reset</a>
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
		<th>Kode Penjualan</th>
		<th>Tanggal Penjualan</th>
		<th>Keterangan</th>
		<th>Created</th>
		<th>Modified</th>
		<th>Deleted</th>
		<th>Action</th>
            </tr><?php
            foreach ($penjualan_data as $penjualan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $penjualan->kode_penjualan ?></td>
			<td><?php echo $penjualan->tanggal_penjualan ?></td>
			<td><?php echo $penjualan->keterangan ?></td>
			<td><?php echo $penjualan->created ?></td>
			<td><?php echo $penjualan->modified ?></td>
			<td><?php echo $penjualan->deleted ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('penjualan/read/'.$penjualan->id_penjualan),'Read'); 
				echo ' | '; 
				echo anchor(site_url('penjualan/update/'.$penjualan->id_penjualan),'Update'); 
				echo ' | '; 
				echo anchor(site_url('penjualan/delete/'.$penjualan->id_penjualan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('penjualan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('penjualan/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>