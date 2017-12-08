<div class="row">
  <?php
  $id_group = $this->account->id_group;
  switch ($id_group) {
    case '1':
          echo $this->scm_library->menu('transaksi_pembelian/create','INPUT RENCANA','rencana-penyaluran.svg');
          echo $this->scm_library->menu('transaksi_pembelian/create','INPUT REALISASI','rencana-penyaluran.svg');
          //echo $this->scm_library->menu('menu/order_agen','PEMESANAN KE AGEN','agen.svg');
          //echo $this->scm_library->menu('menu/order_sppbe','PEMESANAN KE SPPBE','sppbe.svg');
          break;
    case '4':
          echo $this->scm_library->menu('penyaluran/add_rencana','INPUT RENCANA PENYALURAN','rencana-penyaluran.svg');
          echo $this->scm_library->menu('penyaluran/add_realisasi','INPUT REALISASI PENYALURAN','report-print.svg');
          
          // echo $this->scm_library->menu('menu/order_sppbe','PEMESANAN KE SPPBE','sppbe.svg');
          break;
 default:

   break;
}
?>
</div>
