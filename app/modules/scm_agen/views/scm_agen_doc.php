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
        <h2>Scm_agen List</h2>
        <table class="word-table" style="margin-bottom: 10px">
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
		
            </tr><?php
            foreach ($scm_agen_data as $scm_agen)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $scm_agen->id_user ?></td>
		      <td><?php echo $scm_agen->kode_agen ?></td>
		      <td><?php echo $scm_agen->nama_agen ?></td>
		      <td><?php echo $scm_agen->no_telp_agen ?></td>
		      <td><?php echo $scm_agen->alamat_agen ?></td>
		      <td><?php echo $scm_agen->kota ?></td>
		      <td><?php echo $scm_agen->kelurahan ?></td>
		      <td><?php echo $scm_agen->created ?></td>
		      <td><?php echo $scm_agen->modified ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>