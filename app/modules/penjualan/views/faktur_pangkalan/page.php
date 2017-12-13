
<div class="laporan-faktur" style="padding-top:30px;">
    <table class="table table-responsive table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>No. Faktur</th>
                <th>Tanggal Permintaan</th>
                <th>Permintaan</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=0; foreach($faktur as $f):?>
                <tr>
                    <td><?php echo ++$no;?></td>
                    <td><?php echo '#'.$f->kode_faktur;?></td>
                    <td><?php echo $f->created_at;?></td>
                    <td><?php echo $f->nama_agen;?></td>
                    <td><?php echo status($f->id_status);?></td>
                    <td>
                        <a onclick="detail('<?php echo $f->kode_faktur?>')" data-toggle="modal" data-target="#detailInvoice" class="btn btn-xs btn-default"><i class="fa fa-search"></i></a>
                    </td>
                </tr>
            <?php endforeach;?>

        </tbody>
    </table>
</div>


<!-- Modal -->
<div id="detailInvoice" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Faktur / Invoice</h4>
      </div>
      <div class="modal-body" id="modal-content">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>