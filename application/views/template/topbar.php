</head>
<body class="skin-black">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <a href="#" class="logo"><img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/logo.png') ?>" alt="<?php echo $app_title_logo; ?>" style="width:155px; margin-top:-5px;"></a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" id="toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo site_url('home')?>"><i class="fa fa-th"></i></a></li>
                        <li><a><i class="fa fa-desktop"></i></a></li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span class="hidden-xs">SUPER ADMIN</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/avatar3.png') ?>" class="img-rounded" alt="User Image" />
                                    <p>
                                        Super Admin
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                              
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat btn-block">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="" class="btn btn-default btn-flat">History</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                         <li><a href="<?php echo site_url('auth/logout') ?>"><i class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->