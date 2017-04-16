<?php include 'header.php'; ?>

    <body>

      <?php include 'navbar.php'; ?>

        <div id="content">

            <!-- Page header / START -->
            <div class="page-header">
                <div class="container">

                    <!-- <div class="row">
                        <div class="col-xs-12 col-md-6 title">
                            <h2>Shop items grid</h2>
                            <h5>An example of shop items in a grid</h5>
                        </div>

                        <div class="col-xs-12 col-md-6 path-tree">
                            <a href="#">Pages</a> /
                            <a href="#">Shop</a> /
                            <a href="#">Grid</a>
                        </div>
                    </div> -->

                </div><!-- Container / END -->
            </div><!-- Page header / END -->

            <div class="container">

                <div class="row">

                    <div class="col-xs-12 col-md-8 col-lg-9">

                      <?php echo $content; ?>

                    </div><!-- Col / END -->

                    <?php include 'sidebar.php'; ?>

                </div><!-- Row / END -->

            </div><!-- Container / END -->

        </div><!-- Content / END -->
<?php include 'footer.php'; ?>
