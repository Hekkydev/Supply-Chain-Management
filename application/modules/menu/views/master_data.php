<div class="col-lg-12">
    <div class="row">

      <?php

          $id_group = $this->account->id_group;
          switch ($id_group) {
            case '1':
                echo $this->scm_library->menu('sppbe','SPPBE','sppbe.svg');
                echo $this->scm_library->menu('scm_agen','AGEN','agen.svg');
                echo $this->scm_library->menu('scm_pangkalan','PANGKALAN','pangkalan.svg');
                echo $this->scm_library->menu('stock_lpg','STOCK LPG','stock_lpg.svg');
                echo $this->scm_library->menu('scm_barang','BARANG','barang.svg');
                echo $this->scm_library->menu('kategori','KATEGORI BARANG','barang-kategori.svg');
              break;
            case '2':
            
              break;
            default:

              break;
          }


        ?>



    </div>
</div>
