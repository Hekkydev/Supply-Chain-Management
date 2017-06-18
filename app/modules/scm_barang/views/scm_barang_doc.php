<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Scm_barang List</h2>
        <table class="word-table" style="margin-bottom: 10px">
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
		
            </tr><?php
            foreach ($scm_barang_data as $scm_barang)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
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
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>