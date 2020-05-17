<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('backend/dashboard/Informasi') ?>" class="brand-link">
        <img src="<?php echo base_url() ?>assets/backend/img/logo/asli/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">GOLDEN CARE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-2 pb-2 mb-3 d-flex" style="text-align: center">
            <div class="image">
                <img src="<?php echo base_url() ?>assets/backend/img/foto_user/user3-128x128.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <!-- Ambil data Login id_pegawai dari SESSION -->
                    <?php echo $this->session->userdata('nama'); ?><br>
                    <small>(<?php echo $this->session->userdata('akses_level');  ?>)</small>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->

                <!-- Menu Dahsboard -->
                <li class="nav-item has-treeview">
                    <a href="<?php echo site_url('backend/dashboard/Informasi') ?>" <?php if ($this->uri->segment(3) == 'Informasi') {
                                                                                        echo 'class="nav-link active"';
                                                                                    } else {
                                                                                        echo 'class="nav-link"';
                                                                                    } ?>>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right"></i>
                        </p>
                    </a>
                </li>
                <!--End Menu Dahsboard -->

                <!-- Menu Wedding Organizer -->
                <li class="nav-header">DATA MASTER</li>
                <!-- Menu Fasilitas -->
                <li <?php if ($this->uri->segment(3) == 'Fasilitas') {
                        echo 'class="nav-item has-treeview menu-open" ';
                    } elseif ($this->uri->segment(3) == 'Kategori') {
                        echo 'class="nav-item has-treeview menu-open" ';
                    } else {
                        echo 'class="nav-item has-treeview"';
                    } ?>>
                    <a href="#" <?php if ($this->uri->segment(3) == 'Fasilitas') {
                                    echo 'class="nav-link active"';
                                } elseif ($this->uri->segment(3) == 'Kategori') {
                                    echo 'class="nav-link active"';
                                } else {
                                    echo 'class="nav-link"';
                                } ?>>
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Fasilitas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('backend/data_master/Fasilitas') ?>" <?php if ($this->uri->segment(3) == 'Fasilitas') {
                                                                                                    echo 'class="nav-link active"';
                                                                                                } else {
                                                                                                    echo 'class="nav-link"';
                                                                                                } ?>>
                                <i class="far fa fa-table nav-icon"></i>
                                <p>Data Fasilitas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('backend/data_master/Kategori') ?>" <?php if ($this->uri->segment(3) == 'Kategori') {
                                                                                                    echo 'class="nav-link active"';
                                                                                                } else {
                                                                                                    echo 'class="nav-link"';
                                                                                                } ?>>
                                <i class="far fa fa-tags nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Menu Fasilitas -->

                <!-- Menu Rekening -->
                <?php
                // Validasi level_akses
                if ($this->session->userdata('akses_level') == 'Admin') :
                ?>

                    <li <?php if ($this->uri->segment(3) == 'Rekening') {
                            echo 'class="nav-item has-treeview menu-open" ';
                        } else {
                            echo 'class="nav-item has-treeview"';
                        } ?>>
                        <a href="#" <?php if ($this->uri->segment(3) == 'Rekening') {
                                        echo 'class="nav-link active"';
                                    } else {
                                        echo 'class="nav-link"';
                                    } ?>>
                            <i class="nav-icon fab fa-cc-mastercard"></i>
                            <p>
                                Rekening
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo site_url('backend/data_master/Rekening') ?>" <?php if ($this->uri->segment(3) == 'Rekening') {
                                                                                                        echo 'class="nav-link active"';
                                                                                                    } else {
                                                                                                        echo 'class="nav-link"';
                                                                                                    } ?>>
                                    <i class="far fa fa-table nav-icon"></i>
                                    <p>Data Rekening</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                <?php endif;
                ?>
                <!-- End Menu Rekening -->

                <!-- End Menu Wedding Organizer -->

                <!-- Menu Transaksi -->
                <li class="nav-header">TRANSAKSI</li>
                <!-- Menu Pemesanan -->
                <li <?php if ($this->uri->segment(3) == 'Penyewaan') {
                        echo 'class="nav-item has-treeview menu-open" ';
                    } else {
                        echo 'class="nav-item has-treeview"';
                    } ?>>
                    <a href="#" <?php if ($this->uri->segment(3) == 'Penyewaan') {
                                    echo 'class="nav-link active"';
                                } else {
                                    echo 'class="nav-link"';
                                } ?>>
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Penyewaan
                            <i class="fas fa-angle-left right"></i>
                            <span class="right badge badge-danger"><?php echo count($total_header_transaksi) ?></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('backend/transaksi/Penyewaan') ?>" <?php if ($this->uri->segment(3) == 'Penyewaan') {
                                                                                                echo 'class="nav-link active"';
                                                                                            } else {
                                                                                                echo 'class="nav-link"';
                                                                                            } ?>>
                                <i class="far fa fa-table nav-icon"></i>
                                <p>Data Penyewaan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Menu Pemesanan -->
                <!-- End Menu Transaksi -->

                <!-- Menu Pengguna -->
                <li class="nav-header">PENGGUNA</li>
                <!-- Menu Profil -->
                <li <?php if ($this->uri->segment(3) == 'Profil') {
                        echo 'class="nav-item has-treeview menu-open" ';
                    } else {
                        echo 'class="nav-item has-treeview"';
                    } ?>>
                    <a href="#" <?php if ($this->uri->segment(3) == 'Profil') {
                                    echo 'class="nav-link active"';
                                } else {
                                    echo 'class="nav-link"';
                                } ?>>
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>
                            Profil Saya
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('backend/pengguna/Profil') ?>" <?php if ($this->uri->segment(3) == 'Profil') {
                                                                                            echo 'class="nav-link active"';
                                                                                        } else {
                                                                                            echo 'class="nav-link"';
                                                                                        } ?>>
                                <i class="far fa fa-table nav-icon"></i>
                                <p>Data Diri</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Menu profil -->

                <!-- Menu Pegawai -->
                <?php
                // Validasi level_akses
                if ($this->session->userdata('akses_level') == 'Admin') :
                ?>

                    <li <?php if ($this->uri->segment(3) == 'Pegawai') {
                            echo 'class="nav-item has-treeview menu-open" ';
                        } else {
                            echo 'class="nav-item has-treeview"';
                        } ?>>
                        <a href="#" <?php if ($this->uri->segment(3) == 'Pegawai') {
                                        echo 'class="nav-link active"';
                                    } else {
                                        echo 'class="nav-link"';
                                    } ?>>
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Pegawai
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo site_url('backend/pengguna/Pegawai') ?>" <?php if ($this->uri->segment(3) == 'Pegawai') {
                                                                                                    echo 'class="nav-link active"';
                                                                                                } else {
                                                                                                    echo 'class="nav-link"';
                                                                                                } ?>>
                                    <i class="far fa fa-table nav-icon"></i>
                                    <p>Data Pegawai</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                <?php endif;
                ?>
                <!-- End Menu Pegawai -->

                <!-- Menu Pelanggan -->
                <li <?php if ($this->uri->segment(3) == 'Pelanggan') {
                        echo 'class="nav-item has-treeview menu-open" ';
                    } else {
                        echo 'class="nav-item has-treeview"';
                    } ?>>
                    <a href="#" <?php if ($this->uri->segment(3) == 'Pelanggan') {
                                    echo 'class="nav-link active"';
                                } else {
                                    echo 'class="nav-link"';
                                } ?>>
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pelanggan
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-primary right"><?php echo count($total_pelanggan) ?></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('backend/pengguna/Pelanggan') ?>" <?php if ($this->uri->segment(3) == 'Pelanggan') {
                                                                                                echo 'class="nav-link active"';
                                                                                            } else {
                                                                                                echo 'class="nav-link"';
                                                                                            } ?>>
                                <i class="far fa fa-table nav-icon"></i>
                                <p>Data Pelanggan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Menu Pegawai -->
                <!-- End Menu Pengguna -->


                <!-- Menu Buku Tamu -->
                <li class="nav-header">BUKU TAMU</li>
                <!-- Menu Pegawai -->
                <li <?php if ($this->uri->segment(3) == 'Komentar') {
                        echo 'class="nav-item has-treeview menu-open" ';
                    } else {
                        echo 'class="nav-item has-treeview"';
                    } ?>>
                    <a href="#" <?php if ($this->uri->segment(3) == 'Komentar') {
                                    echo 'class="nav-link active"';
                                } else {
                                    echo 'class="nav-link"';
                                } ?>>
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Komentar
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-warning right"><?php echo count($total_komentar) ?></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('backend/buku/Komentar') ?>" <?php if ($this->uri->segment(3) == 'Komentar') {
                                                                                            echo 'class="nav-link active"';
                                                                                        } else {
                                                                                            echo 'class="nav-link"';
                                                                                        } ?>>
                                <i class="far fa fa-table nav-icon"></i>
                                <p>Data Komentar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Menu Buku Tamu -->

                <!-- Menu Dokumentasi -->
                <li class="nav-header">DOKUMENTASI</li>
                <!-- Menu Pegawai -->
                <li <?php if ($this->uri->segment(3) == 'Galleri') {
                        echo 'class="nav-item has-treeview menu-open" ';
                    } else {
                        echo 'class="nav-item has-treeview"';
                    } ?>>
                    <a href="#" <?php if ($this->uri->segment(3) == 'Galleri') {
                                    echo 'class="nav-link active"';
                                } else {
                                    echo 'class="nav-link"';
                                } ?>>
                        <i class="nav-icon fas fa-camera"></i>
                        <p>
                            Galleri
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('backend/dokumentasi/Galleri') ?>" <?php if ($this->uri->segment(3) == 'Galleri') {
                                                                                                echo 'class="nav-link active"';
                                                                                            } else {
                                                                                                echo 'class="nav-link"';
                                                                                            } ?>>
                                <i class="far fa fa-table nav-icon"></i>
                                <p>Data Galleri</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Menu Dokumentasi -->

                <!-- Menu Setting -->
                <li class="nav-header">SETTING</li>
                <!-- Menu Pegawai -->
                <li <?php if ($this->uri->segment(4) == 'umum') {
                        echo 'class="nav-item has-treeview menu-open" ';
                    } elseif ($this->uri->segment(4) == 'logo') {
                        echo 'class="nav-item has-treeview menu-open" ';
                    } elseif ($this->uri->segment(4) == 'icon') {
                        echo 'class="nav-item has-treeview menu-open" ';
                    } else {
                        echo 'class="nav-item has-treeview"';
                    } ?>>
                    <a href="#" <?php if ($this->uri->segment(4) == 'umum') {
                                    echo 'class="nav-link active"';
                                } elseif ($this->uri->segment(4) == 'logo') {
                                    echo 'class="nav-link active"';
                                } elseif ($this->uri->segment(4) == 'icon') {
                                    echo 'class="nav-link active"';
                                } else {
                                    echo 'class="nav-link"';
                                } ?>>
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Konfigurasi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('backend/setting/Konfigurasi/umum') ?>" <?php if ($this->uri->segment(4) == 'umum') {
                                                                                                        echo 'class="nav-link active"';
                                                                                                    } else {
                                                                                                        echo 'class="nav-link"';
                                                                                                    } ?>>
                                <i class="far fa fa-home nav-icon"></i>
                                <p>Umum Website</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('backend/setting/Konfigurasi/logo') ?>" <?php if ($this->uri->segment(4) == 'logo') {
                                                                                                        echo 'class="nav-link active"';
                                                                                                    } else {
                                                                                                        echo 'class="nav-link"';
                                                                                                    } ?>>
                                <i class="far fa fa-image nav-icon"></i>
                                <p>Logo Website</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('backend/setting/Konfigurasi/icon') ?>" <?php if ($this->uri->segment(4) == 'icon') {
                                                                                                        echo 'class="nav-link active"';
                                                                                                    } else {
                                                                                                        echo 'class="nav-link"';
                                                                                                    } ?>>
                                <i class="far fa  fa-wrench nav-icon"></i>
                                <p>Icon Website</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Menu Setting -->

                <!-- Menu Logout -->
                <li class="nav-item">
                    <a href="<?php echo base_url('backend/auth/Login/logout') ?>" onclick="return confirm(' Yakin Ingin Keluar...?')" class=" nav-link">
                        <i class="fas fa fa-sign-out-alt"></i>
                        <?php echo $this->session->userdata('akses_level');  ?>
                        <span class="badge badge-danger navbar-badge"></span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>