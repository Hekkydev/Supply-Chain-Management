
<!-- Simple Invoice - START -->
<div class="row">
<div class="col-xs-12">
    <div class="text-center">
        <i class="fa fa-search-plus pull-left icon"></i>
        <h2>Invoice #<?php echo $kode_faktur?></h2>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12 col-md-4 col-lg-4 pull-left">
            <div class="panel panel-default height">
                <div class="panel-heading">Detail Penagihan</div>
                <div class="panel-body">
                    <strong><?php echo $faktur->nama_agen ?></strong><br>
                    <?php echo $faktur->alamat_agen?><br>
                    <?php echo $faktur->kota?><br>
                    <strong><?php echo $faktur->no_telp_agen?></strong><br>
                </div>
            </div>
        </div>
       <div class="col-xs-12 col-md-4 col-lg-4 ">
            <div class="panel panel-default height">
                <div class="panel-heading">Detail Permintaan</div>
                <div class="panel-body">
                    <strong>Tanggal:</strong><?php echo $faktur->tanggal_invoice?><br>
                    <strong>Status :</strong><?php echo status($faktur->id_status)?><br>
                    <strong>Note</strong> <?php echo $faktur->note;?><br>
                    
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-4 pull-right">
            <div class="panel panel-default height">
                <div class="panel-heading">Ke Pangkalan</div>
                <div class="panel-body">
                    <strong><?php echo $faktur->nama_pangkalan ?></strong>
                    <strong><?php echo $faktur->alamat_pangkalan ?></strong><br>
                    <strong><?php echo $faktur->no_telp?></strong><br>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="text-center"><strong>Order Item</strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <td><strong>Item Name</strong></td>
                            <td class="text-center"><strong>Item Price</strong></td>
                            <td class="text-center"><strong>Item Quantity</strong></td>
                            <td class="text-right"><strong>Total</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach($item as $i):?>
                        <tr>
                            <td><?php echo $i->nama_barang ?></td>
                            <td class="text-center"><?php echo number_format($i->harga_beli) ?></td>
                            <td class="text-center"><?php echo $i->qty ?></td>
                            <td class="text-right"><?php echo number_format($i->harga_beli * $i->qty,2) ?></td>
                        </tr>
                        <?php
                        $total += $i->harga_beli*$i->qty;
                        endforeach;?>
                        <!-- <tr>
                            <td class="emptyrow"></td>
                            <td class="emptyrow"></td>
                            <td class="emptyrow text-center"><strong>Shipping</strong></td>
                            <td class="emptyrow text-right">$20</td>
                        </tr> -->
                        <tr>
                            <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                            <td class="emptyrow"></td>
                            <td class="emptyrow text-center"><strong>Total</strong></td>
                            <td class="emptyrow text-right"><?php echo number_format($total,2)?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
       
        <div style="padding-top:10px;">
        <?php 
            if ($faktur->id_status == '13') {
                echo $updatestatus;
            }
        ?>
        </div>
    </div>
</div>
</div>

<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>

<!-- Simple Invoice - END -->