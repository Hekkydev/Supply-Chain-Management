<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/avatar3.png') ?>" class="img-responsive" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo $account->nama_lengkap ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="<?php echo site_url('scm_barang/index')?>" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit'  id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

          <?php foreach ($menu as $m): ?>
          <?php if ($m->id_status == 1): ?>
            <li class="<?php echo active_link('/'.$m->link);?>">
                <a href="<?php echo site_url($m->link)?>">
                    <i class="fa <?php echo $m->icon ?>"></i> <span><?php echo $m->nama_menu ?></span> <i class="fa fa-caret-square-o-right pull-right"></i>
                </a>
            </li>
          <?php endif; ?>
          <?php endforeach; ?>
          <?php if ($account->id_group == 1): ?>
            <li class="<?php echo active_link('/inbox')?>">
              <a href="<?php echo site_url('inbox')?>">
                <i class="fa fa-file-text-o"></i><span>Inbox</span><i class="fa fa-caret-square-o-right pull-right"></i>
              </a>
            </li>
            <li class="<?php echo active_link('/menu/setting')?>">
              <a href="<?php echo site_url('menu/setting')?>">
                <i class="fa fa-cog"></i><span>Menu Setting</span><i class="fa fa-caret-square-o-right pull-right"></i>
              </a>
            </li>
          <?php endif; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
