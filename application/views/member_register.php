<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Travel Lodge</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/fontawesome-free/css/all.min.css") ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/adminlte.min.css") ?>">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    </head>
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="<?php echo base_url("welcome") ?>"><b>Travel Lodge </b>Hotel</a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Sign up</p>

                    <form onsubmit="return validateform()" action="<?php echo base_url("Welcome/ceateUser") ?>" method="post" >
                        <div class="input-group mb-3">
                            <input type="text" name="name" onclick="$('#name').removeClass('has-error')" id="name" class="form-control" placeholder="Full name" autocomplete="off">

                        </div>
                        <div class="input-group mb-3">
                            <select class="form-control" onchange="$('#gender').removeClass('has-error')" id="gender" name="gender">
                                <option value="" selected="" >Select Gender</option>
                                <option value="Male" >Male </option>
                                <option value="Female" >Female</option>

                            </select>

                        </div>
                        <div class="input-group mb-3">
                            <input type="text"  name="tel" onclick="$('#tel').removeClass('has-error')" id="tel" class="form-control" placeholder="Enter Telephone" autocomplete="off">

                        </div>
                        <div class="input-group mb-3">
                            <input type="text"  name="email" onclick="$('#email').removeClass('has-error')" id="email" class="form-control" placeholder="Enter Vaild email" autocomplete="off">

                        </div>


                        <div class="input-group mb-3">
                            <input type="password"  name="password" id="password" onclick="$('#password').removeClass('has-error')" class="form-control" placeholder="Password" autocomplete="off">

                        </div> 


                        <div class="row">
                            <div class="col-6">
                                <div class="icheck-primary">
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>

                            <!-- /.col -->
                        </div>
                    </form>




                    <a href="<?php echo base_url("welcome") ?>" class="text-center">I already have a membership</a>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
        <!-- /.register-box -->

        <!-- jQuery -->
        <script src="<?php echo base_url("assets/plugins/jquery/jquery.min.js") ?>"></script>

        <script src="<?php echo base_url("assets/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url("assets/dist/js/adminlte.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/user_register.js") ?>"></script>

    </body>
</html>
<style>
    .has-error{
        border-color : #dd4b39
    }
</style>
<script type="text/javascript">

</script>