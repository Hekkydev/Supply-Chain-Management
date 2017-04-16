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

                         <div class="row">
                             <div class="col-xs-12 col-sm-6 col-lg-4 shopping-actions pull-right">


                                 <div class="row">
                                     <div class="col-xs-5">
                                         <div class="form-group">
                                             <label class="control-label">Quantity</label>
                                         </div>
                                     </div>
                                     <div class="col-xs-7">
                                         <input value="1" min="1" type="number" class="form-control input"/>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <button class="btn btn-primary btn-block">
                                         <i class="fa fa-shopping-cart"></i>
                                         Tambahkan Ke Keranjang
                                     </button>
                                 </div>

                             </div>

                             <div class="col-xs-12 col-sm-6 col-lg-8 description">
                                 <?php echo $item->keterangan ?>
                             </div>
                         </div><!-- Row / END -->

                         <div class="page-subheader">
                             <h1>DETAIL BARANG</h1>
                         </div>

                         <!-- Object info / START -->
                         <div class="block">

                             <div class="row datalist">

                                 <div class="col-xs-12 col-sm-12 col-lg-6">

                                     <div class="info">
                                         <span class="key">Color:</span>
                                         <span class="value">Red</span>
                                     </div>

                                     <div class="info">
                                         <span class="key">Type:</span>
                                         <span class="value">Rubbish</span>
                                     </div>

                                     <div class="info">
                                         <span class="key">Year:</span>
                                         <span class="value">1999</span>
                                     </div>

                                     <div class="info">
                                         <span class="key">Status:</span>
                                         <span class="value">Used</span>
                                     </div>

                                 </div><!-- Col / END -->

                                 <div class="col-xs-12 col-sm-12 col-lg-6">

                                     <div class="info">
                                         <span class="key">Initial price:</span>
                                         <span class="value">1,000 €</span>
                                     </div>

                                     <div class="info">
                                         <span class="key">Category:</span>
                                         <span class="value">Things</span>
                                     </div>

                                     <div class="info">
                                         <span class="key">Code:</span>
                                         <span class="value">#29843657387</span>
                                     </div>

                                     <div class="info">
                                         <span class="key">Focus:</span>
                                         <span class="value">14</span>
                                     </div>

                                 </div><!-- Col / END -->

                             </div><!-- Row / END -->

                         </div><!-- Block / END -->



                     </div><!-- Shop item / END -->

                 </div><!-- Shop detail / END -->

             </section>
