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
           echo $this->scm_library->menu('pengiriman/','PENGIRIMAN ISI LPG','report1.svg');
          break;


         case '3':
           echo $this->scm_library->menu('/pengiriman','PENGIRIMAN ISI LPG','report1.svg');
           break;


         case '4': // Admin Agen

            // echo $this->scm_library->menu('pembelian','LAPORAN DATA PANGKALAN','pangkalan.svg');
            // echo $this->scm_library->menu('penjualan','PENJUALAN','laporan-penjualan.svg');
            // echo $this->scm_library->menu('penjualan','PENYALURAN BARANG KE AGEN','laporan-gas.svg');
            // echo $this->scm_library->menu('penjualan','REALISASI  PENYALURAN ANTAR PANGKALAN','pangkalan.svg');
            echo $this->scm_library->menu('penyaluran/rencana','LAPORAN RENCANA PENYALURAN','rencana-penyaluran.svg');
            echo $this->scm_library->menu('penyaluran/realisasi','LAPORAN REALISASI PENYALURAN','report-print.svg');
            echo $this->scm_library->menu('pemesanan_konsumen','LAPORAN TRANSAKSI PEMESANAN KONSUMEN','report-transact.svg');
             echo $this->scm_library->menu('pembelian/laporan_pembelian_pangkalan','LAPORAN PEMBELIAN PANGKALAN','laporan-real.svg');
            echo $this->scm_library->menu('pengiriman/using_agen','PENGIRIMAN ISI LPG','report1.svg');
            break;
         case '5':
            echo $this->scm_library->menu('pemesanan_lpg/using_uagen','PEMESANAN ISI LPG','laporan-gas.svg');
            echo $this->scm_library->menu('penyaluran/rencana','LAPORAN RENCANA PENYALURAN','rencana-penyaluran.svg');
            echo $this->scm_library->menu('penyaluran/realisasi','LAPORAN REALISASI PENYALURAN','report-print.svg');
          break;
          case '6': /* Pangkalan*/
  		      echo $this->scm_library->menu('penyaluran/rencana','LAPORAN RENCANA PENYALURAN','rencana-penyaluran.svg');
            echo $this->scm_library->menu('penyaluran/realisasi','LAPORAN PENYALURAN LPG','report-print.svg');
            echo $this->scm_library->menu('laporan/laporan-faktur','LAPORAN FAKTUR','report-print.svg');
          break;
   default:

     break;
 }
?>

</div>
