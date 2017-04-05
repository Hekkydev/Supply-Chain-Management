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
        <h2>Scm_pangkalan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id User</th>
		<th>Kode Pangkalan</th>
		<th>Kode Agen</th>
		<th>Nama Pangkalan</th>
		<th>Alamat Pangkalan</th>
		<th>Kelurahan</th>
		<th>No Telp</th>
		<th>Created Date</th>
		<th>Deleted Date</th>
		
            </tr><?php
            foreach ($scm_pangkalan_data as $scm_pangkalan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $scm_pangkalan->id_user ?></td>
		      <td><?php echo $scm_pangkalan->kode_pangkalan ?></td>
		      <td><?php echo $scm_pangkalan->kode_agen ?></td>
		      <td><?php echo $scm_pangkalan->nama_pangkalan ?></td>
		      <td><?php echo $scm_pangkalan->alamat_pangkalan ?></td>
		      <td><?php echo $scm_pangkalan->kelurahan ?></td>
		      <td><?php echo $scm_pangkalan->no_telp ?></td>
		      <td><?php echo $scm_pangkalan->created_date ?></td>
		      <td><?php echo $scm_pangkalan->deleted_date ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>