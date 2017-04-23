<section id="shop-detail">

                 <div class="col-xs-12 col-md-12 col-lg-12 shop-detail">

                     <!-- Shop item / START -->
                     <div class="shop-item">

                         <div class="title">
                             <span class="pull-left"><?php echo $item->nama_barang ?></span>
                             <span class="price pull-right"><?php echo 'Rp, '.rupiah($item->harga_jual); ?></span>

                             <div class="clear"></div>
                         </div>

                         <div id="image" class="gallery carousel slide" data-wrap="false">
                             <div class="carousel-outer">

                                 <!-- Wrapper for slides -->
                                 <div class="carousel-inner active">
                                     <div class="item active">
                                         <img src="<?php echo base_url().'upload/'.$item->gambar?>" alt="Image 5"/>
                                     </div>
                                </div>
                             </div>


                         </div>



                         <div class="page-subheader">
                             <h1>INFORMASI PRODUK</h1>
                         </div>

                         <!-- Object info / START -->
                         <div class="block">

                             <div class="row datalist">
                                <div class="col-lg-12">
                                  <div class="info">
                                    <span class="control-label">Keterangan:</span>
                                    <br>
                                    <p style="color:#333; font-weight:100;">
                                      <?php echo $item->keterangan ?>
                                    </p>
                                  </div>
                                </div>
                                 <div class="col-xs-12 col-sm-12 col-lg-6">

                                     <div class="info">
                                         <span class="key">Kode Barang:</span>
                                         <span class="value"><?php echo $item->kode_barang; ?></span>
                                     </div>

                                     <div class="info">
                                         <span class="key">Nama Barang:</span>
                                         <span class="value"><?php echo $item->nama_barang ?></span>
                                     </div>

                                     <div class="info">
                                         <span class="key">Kategori Brang:</span>
                                         <span class="value"><?php echo $item->nama_kategori ?></span>
                                     </div>



                                 </div><!-- Col / END -->

                                 <div class="col-xs-12 col-sm-12 col-lg-6">

                                     <div class="info">
                                         <span class="key">Harga Barang:</span>
                                         <span class="value"><?php echo rupiah($item->harga_jual) ?></span>
                                     </div>

                                     <div class="info">
                                         <span class="key">Satuan:</span>
                                         <span class="value"><?php echo $item->tipe_satuan ?></span>
                                     </div>
                                     <div class="info">
                                         <span class="key">Status:</span>
                                         <span class="value"><?php echo ucfirst($item->tipe_status) ?></span>
                                     </div>

                                 </div><!-- Col / END -->

                             </div><!-- Row / END -->

                         </div><!-- Block / END -->



                     </div><!-- Shop item / END -->

                 </div><!-- Shop detail / END -->

             </section>
