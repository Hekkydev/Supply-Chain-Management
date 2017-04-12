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
        <h2>Scm_penjualan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Penjualan</th>
		<th>Tanggal Penjualan</th>
		<th>Keterangan</th>
		<th>Created</th>
		<th>Modified</th>
		<th>Deleted</th>
		
            </tr><?php
            foreach ($penjualan_data as $penjualan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $penjualan->kode_penjualan ?></td>
		      <td><?php echo $penjualan->tanggal_penjualan ?></td>
		      <td><?php echo $penjualan->keterangan ?></td>
		      <td><?php echo $penjualan->created ?></td>
		      <td><?php echo $penjualan->modified ?></td>
		      <td><?php echo $penjualan->deleted ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>