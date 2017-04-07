<h2 style="margin-top:0px">Scm_barang List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('scm_barang/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('scm_barang/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('scm_barang'); ?>" class="btn btn-default">Reset</a>
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
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Stock</th>
		<th>Satuan</th>
		<th>Harga Jual</th>
		<th>Harga Beli</th>
		<th>Diskon</th>
		<th>Id Kategori</th>
		<th>Keterangan</th>
		<th>Gambar</th>
		<th>Created</th>
		<th>Modified</th>
		<th>Action</th>
            </tr><?php
            foreach ($scm_barang_data as $scm_barang)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $scm_barang->id_user ?></td>
			<td><?php echo $scm_barang->kode_barang ?></td>
			<td><?php echo $scm_barang->nama_barang ?></td>
			<td><?php echo $scm_barang->stock ?></td>
			<td><?php echo $scm_barang->satuan ?></td>
			<td><?php echo $scm_barang->harga_jual ?></td>
			<td><?php echo $scm_barang->harga_beli ?></td>
			<td><?php echo $scm_barang->diskon ?></td>
			<td><?php echo $scm_barang->id_kategori ?></td>
			<td><?php echo $scm_barang->keterangan ?></td>
			<td><?php echo $scm_barang->gambar ?></td>
			<td><?php echo $scm_barang->created ?></td>
			<td><?php echo $scm_barang->modified ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('scm_barang/read/'.$scm_barang->id_barang),'Read'); 
				echo ' | '; 
				echo anchor(site_url('scm_barang/update/'.$scm_barang->id_barang),'Update'); 
				echo ' | '; 
				echo anchor(site_url('scm_barang/delete/'.$scm_barang->id_barang),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('scm_barang/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('scm_barang/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>