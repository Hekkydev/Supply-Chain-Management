<div id="item-grid">
  <!-- Filter and ordering -->
  <div class="shop-options">
      <div class="form-inline">
          <label class="control-label">Berdasarkan</label>
          <select class="form-control select">
              <option value="#" selected="selected">Harga (Rendah > Tertinggi)</option>
              <option value="#">Harga (Tertinggi > Terendah)</option>
              <option value="#">Baru di tambahkan</option>
          </select>
      </div>

      <div class="form-inline">
          <label class="control-label">Kategori</label>
          <select class="form-control select">
            <?php foreach ($this->scm_library->kategori() as $k): ?>
              <option value="<?php echo $k->id_kategori?>"><?php echo $k->nama_kategori ?></option>
            <?php endforeach; ?>
          </select>
      </div>

      <div class="clear"></div>

  </div>

  <div class="block shop-grid">

      <div class="row">

        <div class="col-lg-12">
          <div class="row">


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

                            <div class="actions">
                              <a  class="btn btn-white btn-md btn-flat btn-block btn-outline" onclick="product_detail('<?php echo $item->id_barang;?>')">
                                Detail
                              </a>
                                <!-- <a class="btn btn-primary btn-md btn-flat btn-block">
                                    <i class="fa fa-shopping-cart"></i>
                                    Tambah ke keranjang
                                </a> -->

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
        </div>

      </div><!-- Row / END -->

  </div><!-- Shop grid / END -->

  <!-- Paging -->
  <div class="block text-center">


  </div>

</div>
