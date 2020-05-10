<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?PHP echo base_url(); ?>" class="nav-link">Home</a>
                </li>
                <!--                <li class="nav-item d-none d-sm-inline-block">
                                    <a href="#" class="nav-link">Members List</a>
                                </li>-->
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3" hidden>
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link"  href="<?php echo base_url("welcome/logout") ?>">
                        <i class="fas fa-power-off"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!--		 Brand Logo -->
            <a href="" class="brand-link">
                <img src="<?php echo base_url("assets/dist/img/AdminLTELogo.png") ?>"
                     alt="AdminLTE Logo"
                     class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">Travel Lodge</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url("assets/dist/img/user2-160x160.jpg") ?>" class="img-circle elevation-2" alt="User Image">
                    </div>

                    <div class="info">
                        <a href="#" class="d-block"><?php
                            $sess_array = $this->session->userdata('uDetails');
                            if (isset($sess_array)) {
                                echo $sess_array['Name'];
                            }
                            ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?php echo base_url("welcome/home") ?>" class="nav-link dashbord_class">
                                <i class="nav-icon fas fa-hotel"></i>
                                <p>Reservations</p>
                            </a>
                        </li>
                        <?php if ($sess_array['userType'] == "admin") { ?>
<!--                            <li class="nav-item">
                                <a href="<?php echo base_url(""); ?>" class="nav-link history">
                                    <i class="nav-icon fas fa-calendar"></i>
                                    <p>Reservations
                                    </p>
                                </a>
                            </li>-->

                        <?php } else if ($sess_array['userType'] == "user") { ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url("Reservation_controller/user_history"); ?>" class="nav-link user_history">
                                    <i class="nav-icon fas fa-calendar"></i>
                                    <p>Reservations History
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(""); ?>" class="nav-link spa_class">
                                    <i class="nav-icon fas fa-heartbeat"></i>
                                    <p>Spa Reservations
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(""); ?>" class="nav-link taxi_class">
                                    <i class="nav-icon fas fa-taxi"></i>
                                    <p>Taxi Reservations
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(""); ?>" class="nav-link taxi_class">
                                    <i class="nav-icon fas fa-utensils"></i>
                                    <p>Food Reservations
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
