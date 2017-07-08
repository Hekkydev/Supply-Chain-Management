<div class="col-lg-12">

    <div class="row">

    </div>
    <div class="row">

      <?php

          $id_group = $this->account->id_group;
          switch ($id_group) {
            case '1':
                echo $this->scm_library->menu('sppbe','SPPBE','sppbe.svg');
                echo $this->scm_library->menu('scm_agen','AGEN','agen.svg');
                echo $this->scm_library->menu('scm_pangkalan','PANGKALAN','pangkalan.svg');
                echo $this->scm_library->menu('scm_barang/stock_barang','STOCK LPG','stock_lpg.svg');
                echo $this->scm_library->menu('scm_barang','BARANG','barang.svg');
                echo $this->scm_library->menu('kategori','KATEGORI BARANG','barang-kategori.svg');
                echo $this->scm_library->menu('scm_barang_satuan','SATUAN BARANG','barang-kategori.svg');
              break;
            case '2':
              echo $this->scm_library->menu('sppbe','SPPBE','sppbe.svg');
              break;
            case '3':
              echo $this->scm_library->menu('sppbe','SPPBE','sppbe.svg');
              break;
            case '4':
              echo $this->scm_library->menu('sppbe','SPPBE','sppbe.svg');
              echo $this->scm_library->menu('scm_agen','AGEN','agen.svg');
              echo $this->scm_library->menu('scm_pangkalan','PANGKALAN','pangkalan.svg');
              echo $this->scm_library->menu('scm_barang/stock_barang','STOCK LPG','stock_lpg.svg');
              echo $this->scm_library->menu('scm_barang','BARANG','barang.svg');
              break;
            case '5':
              // echo $this->scm_library->menu('sppbe','SPPBE','sppbe.svg');
              echo $this->scm_library->menu('scm_agen','AGEN','agen.svg');
              // echo $this->scm_library->menu('scm_pangkalan','PANGKALAN','pangkalan.svg');
              // echo $this->scm_library->menu('stock_lpg','STOCK LPG','stock_lpg.svg');
              // echo $this->scm_library->menu('scm_barang','BARANG','barang.svg');
              // echo $this->scm_library->menu('kategori','KATEGORI BARANG','barang-kategori.svg');
              // echo $this->scm_library->menu('scm_barang_satuan','SATUAN BARANG','barang-kategori.svg');
              break;

            case '6':


            case '7':


              echo $this->scm_library->menu('scm_pangkalan','PANGKALAN','pangkalan.svg');
              echo $this->scm_library->menu('scm_barang','BARANG','barang.svg');
              break;
            default:

              break;
          }


        ?>



    </div>
</div>
