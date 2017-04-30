<div class="row" style="height:450px; overflow:auto;  padding-top:20px;">
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


                    <div class="actions" align="center">
                          <a href="<?php echo site_url('product/'.$item->id_barang.'')?>" class="btn btn-primary btn-flat" target="_blank">DETAIL</a>
                    </div>

              </div>
          </section><!-- Shop item / END -->
        </div>

    <?php endforeach; ?>
    <?php else: ?>
      <div class="col-lg-12">

      </div>
  <?php endif; ?>

</div>
