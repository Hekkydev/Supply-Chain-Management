<!-- pagescript -->
<div id="addItem" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <form action="#" id="itemdata">
                <div class="form-group">
                    <label for="" class="control-label">Item</label>
                    <select name="kodeitem" id="" class="form-control">
                    <?php foreach($item as $i):?><option value='<?php echo $i->kode_barang?>'><?php echo $i->nama_barang?></option><?php endforeach;?>
                    </select>
                </div>
                <div class="form-group"><label for="qty" class="control-label">Qty</label><input name="qty" type="number" name="" id="" class="form-control"></div>
        </form>
      </div>
      <div class="modal-footer">
        <button onclick="addRow()" type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
      </div>
    </div>

  </div>
</div>


<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/chosen_v1.8.2/chosen.jquery.js') ?>"></script>
<script>
    $(document).ready(function(){
        var table4 = $('.table').DataTable();
        $('.table').on("click", "button", function(){
            console.log($(this).parent());
            table4.row($(this).parents('tr')).remove().draw(false);
        });
        $.ajax({
            url:'<?php echo site_url('faktur/add/load-item'); ?>',
            type:'POST',
            dataType:'html',
            cache:false,
            beforeSend:function(){
                $('.loader').show();
                $('#box').hide();
            },
            success:function(response)
            {
                   $('#listfaktur').html(response);
                   $('.loader').hide();
                   $('#box').show();
            }
        });
     
    });

    function notifikasi()
    {
        alert('ok');
    }

    function addRow()
    {
        var item = $("#itemdata").serialize();

        $.ajax({
            url:'<?php echo site_url('faktur/add/item-add'); ?>',
            type:'POST',
            dataType:'html',
            cache:false,
            data:item,
            success:function(response)
            {
                   $('#listfaktur').html(response);
            }
        });
        
       
    }

   function remove(rowid)
   {
       $.ajax({
            url:'<?php echo site_url('faktur/add/item-remove'); ?>',
            type:'POST',
            dataType:'html',
            cache:false,
            data:{rowid:rowid},
            beforeSend:function(){
                $('.loader').show();
                $('#box').hide();
            },
            success:function(response)
            {
                   $('#listfaktur').html(response);
                   $('.loader').hide();
                   $('#box').show();
            }
        });
        
   }
  
</script>
