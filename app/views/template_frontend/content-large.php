<?php include 'header.php'; ?>

    <body>

      <?php include 'navbar.php'; ?>

        <div id="content">

          <?php if ($title_page == TRUE): ?>
            <!-- Page header / START -->
            <div class="page-header">
                <div class="container">

                    <div class="row">
                        <div class="col-xs-12 col-md-6 title">
                            <h2><?php echo strtoupper($title_page); ?></h2>
                        </div>

                        <div class="col-xs-12 col-md-6 path-tree">
                            <a href="<?php echo base_url('');?>">Home</a> /
                            <a ><?php echo ucfirst($title_page); ?></a>
                        </div>
                    </div>

                </div><!-- Container / END -->
            </div><!-- Page header / END -->
          <?php endif; ?>

            <div class="container">

                <div class="row">

                    <div class="col-xs-12 ">

                      <?php echo $content; ?>

                    </div><!-- Col / END -->

                </div><!-- Row / END -->

            </div><!-- Container / END -->

        </div><!-- Content / END -->
<?php include 'footer.php'; ?>
