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
        <h2>Scm_sppbe List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id User</th>
		<th>Kode Sppbe</th>
		<th>Nama Sppbe</th>
		<th>Alamat Sppbe</th>
		<th>Telp Sppbe</th>
		<th>Created</th>
		<th>Modified</th>
		<th>Deleted</th>
		
            </tr><?php
            foreach ($sppbe_data as $sppbe)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $sppbe->id_user ?></td>
		      <td><?php echo $sppbe->kode_sppbe ?></td>
		      <td><?php echo $sppbe->nama_sppbe ?></td>
		      <td><?php echo $sppbe->alamat_sppbe ?></td>
		      <td><?php echo $sppbe->telp_sppbe ?></td>
		      <td><?php echo $sppbe->created ?></td>
		      <td><?php echo $sppbe->modified ?></td>
		      <td><?php echo $sppbe->deleted ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>