<div class="col-lg-12">
    <div class="row">

      <?php
          $id_group = $this->account->id_group;
          switch ($id_group) {
                case '1':
                      //echo $this->scm_library->menu('penjualan/create','TRANSAKSI PENJUALAN','laporan-penjualan.svg');
                      //echo $this->scm_library->menu('pembelian/create','TRANSAKSI PEMBELIAN','laporan-pembelian.svg');
                      break;

                case '5':
                      echo $this->scm_library->menu('pembelian/create','TRANSAKSI PEMBELIAN','laporan-pembelian.svg');
                      break;
                case '6':
                      echo $this->scm_library->menu('pembelian/create_transaksi_pembelian_pangkalan','TRANSAKSI PEMBELIAN','laporan-pembelian.svg');
                      break;
                case '7':
                      echo $this->scm_library->menu('pembelian/create_transaksi_pembelian_konsumen','TRANSAKSI PEMBELIAN','laporan-pembelian.svg');
                      break;

          default:

                break;
          }
          ?>

    </div>

</div>
