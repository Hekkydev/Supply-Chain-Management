<!-- Navigation / START -->
<nav class="navbar navbar-default" style="background:#ddd">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Show menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" id="logo" href="<?php echo site_url('');?>">
                <img src="<?php echo base_url()?>/assets/AdminLTE-2.0.5/dist/img/logo-login.png" alt="Pertagas" class="img-responsive" style="width:200px;margin-top:-20px;">
            </a>
        </div>


        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">

                <li>
                    <a href="<?php echo site_url('')?>">
                        Halaman Utama
                    </a>

                </li>
                <li>
                    <a href="<?php echo site_url('product')?>">
                        Supply Chain
                    </a>

                </li>
                <li>
                    <a href="<?php echo site_url('client_area')?>">
                        Client Area
                    </a>

                </li>
                <li>
                    <a href="<?php echo site_url('hubungi_kami')?>">
                        Hubungi kami
                    </a>

                </li>



            </ul>

        </div>

    </div>

</nav><!-- Navigation / END -->
