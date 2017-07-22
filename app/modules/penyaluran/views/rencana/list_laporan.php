
<div class="row">
  <div class="col-lg-12" style="overflow:scroll" >
    <style media="screen">
      table th{
          text-align: center;

      }
      .table-laporan{
        border:1px solid #06257e;
      }

      ::-webkit-scrollbar {
        width: 1em;
      }

      ::-webkit-scrollbar-track {
          -webkit-box-shadow: inset 0 0 1px rgba(0,0,0,0.3);
      }

      ::-webkit-scrollbar-thumb {
        background-color: darkgrey;
        outline: 1px solid slategrey;
      }
    </style>
        <table class="table table-bordered table-striped table-laporan">
          <thead class="bg-blue">
            <tr>
              <th width="20px;" rowspan="2" style="padding-bottom:20px;">No</th>
              <th width="200px;" rowspan="2" style="padding-bottom:20px;">Sub Penyalur / Pangkalan</th>
              <th rowspan="2" style="padding-bottom:20px;">Kelurahan</th>
              <th rowspan="2" style="padding-bottom:20px;">Alokasi</th>
              <th colspan="30"> TANGGAL</th>
            </tr>
            <tr>

              <?php for($i =1 ; $i <=30 ;$i++):?>
                <th><?php echo $i ?></th>
              <?php endfor;?>
            </tr>
          </thead>
          <tbody>
            <?php $no=0; foreach ($pangkalan as $p): ?>
              <?php if ($post['kode_pangkalan'] == NULL): ?>
                <tr>
                  <td><?php echo ++$no; ?></td>
                  <td ><?php echo $p->nama_pangkalan ?></td>
                  <td><?php echo $p->kelurahan ?></td>
                  <td></td>
                  <?php for($i =1 ; $i <=30 ;$i++):?>
                  <?php
                  $tanggal = $post['tahun'].'-'.$post['bulan'].'-'.$i;
                  $kode_barang = $post['kode_barang'];
                  $kode_pangkalan = $p->kode_pangkalan;
                  $kode_agen = $post['kode_agen'];
                  $jumlah_penyaluran = $this->scm_library->penyaluran_data($tanggal,$kode_barang,$kode_agen,$kode_pangkalan,2);
                  ?>
                  <th><?php echo ($jumlah_penyaluran == 0) ? '-' : $jumlah_penyaluran; ?></th>
                  <?php endfor;?>
                </tr>
                <?php else: ?>
                <?php if ($post['kode_pangkalan'] == $p->kode_pangkalan): ?>
                  <tr>
                    <td><?php echo ++$no; ?></td>
                    <td ><?php echo $p->nama_pangkalan ?></td>
                    <td><?php echo $p->kelurahan ?></td>
                    <td></td>
                    <?php for($i =1 ; $i <=30 ;$i++):?>
                    <?php
                    $tanggal = $post['tahun'].'-'.$post['bulan'].'-'.$i;
                    $kode_barang = $post['kode_barang'];
                    $kode_pangkalan = $p->kode_pangkalan;
                    $kode_agen = $post['kode_agen'];
                    $jumlah_penyaluran = $this->scm_library->penyaluran_data($tanggal,$kode_barang,$kode_agen,$kode_pangkalan,2);
                    ?>
                    <th><?php echo ($jumlah_penyaluran == 0) ? '-' : $jumlah_penyaluran; ?></th>
                    <?php endfor;?>
                  </tr>
                <?php endif; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </tbody>
        </table>

         <a class="btn btn-danger btn-xs btn-flat" onClick="pdf()" style="text-align:center">Export to PDF</a>
         
    <br> <br> 
  </div>
</div>
