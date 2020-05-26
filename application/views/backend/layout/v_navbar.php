<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
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
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url() ?>assets/backend/img/user/user3-128x128.jpg" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline"> <?php echo $this->session->userdata('nama'); ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="<?php echo base_url() ?>assets/backend/img/user/user3-128x128.jpg" class="img-circle elevation-2" alt="User Image">

                    <p>
                        <?php echo $this->session->userdata('nama'); ?> - <?php echo $this->session->userdata('akses_level');  ?>
                        <small>Member updated: <?php echo date('d M Y', strtotime($this->session->userdata('tanggal_update'))); ?></small>
                    </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="<?php echo site_url('backend/pengguna/Profil') ?>" class="btn btn-default btn-flat">Profile</a>
                    <a href="<?php echo base_url('backend/auth/Login/logout') ?>" class="btn btn-default btn-flat float-right">Sign out</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->