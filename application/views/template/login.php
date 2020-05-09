<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Membership Manager | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/fontawesome-free/css/all.min.css") ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/adminlte.min.css") ?>">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><b>Travel Lodge </b>Hotel</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start</p>

                    <form action="<?php echo base_url("welcome/login") ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="email" name="username" id="username" required class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input name="password" id="password" required type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($this->session->flashdata('error')) {
                            $erro = $this->session->flashdata('error');
                            echo $erro;
                        unset($_SESSION['error']); 
                        
                        }
                            ?>
                            <div class="row">
                                <div class="col-8">
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>


                        <!-- /.social-auth-links -->

                        <p class="mb-1">
                            <a href="<?php echo base_url("Welcome/registerPage"); ?>">Sign Up</a>
                        </p>

                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
            <!-- /.login-box -->

            <!-- jQuery -->
            <script src="<?php echo base_url("assets/plugins/jquery/jquery.min.js") ?>></script>
                    <!-- Bootstrap 4 -->
            <script src="<?php echo base_url("assets/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
            <!-- AdminLTE App -->
            <script src="<?php echo base_url("assets/dist/js/adminlte.min.js") ?>"></script>

    </body>
</html>
