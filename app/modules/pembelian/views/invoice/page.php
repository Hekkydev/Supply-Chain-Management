
<style>

.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
<div class="row">
<div class="col-xs-12">
    <div class="invoice-title">
        <h2>Invoice</h2><h3 class="pull-right">Order # <?php echo isset($inv->kode_pembelian) ? $inv->kode_pembelian : ''; ?></h3>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-6">
            <address>
            <strong>Billed To:</strong><br>
                <?php echo isset($inv->nama_lengkap) ? $inv->nama_lengkap : ''; ?><br>
                <?php echo isset($inv->no_telp) ? $inv->no_telp : ''; ?><br>
                <?php echo isset($inv->email) ? $inv->email : ''; ?><br>
                <?php echo isset($inv->alamat) ? $inv->alamat : ''; ?>
            </address>
        </div>
        <div class="col-xs-6 text-right">
            <address>
            <strong>Shipped To:</strong><br>
            <?php echo isset($inv->nama_penerima) ? $inv->nama_penerima : ''; ?><br>
            <?php echo isset($inv->telp_penerima) ? $inv->telp_penerima : ''; ?><br>
            <?php echo isset($inv->kota_penerima) ? $inv->kota_penerima : ''; ?><br>
            <?php echo isset($inv->alamat_penerima) ? $inv->alamat_penerima : ''; ?>
            </address>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <address>
                <strong>Payment Method:</strong><br>
                <?php echo config_item('nomor-pembayaran-invoice') ?><br>
                <?php echo isset($inv->keterangan) ? $inv->keterangan : ''; ?> <br />
                Mohon setelah melakukan pembayaran, Foto Bukti Pembayaran silahkan kirim ke e-mail : <b>customerservice@scm-mgp.com </b>
            </address>
        </div>
        <div class="col-xs-6 text-right">
            <address>
                <strong>Order Date:</strong><br>
                <?php echo isset($inv->created) ? $inv->created : ''; ?><br><br>
            </address>
        </div>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Order summary</strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <td><strong>Item</strong></td>
                            <td class="text-center"><strong>Price</strong></td>
                            <td class="text-center"><strong>Quantity</strong></td>
                            <td class="text-right"><strong>Totals</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $l):?>
                        <tr>
                            <td><?php echo $l->kode_item;?></td>
                            <td class="text-center"><?php echo number_format($l->harga_item);?></td>
                            <td class="text-center"><?php echo $l->jumlah_item;?></td>
                            <td class="text-right"><?php echo number_format($l->harga_item * $l->jumlah_item);?></td>
                        </tr>
                        <?php $total =+ $l->harga_item * $l->jumlah_item; ?>
                        <?php endforeach;?>
                        <tr>
                            <td class="thick-line"></td>
                            <td class="thick-line"></td>
                            <td class="thick-line text-center"><strong>Subtotal</strong></td>
                            <td class="thick-line text-right"><?php echo number_format($total);?></td>
                        </tr>
                        <tr>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line text-center"><strong>Shipping</strong></td>
                            <td class="no-line text-right">0</td>
                        </tr>
                        <tr>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line text-center"><strong>Total</strong></td>
                            <td class="no-line text-right"><?php echo number_format($total);?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
