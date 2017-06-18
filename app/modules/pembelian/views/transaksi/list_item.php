<?php if ($item == TRUE): ?>
  <?php foreach ($item as $item): ?>
    <div class="col-lg-4">
        <!-- Shop item / START -->
        <section style="padding:5px; border:1px solid ; border-color: #ddd; height:300px; margin-bottom:10px;">
            <div class="shop-grid-item" style="cursor:pointer;" >

                <div class="image" align="center">
                    <a >
                        <img src="<?php echo base_url().'upload/'.$item->gambar?>" alt="Shop item image" class="img-responsive" style="height:160px;"/>
                    </a>
                </div>

                <div class="title" align="center">
                    <h3><a ><?php echo $item->nama_barang ?></a></h3>
                </div>
                <div class="price" align="center">
                    <h4><?php echo 'Rp, '.rupiah($item->harga_jual) ?></h4>
                </div>

                <form id="barangForm-<?php echo $item->id_barang;?>"  method="post" action="<?php echo site_url('pembelian/pembelian/add_to_cart')?>">
                  <div class="actions">
                    <div class="input-group">
                      <input type="hidden" name="id_barang" value="<?php echo $item->id_barang?>">
                      <input type="number" class="form-control" placeholder="" id="barangId-<?php echo $item->id_barang;?>" min="0" name="value">
                      <span class="input-group-addon"  onclick="add_to_cart('<?php echo $item->id_barang;?>')"><i class="fa fa-plus"></i></span>
                  </div>
                  </div>
                </form>

            </div>
        </section><!-- Shop item / END -->
      </div>

  <?php endforeach; ?>
  <?php else: ?>
    <div class="col-lg-12" align="center">
            <h3>Tidak ada daftar nama item</h3>
    </div>
<?php endif; ?>
