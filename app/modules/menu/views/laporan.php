<div class="row">

  <?php

      $id_group = $this->account->id_group;
      switch ($id_group) {
        case '1': // Super admin
           echo $this->scm_library->menu('penyaluran/rencana','PERENCANAAN PENYALURAN','rencana-penyaluran.svg');
           echo $this->scm_library->menu('penyaluran/realisasi','REALISASI PENYALURAN','realisasi-penyaluran.svg');
           echo $this->scm_library->menu('pembelian','PEMBELIAN','laporan-pembelian.svg');
           echo $this->scm_library->menu('penjualan','PENJUALAN','laporan-penjualan.svg');
           echo $this->scm_library->menu('penjualan','PENYALURAN BARANG KE AGEN','laporan-gas.svg');
           echo $this->scm_library->menu('penjualan','REALISASI  PENYALURAN ANTAR PANGKALAN','pangkalan.svg');
           break;

         case '2': // User SPPBE
           echo $this->scm_library->menu('/','PENGIRIMAN ISI LPG','laporan-gas.svg');
          break;


         case '3':
           echo $this->scm_library->menu('/pengiriman','PENGIRIMAN ISI LPG','laporan-gas.svg');
           break;


         case '4': // Admin Agen

            // echo $this->scm_library->menu('pembelian','LAPORAN DATA PANGKALAN','pangkalan.svg');
            // echo $this->scm_library->menu('penjualan','PENJUALAN','laporan-penjualan.svg');
            // echo $this->scm_library->menu('penjualan','PENYALURAN BARANG KE AGEN','laporan-gas.svg');
            // echo $this->scm_library->menu('penjualan','REALISASI  PENYALURAN ANTAR PANGKALAN','pangkalan.svg');
            echo $this->scm_library->menu('penyaluran/rencana','LAPORAN RENCANA PENYALURAN','rencana-penyaluran.svg');
            echo $this->scm_library->menu('penyaluran/realisasi','LAPORAN REALISASI PENYALURAN','realisasi-penyaluran.svg');
            echo $this->scm_library->menu('pemesanan_konsumen','LAPORAN TRANSAKSI PEMESANAN KONSUMEN','laporan-gas.svg');
            break;
         case '5':

            echo $this->scm_library->menu('pembelian','LAPORAN DATA PANGKALAN','pangkalan.svg');
            echo $this->scm_library->menu('penjualan','PENJUALAN','laporan-penjualan.svg');
            echo $this->scm_library->menu('penjualan','PENYALURAN BARANG KE AGEN','laporan-gas.svg');
            echo $this->scm_library->menu('penjualan','REALISASI  PENYALURAN ANTAR PANGKALAN','pangkalan.svg');
            break;
   default:

     break;
 }
?>

</div>
