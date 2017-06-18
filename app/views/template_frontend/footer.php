
        <!-- Footer / START -->
        <footer class="footer">
            <div class="container">

                <span class="copyright">
                    Copyright 2017  Supply Chain Management
                </span>

                <span class="links">
                    <a href="#">Aturan Layanan</a>
                    <a href="#">Hukum Privasi</a>
                </span>

            </div>
        </footer><!-- Footer / END -->

        <script src="<?php echo base_url()?>/assets/jquery/external/jquery.js"></script>
        <!-- <script src="<?php echo base_url()?>/assets/front/js/main.js"></script>
        <script src="<?php echo base_url()?>/assets/bootstrap/js/bootstrap.min.js"></script> -->
        <script type="text/javascript">
          function product_detail(num)
          {
              window.location.href = "<?php echo base_url('product')?>/"+num;

          }
        </script>
    </body>
</html>