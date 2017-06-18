

<table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Stock Awal</th>
        <th>Satuan</th>
        <th>Harga Jual</th>
        <th>Harga Beli</th>
        <th>Kategori</th>
    </tr>
    <?php
          $start = 0;
            foreach ($scm_barang_data as $scm_barang)
            {
                ?>
        <tr>
            <td width="80px" >
                <div align="center">
                  <?php echo ++$start ?>
                </div>
            </td>
            <td>
                <?php echo $scm_barang->kode_barang ?>
            </td>
            <td>
                <?php echo $scm_barang->nama_barang ?>
            </td>
            <td>
                <div align="center">
                <?php echo $scm_barang->stock ?>
              </div>
            </td>
            <td>
                <?php echo $scm_barang->tipe_satuan ?>
            </td>
            <td>
                <?php echo $scm_barang->harga_jual ?>
            </td>
            <td>
                <?php echo $scm_barang->harga_beli ?>
            </td>
            <td>
                <?php echo $scm_barang->nama_kategori ?>
            </td>

        </tr>
        <?php
            }
            ?>
</table>
