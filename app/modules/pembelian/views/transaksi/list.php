<div class="panel panel-primary">
  <div class="panel-body">
    <table class=" table-cart table  table-responsive table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Qty</th>
          <th style="text-align:right;">Harga</th>
          <th style="text-align:right;">Total</th>
          <th style="text-align:center;">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php if ($this->cart->contents() == FALSE): ?>
            <tr>
              <td colspan="7" style="text-align:center;">Tidak ada daftar pemesanan barang!</td>
            </tr>
          <?php else: ?>
            <?php $sub_total = 0; $grand_total = 0; ?>
            <?php $no=0;foreach ($this->cart->contents() as $items): ?>
                <tr>
                  <td><?php echo ++$no; ?></td>
                  <td><?php echo $items['id'] ?></td>
                  <td><?php echo $items['name'] ?></td>
                  <td><?php echo $items['qty'] ?></td>
                  <td style="text-align:right;"><?php echo rupiah($items['price']) ?></td>
                  <td style="text-align:right;"><?php echo rupiah($items['qty'] * $items['price']) ?></td>
                  <td style="text-align:center;"><a style="cursor:pointer" onclick="return remove_cart_id('<?php echo $items['rowid']?>')"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php $sub_total = $items['qty'] * $items['price']; ?>
                <?php $grand_total += $sub_total; ?>
              <?php $no++; endforeach; ?>
              <tr>
                <td></td>
                <td colspan="4"><h5 style="font-weight:bold;">TOTAL HARGA</h5></td>
                <td><h5 style="font-weight:bold;text-align:right;"><?php echo rupiah($grand_total) ?></h5></td>
                <td></td>
              </tr>
        <?php endif; ?>
      </tbody>
    </table>

  </div>
</div>
