<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $app_title; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/square/blue.css') ?>" rel="stylesheet" type="text/css" />
        <link rel="icon" type="image/x-icon" href="<?php echo site_url('assets/AdminLTE-2.0.5/dist/img/Elpiji.png') ?>">
        <link href="<?php echo base_url('assets/loading.css') ?>" rel="stylesheet" type="text/css" />

    </head>
    <body class="login-page">
        <div class="login-box">
            <?php echo $content; ?>
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
        <script>
        var site_url = "<?php echo site_url('')?>";
            $(function () {
                $('.loading').hide();
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%'
                });
            });
            function front_site() {
              window.location = site_url;
            }
            function login() {
            var width = 1;
            var id = setInterval(frame, 50);
            function frame() {
                if (width >= 50) {
                clearInterval(id);
                } else {
                width++;
                    $('#login-form').hide();
                    $('.login-box-msg').text("Login proses");
                    $('.loading').show();
                if(width == 50)
                {
                    autorization();
                }
                }
            }
            }
            function autorization() {
                    var username = $('#username').val();
                    var password = $('#password').val();

                    $.ajax({
                    url: site_url+'auth/autorization',
                    type:'POST',
                    data:{username:username,password:password},
                    success:function(result)
                    {

                       if(result == "success")
                       {
                            window.location = site_url+'home';
                       }else{

                            $('#login-form').show();
                            $('.login-box-msg').show();
                            $('.login-box-msg').text("Account Not valid");
                            $('.loading').hide();
                       }
                    },
                    });
            }



            function loading()
            {
                $('#login-form').hide();
                $('.login-box-msg').hide();
                $('.loading').show();
            }


        </script>


    </body>
</html>
