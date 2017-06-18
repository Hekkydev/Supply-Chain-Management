<table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telephone</th>
      </tr><?php $start = 0;
    foreach ($sppbe_data as $sppbe)
    {
        ?>
        <tr>
      <td width="80px"><?php echo ++$start ?></td>
      <td><?php echo $sppbe->kode_sppbe ?></td>
      <td><?php echo $sppbe->nama_sppbe ?></td>
      <td><?php echo $sppbe->alamat_sppbe ?></td>
      <td><?php echo $sppbe->telp_sppbe ?></td>

</tr>
        <?php
    }
    ?>
</table>
