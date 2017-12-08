<?php
  //print_r($inbox); die();
 ?>
<table class="table">
  <tr>
    <th>From </th>
    <th>:</th>
    <th><?php echo $inbox->name;?>, <small><?php echo $inbox->email ?></small></th>
  </tr>
  <tr>
    <th>Subject</th>
    <th>:</th>
    <th><?php echo $inbox->subject;?></th>
  </tr>
  <tr>
    <th>Message</th>
    <th>:</th>
    <td>
      <?php echo $inbox->message;?>
    </td>
  </tr>
</table>
<small><a href="<?php echo site_url('inbox')?>">kembali</a> | <a href="https://mail.koneksiaman.net/#compose/to/<?php echo $inbox->email; ?>" target="blank">Balas</a></small>
