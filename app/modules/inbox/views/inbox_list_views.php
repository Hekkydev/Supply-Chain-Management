<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-yw4l{vertical-align:top}
</style>
<table class="tg table table-striped table-hover">
  <tr>
    <th class="tg-yw4l">No</th>
    <th class="tg-yw4l">Email</th>
    <th class="tg-yw4l">Dari<br></th>
    <th class="tg-yw4l">Subject</th>
    <th class="tg-yw4l">Message</th>
    <th class="tg-yw4l">Action</th>
  </tr>
  <?php $no =1;foreach ($inbox as $i): ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $i->email ?></td>
      <td><?php echo $i->name ?></td>
      <td><?php echo $i->subject ?></td>
      <td><?php echo substr($i->message,0,30) ?></td>
      <td>
        <a href="<?php echo site_url('inbox/read/'.$i->id_inbox.'')?>" class="btn btn-xs btn-flat btn-success"><i class="fa fa-eye"></i> Read</a>
      </td>
    </tr>
  <?php $no++; endforeach; ?>
</table>
