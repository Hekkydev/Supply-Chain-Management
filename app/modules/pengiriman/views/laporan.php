<?php include 'form-search.php'; ?>
<br>
<!-- <table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Tanggal Pengiriman</th>
      <th>Kode SPPBE</th>
      <th>Plant</th>
      <th>No. Lo</th>
      <th>Qty (Pcs)</th>
      <th>Qty (Kg)</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pengiriman as $p): ?>

        <tr>
          <td><?php echo ++$start; ?></td>
          <td><?php echo $p->tanggal_pengiriman ?></td>
          <td><?php echo $p->kode_sppbe ?></td>
          <td><?php echo $p->plant ?></td>
          <td><?php echo $p->no_lo ?></td>
          <td><?php echo $p->qty_pcs ?></td>
          <td><?php echo $p->qty_kg ?></td>
          <td></td>
        </tr>
    <?php  endforeach; ?>
  </tbody>
</table>

<div class="pagination">
  <?php echo $pagination ?>
</div> -->
