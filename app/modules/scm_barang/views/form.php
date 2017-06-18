<?php echo form_open_multipart($action);?>
<input type="hidden" name="id_user" value="<?php echo $id_user;?>">
        <div class="row">
          <div class="col-lg-12">
                <div class="row">
                      <div class="col-lg-4">

                          <div class="form-group">
                              <label for="varchar">Kode Barang <?php echo form_error('kode_barang') ?></label>
                              <input type="text" class="form-control" name="kode_barang" id="kode_barang" value="<?php echo $kode_barang; ?>" readonly="" />
                          </div>

                          <div class="form-group">
                                <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
                            </div>

                            <div class="form-group">
                                  <label for="int">Stock <?php echo form_error('stock') ?></label>
                                  <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock" value="<?php echo $stock; ?>" />
                              </div>

                          <div class="form-group">
                                <label for="int">Satuan <?php echo form_error('satuan') ?></label>
                                <select type="text" class="form-control" name="id_satuan" id="id_satuan">
                                  <?php foreach ($satuan as $s): ?>
                                    <?php if ($id_satuan == $s->id_satuan): ?>
                                        <option value="<?php echo $s->id_satuan ?>" selected=""><?php echo $s->tipe_satuan ?></option>
                                      <?php else: ?>
                                        <option value="<?php echo $s->id_satuan ?>"><?php echo $s->tipe_satuan ?></option>
                                    <?php endif; ?>

                                  <?php endforeach; ?>
                                </select>
                            </div>

                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                              <label for="int">Jenis Kategori <?php echo form_error('id_kategori') ?></label>

                              <select class="form-control" name="id_kategori" id="id_kategori">

                                <?php foreach ($kategori_barang as $kategori): ?>
                                  <?php if ($id_kategori == $kategori->id_kategori): ?>
                                    <option value="<?php echo $id_kategori?>" selected=""><?php echo $kategori->nama_kategori?></option>
                                  <?php else: ?>
                                    <option value="<?php echo $kategori->id_kategori?>"><?php echo $kategori->nama_kategori?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>


                          </div>
                        <div class="form-group">
                              <label for="decimal">Harga Jual <?php echo form_error('harga_jual') ?></label>
                              <input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual" value="<?php echo $harga_jual; ?>" />
                          </div>
                          <div class="form-group">
                                <label for="decimal">Harga Beli <?php echo form_error('harga_beli') ?></label>
                                <input type="text" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli" value="<?php echo $harga_beli; ?>" />
                            </div>
                            <div class="form-group">
                                  <label for="decimal">Diskon <?php echo form_error('diskon') ?></label>
                                  <input type="text" class="form-control" name="diskon" id="diskon" placeholder="Diskon" value="<?php echo $diskon; ?>" />
                              </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                              <label for="gambar">Gambar <?php echo form_error('gambar') ?></label>
                              <input type="file" name="gambar" class="form-control">
                        </div>

                          <div class="form-group">
                                <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
                                <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
                            </div>

                        <?php if ($gambar == TRUE): ?>
                            <div class="form-group">
                              <img src="<?php echo base_url('upload/'.$gambar.'')?>" alt="" class="img-responsive" style="width:150px;">
                            </div>
                        <?php endif; ?>

                      </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <input type="hidden" name="created" value="<?php echo $created; ?>" />
                    <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" />
                   <button type="submit" class="btn btn-primary" name="submit"><?php echo $button ?></button>
                   <a href="<?php echo site_url('scm_barang') ?>" class="btn btn-default">Cancel</a>
                  </div>
                </div>
          </div>
        </div>
<?php echo form_close(); ?>
