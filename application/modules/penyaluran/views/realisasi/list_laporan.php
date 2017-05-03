<div class="row">
  <div class="col-lg-12" style="overflow:scroll" >
    <style media="screen">
      table th{
          text-align: center;
      }
    </style>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th width="20px;" rowspan="2">No</th>
              <th width="200px;" rowspan="2">Sub Penyalur / Pangkalan</th>
              <th rowspan="2">Kelurahan</th>
              <th rowspan="2">Alokasi</th>
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
                <tr>
                  <td><?php echo ++$no; ?></td>
                  <td ><?php echo $p->nama_pangkalan ?></td>
                  <td><?php echo $p->kelurahan ?></td>
                  <td></td>
                  <?php for($i =1 ; $i <=30 ;$i++):?>
                    <th></th>
                  <?php endfor;?>
                </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
  </div>
</div>
