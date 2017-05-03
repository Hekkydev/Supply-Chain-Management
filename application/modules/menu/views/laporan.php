<div class="row">

  <?php

      $id_group = $this->account->id_group;
      switch ($id_group) {
        case '1':
           echo $this->scm_library->menu('penjualan','PERENCANAAN PENYALURAN','rencana-penyaluran.svg');
           echo $this->scm_library->menu('penjualan','REALISASI PENYALURAN','realisasi-penyaluran.svg');
           echo $this->scm_library->menu('pembelian','PEMBELIAN','laporan-pembelian.svg');
           echo $this->scm_library->menu('penjualan','PENJUALAN','laporan-penjualan.svg');
           echo $this->scm_library->menu('penjualan','PENYALURAN BARANG KE AGEN','laporan-gas.svg');
           echo $this->scm_library->menu('penjualan','REALISASI  PENYALURAN ANTAR PANGKALAN','pangkalan.svg');
           break;
         case '4':

            // echo $this->scm_library->menu('pembelian','LAPORAN DATA PANGKALAN','pangkalan.svg');
            // echo $this->scm_library->menu('penjualan','PENJUALAN','laporan-penjualan.svg');
            // echo $this->scm_library->menu('penjualan','PENYALURAN BARANG KE AGEN','laporan-gas.svg');
            // echo $this->scm_library->menu('penjualan','REALISASI  PENYALURAN ANTAR PANGKALAN','pangkalan.svg');
            echo $this->scm_library->menu('penyaluran/rencana','LAPORAN RENCANA PENYALURAN','rencana-penyaluran.svg');
            echo $this->scm_library->menu('penyaluran/realisasi','LAPORAN REALISASI PENYALURAN','realisasi-penyaluran.svg');
            echo $this->scm_library->menu('pembelian','LAPORAN TRANSAKSI PEMBELIAN KONSUMEN','laporan-gas.svg');
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
