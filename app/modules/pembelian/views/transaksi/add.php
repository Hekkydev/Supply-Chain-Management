<style media="screen">
  .table-cart{
    font-size: 13px !important;
    width: 100%;
  }
</style>


<div class="row" style="margin-top:20px;">
    <div class="col-lg-offset-1 col-lg-10">
      <?php $session = $this->session->flashdata('message');
        if ($session == TRUE) {
        ?>
            <div class="alert" align="center">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $session; ?>
                <br>
            </div>
        <?php
      }

      if($this->session->flashdata('kode_pembelian') == TRUE){
        $kode_pembelian = $this->session->flashdata('kode_pembelian');
        redirect(site_url('pembelian/invoicePembelian/'.$kode_pembelian.''));
      }
       ?>
    </div>
    <form class="" action="<?php echo site_url('pembelian/pembelian/add_to_transaksi')?>" method="post">
      <div class="col-lg-offset-1 col-lg-10">
        <div class="row">
            <div class="col-lg-6">
              <div class="form-horizontal">
                  <div class="form-group">
                      <label class="control-label col-lg-4">Kode Pembelian</label>
                      <div class="col-lg-8">
                          <input type="text" name="kode_pembelian"  class="form-control" value="<?php echo $kode_pembelian ?>" readonly="">
                      </div>
                  </div>
                   <div class="form-group">
                      <label class="control-label col-lg-4">Tanggal Pembelian</label>
                      <div class="col-lg-8">
                          <input type="text" name="tanggal_pembelian" value="<?php echo date('Y-m-d')?>" class="form-control" readonly="">
                      </div>
                  </div>
                   <div class="form-group">
                      <label class="control-label col-lg-4">Pelanggan</label>
                      <div class="col-lg-8">
                          <input type="text"  value="<?php echo $account->nama_lengkap ?>" class="form-control" readonly="">
                          <input type="hidden" name="id_user" value="<?php echo $account->id_user?>">
                      </div>
                  </div>
                   <div class="form-group">
                      <label class="control-label col-lg-4">Note:</label>
                      <div class="col-lg-8">

                         <textarea name="keterangan" id="keterangan" class="form-control" rows="3" required="required"></textarea>

                      </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-lg-4">Transaksi:</label>
                     <div class="col-lg-8">
                          <div class="row">
                            <div class="col-lg-5">
                              <button type="button" class="btn btn-md btn-warning btn-flat" data-toggle="modal" data-target="#item" onclick="return list_item();">PILIH BARANG</button>
                      
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-md btn-primary btn-flat" ><i class="fa fa-save"></i> SIMPAN TRANSAKSI</button>
                        
                            </div>
                          </div>
                     </div>
                 </div>
                  <hr>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-horizontal">
                  <div class="form-group">
                      <label class="control-label col-lg-4">Penerima</label>
                      <div class="col-lg-8">
                          <input type="text" name="nama_penerima"  class="form-control" value="" required="">
                      </div>
                  </div>
                   <div class="form-group">
                      <label class="control-label col-lg-4">Telp Penerima</label>
                      <div class="col-lg-8">
                          <input type="text"  class="form-control" name="telp_penerima" required="">
                      </div>
                  </div>
                   <div class="form-group">
                      <label class="control-label col-lg-4">Kota:</label>
                      <div class="col-lg-8">
                          <input type="text" class="form-control" name="kota_penerima" required="">

                      </div>
                  </div>
                   <div class="form-group">
                      <label class="control-label col-lg-4">Alamat Penerima:</label>
                      <div class="col-lg-8">

                         <textarea name="alamat_penerima" id="alamat_penerima" class="form-control" rows="3" required="required"></textarea>

                      </div>
                  </div>

                  <hr>
              </div>
            </div>
        </div>
      </div>
    </form>

    <div class="col-lg-offset-1 col-lg-10">
      <div class="row">
        <div class="col-lg-12"  style="margin-bottom:20px;">
          <h4>DAFTAR PEMESANAN BARANG</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12" id="postList">


        </div>
      </div>
    </div>
</div>


<!-- Modal -->
<div id="item" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Data Barang</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-8">
                  <div class="form-group">
                    <input type="text" id="search_barang"  class="form-control" placeholder="cari nama item">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <button type="button" name="button" class="btn btn-block btn-flat btn-danger"><i class="fa fa-search"></i>  SEARCH</button>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <br>
        <div class="row"  style="height:350px; overflow:auto; border-top:1px solid red; border-bottom:1px solid #ddd; padding-top:20px;">

            <div class="DaftarItems">

            </div>

        </div>
      </div>
    </div>

  </div>
</div>
<script src="<?php echo site_url('assets/jquery/external/jquery/jquery.js')?>"></script>
<script type="application/javascript">

  $(function(){
      $('#search_barang').keyup(function(){
        var nama_barang = $('input[id=search_barang]').val();
          $.ajax({
            url:'<?php echo site_url('scm_barang/scm_barang/search_item')?>',
            type:'POST',
            cache:false,
            data:{
              nama_barang : nama_barang,
            },
            success:function(html){
             $('.DaftarItems').html(html);
            },
          });
  });
      listData();
  });


  function add_to_cart(id_barang) {
    var barang = $('#barangId-'+id_barang);
    var  nilai = barang.val();
    if (nilai == 0 || nilai == "") {
      alert('Jumlah data Kosong');
    }else{
      $.ajax({
        url: $('#barangForm-'+id_barang).attr('action'),
        type: 'POST',
        cache:false,
        data: {id_barang:id_barang,qty:nilai},
        dataType:'json',
        success:function(response)
        {
            alert(response.message);
            listData();

        }
      }).done(function (){
        var  nilai = barang.val('');
      });
    }

  }



  function listData()
  {
    $.ajax({
      url: '<?php echo site_url('pembelian/pembelian/cartlist')?>',
      type: 'POST',
      cache:false,
      success:function(html)
      {
        $('#postList').html(html);
      }
    });
  }

  function remove_cart_id(id_barang)
  {
    $.ajax({
      url: '<?php echo site_url('pembelian/pembelian/remove_cart_id').'?rowid='; ?>'+id_barang,
      type: 'GET',
      cache:false,
      success:function(html)
      {
        listData();
      }
    });
  }

  function list_item()
  {
    $.ajax({
      url: '<?php echo site_url('pembelian/pembelian/itemsList')?>',
      type: 'POST',
      cache:false,
      success:function(html)
      {
        $('.DaftarItems').html(html);
      }
    });
  }


</script>
