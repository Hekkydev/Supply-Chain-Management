<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/chosen_v1.8.2/chosen.jquery.js') ?>"></script>
<script>
    jQuery(document).ready(function(){
        $(".table").DataTable();
    });

    function detail(row)
    {
        $.ajax({
            url:'<?php echo site_url('faktur/detail/'); ?>',
            type:'POST',
            dataType:'html',
            cache:false,
            data:{kode_faktur:row},
            beforeSend:function(){
                $('.loader').show();
                $('#box').hide();
            },
            success:function(response)
            {
                   $('#modal-content').html(response);
                   $('.loader').hide();
                   $('#box').show();
            }
        });
    }
</script>