 <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('kategori/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('kategori/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('kategori'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Kategori</th>
                <th>Action</th>
                </tr>
                <?php
                foreach ($kategori_data as $kategori)
                {
                ?>
                <tr>
                <td width="80px"><?php echo ++$start ?></td>
                 <td width="80px"><?php echo $kategori->kode_kategori ?></td>
                <td><?php echo $kategori->nama_kategori ?></td>
                <td style="text-align:center" width="200px">
                    <?php 
                    echo anchor(site_url('kategori/read/'.$kategori->id_kategori),'Read'); 
                    echo ' | '; 
                    echo anchor(site_url('kategori/update/'.$kategori->id_kategori),'Update'); 
                    echo ' | '; 
                    echo anchor(site_url('kategori/delete/'.$kategori->id_kategori),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                    ?>
                </td>
                </tr>
                <?php
                }
                ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>