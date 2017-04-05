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
        <h2>Users List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Group</th>
		<th>Kode User</th>
		<th>Nama Lengkap</th>
		<th>No Telp</th>
		<th>Username</th>
		<th>Password</th>
		<th>Created</th>
		<th>Modified</th>
		
            </tr><?php
            foreach ($users_data as $users)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $users->id_group ?></td>
		      <td><?php echo $users->kode_user ?></td>
		      <td><?php echo $users->nama_lengkap ?></td>
		      <td><?php echo $users->no_telp ?></td>
		      <td><?php echo $users->username ?></td>
		      <td><?php echo $users->password ?></td>
		      <td><?php echo $users->created ?></td>
		      <td><?php echo $users->modified ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>