<?php
// load konfigurasi website
$nav_fasilitas          = $this->m_konfigurasi->nav_fasilitas();
$nav_fasilitas_mobile   = $this->m_konfigurasi->nav_fasilitas();
?>

<div class="wrap_header">
    <!-- Logo -->
    <a href="<?php echo site_url('frontend/Home') ?>" class="logo">
        <img src="<?php echo base_url('assets/backend/img/logo/asli/' . $site->logo) ?>" alt="<?php echo $site->nama_web ?>">
    </a>

    <!-- Menu -->
    <div class=" wrap_menu">
        <nav class="menu">
            <ul class="main_menu">
                <li>
                    <a href="<?php echo site_url('frontend/Home') ?>">Home</a>
                </li>

                <li>
                    <a href="<?php echo base_url('frontend/data_master/Fasilitas') ?>">Sewa Fasilitas</a>
                    <ul class="sub_menu">
                        <?php
                        foreach ($nav_fasilitas as $nav_fasilitas) :
                        ?>

                            <li>
                                <a href="<?php echo base_url('frontend/data_master/Fasilitas/kategori/' . $nav_fasilitas->slug_kategori) ?>"><?php echo $nav_fasilitas->nama_kategori ?></a>
                            </li>

                        <?php
                        endforeach;
                        ?>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?php echo site_url('frontend/Home') ?>#lovestory-section" class="nav-link"><span>About</span></a>
                </li>

                <li>
                    <a href="<?php echo site_url('frontend/Home') ?>#gallery-section" class="nav-link"><span>Galleri</span></a>
                </li>

                <li>
                    <a href="<?php echo site_url('frontend/Home') ?>#rsvp-section" class="nav-link"><span>Contact</span></a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Header Icon -->
    <div class="header-icons">

        <?php
        if ($this->session->userdata('email')) {
        ?>

            <div class="header-wrapicon2">
                <img src="<?php echo base_url() ?>assets/frontend/images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                <!-- Header cart noti -->
                <div class="header-cart header-dropdown">

                    <div class="header" style="text-align: center">
                        <img src="<?php echo base_url() ?>assets/frontend/images/icons/avatar.png" class="img-circle" alt="User Image" style="border-radius: 50%; overflow: hidden; border: 5px solid #666; ">
                        <span class="input-group-text><i class=" fa fa-calendar"></i></span>
                        <p>
                            <h6>Nama:<?php echo $this->session->userdata('nama'); ?></h6>
                        </p>
                    </div>

                    <div class="header-cart-total">

                    </div>

                    <div class="header-cart-buttons">
                        <div class="header-cart-wrapbtn">
                            <!-- Button -->
                            <a href="<?php echo base_url('frontend/dashboard/Informasi') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                Dashboard
                            </a>
                        </div>

                        <div class="header-cart-wrapbtn">
                            <!-- Button -->
                            <a href="<?php echo base_url('frontend/auth/Login/logout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                Log Out
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        <?php } else { ?>

            <a href="<?php echo base_url('frontend/auth/Login') ?>" class="header-wrapicon1 dis-block">
                <img src="<?php echo base_url() ?>assets/frontend/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
            </a>

        <?php } ?>

        <span class="linedivide1"></span>

        <div class="header-wrapicon2">

            <?php
            // Cek Data Pemesanan Ada atau Tidak
            $chart_check = $this->cart->contents();
            ?>

            <img src="<?php echo base_url() ?>assets/frontend/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span class="header-icons-noti"><?php echo count($chart_check) ?></span>

            <!-- Header cart noti -->
            <div class="header-cart header-dropdown">
                <ul class="header-cart-wrapitem">

                    <?php
                    // Kalau Tidak Ada Data Pemesanan
                    if (empty($chart_check)) {
                    ?>
                        <li class="header-cart-item">
                            <p class="alert alert-success">Keranjang Pemesanan Wedding</p>
                        </li>

                        <?php
                        // Kalau Ada Data Pemesanan
                    } else {
                        // Total Pemesanan
                        $total_pemesanan = 'Rp.' . number_format($this->cart->total(), '0', ',', '.');
                        // Tampilkan Data Pemesanan
                        foreach ($chart_check as $chart_check) {

                            // Foto Fasilitas Dikeranjang
                            $id_fasilitas = $chart_check['id'];
                            // Dan Ambil Datanya
                            $fasilitasnya = $this->m_fasilitas->getWhere($id_fasilitas);
                        ?>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="<?php echo base_url('assets/backend/img/fasilitas/thumbnail/' . $fasilitasnya->foto) ?>" alt="<?php echo $chart_check['name'] ?>">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="<?php echo base_url('frontend/transaksi/Penyewaan/detail/' . $fasilitasnya->slug_fasilitas) ?>" class="header-cart-item-name">
                                        <?php echo $chart_check['name'] ?>
                                    </a>

                                    <span class="header-cart-item-info">
                                        <?php echo $chart_check['qty'] ?> x Rp.
                                        <?php echo number_format($chart_check['price'], '0', ',', '.') ?> =
                                        Rp.
                                        <?php echo number_format($chart_check['subtotal'], '0', ',', '.') ?>
                                    </span>
                                </div>
                            </li>

                    <?php
                        } // Tutup Foreach Pemesanan
                    } // Tutup else Pemesanan
                    ?>

                </ul>

                <div class="header-cart-total">
                    Total: <?php if (!empty($chart_check)) {
                                echo $total_pemesanan;
                            } ?>
                </div>

                <div class="header-cart-buttons">
                    <div class="header-cart-wrapbtn">
                        <!-- Button -->
                        <a href="<?php echo base_url('frontend/transaksi/Pemesanan') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                            View Cart
                        </a>
                    </div>

                    <div class="header-cart-wrapbtn">
                        <!-- Button -->
                        <a href="<?php echo base_url('frontend/transaksi/Pemesanan/check_out') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Header Mobile -->
<div class="wrap_header_mobile">
    <!-- Logo moblie -->
    <a href="<?php echo site_url('frontend/Home') ?>" class="logo-mobile">
        <img src="<?php echo base_url('assets/backend/img/logo/asli/' . $site->logo) ?>" alt="<?php echo $site->nama_web ?>">
    </a>

    <!-- Button show menu -->
    <div class="btn-show-menu">
        <!-- Header Icon mobile -->
        <div class="header-icons-mobile">
            <?php
            if ($this->session->userdata('email')) {
            ?>

                <div class="header-wrapicon2">
                    <img src="<?php echo base_url() ?>assets/frontend/images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">

                        <div class="header" style="text-align: center">
                            <img src="<?php echo base_url() ?>assets/frontend/images/icons/avatar.png" class="img-circle" alt="User Image" style="border-radius: 50%; overflow: hidden; border: 5px solid #666; ">
                            <span class="input-group-text><i class=" fa fa-calendar"></i></span>
                            <p>
                                <h6>Nama:<?php echo $this->session->userdata('nama'); ?></h6><br>
                            </p>
                        </div>

                        <div class="header-cart-total">

                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="<?php echo base_url('frontend/dashboard/Informasi') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Dashboard
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="<?php echo base_url('frontend/auth/Login/logout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Log Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } else { ?>

                <a href="<?php echo base_url('frontend/auth/Login') ?>" class="header-wrapicon1 dis-block">
                    <img src="<?php echo base_url() ?>assets/frontend/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                </a>

            <?php } ?>

            <span class="linedivide2"></span>

            <div class="header-wrapicon2">

                <?php
                // Cek Data Pemesanan Ada atau Tidak
                $chart_check_mobile = $this->cart->contents();
                ?>

                <img src="<?php echo base_url() ?>assets/frontend/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                <span class="header-icons-noti"><?php echo count($chart_check_mobile) ?></span>

                <!-- Header cart noti -->
                <div class="header-cart header-dropdown">
                    <ul class="header-cart-wrapitem">

                        <?php
                        // Kalau Tidak Ada Data Pemesanan
                        if (empty($chart_check_mobile)) {
                        ?>

                            <li class="header-cart-item" style="text-align: center">
                                <p class="alert alert-success">Keranjang Pemesanan Wedding</p>
                            </li>

                            <?php
                            // Kalau Ada Data Pemesanan
                        } else {
                            // Total Pemesanan
                            $total_pemesanan = 'Rp.' . number_format($this->cart->total(), '0', ',', '.');
                            // Tampilkan Data Pemesanan
                            foreach ($chart_check_mobile as $chart_check_mobile) {

                                // Foto Fasilitas Dikeranjang
                                $id_fasilitas_mobile = $chart_check_mobile['id'];
                                // Dan Ambil Datanya
                                $fasilitasnya = $this->m_fasilitas->getWhere($id_fasilitas_mobile);
                            ?>
                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="<?php echo base_url('assets/backend/img/fasilitas/thumbnail/' . $fasilitasnya->foto) ?>" alt="<?php echo $chart_check_mobile['name'] ?>">
                                    </div>

                                    <div class="header-cart-item-txt">
                                        <a href="<?php echo base_url('frontend/transaksi/Penyewaan/detail/' . $fasilitasnya->slug_fasilitas) ?>" class="header-cart-item-name">
                                            <?php echo $chart_check_mobile['name'] ?>
                                        </a>

                                        <span class="header-cart-item-info">
                                            <?php echo $chart_check_mobile['qty'] ?> x Rp.
                                            <?php echo number_format($chart_check_mobile['price'], '0', ',', '.') ?> =
                                            Rp.
                                            <?php echo number_format($chart_check_mobile['subtotal'], '0', ',', '.') ?>
                                        </span>
                                    </div>
                                </li>

                        <?php
                            } // Tutup Foreach Pemesanan
                        } // Tutup else Pemesanan
                        ?>

                    </ul>

                    <div class="header-cart-total">
                        Total: <?php if (!empty($chart_check)) {
                                    echo $total_pemesanan;
                                } ?>
                    </div>

                    <div class="header-cart-buttons">
                        <div class="header-cart-wrapbtn">
                            <!-- Button -->
                            <a href="<?php echo base_url('frontend/transaksi/Pemesanan') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                View Cart
                            </a>
                        </div>

                        <div class="header-cart-wrapbtn">
                            <!-- Button -->
                            <a href="<?php echo base_url('frontend/transaksi/Pemesanan/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                Check Out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>
</div>


<!-- Menu Mobile -->
<div class="wrap-side-menu">
    <nav class="side-menu">
        <ul class="main-menu">
            <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                <span class="topbar-child1">
                    <?php echo $site->alamat ?>
                </span>
            </li>

            <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                <div class="topbar-child2-mobile">
                    <span class="topbar-email">
                        <?php echo $site->email ?>
                    </span>

                    <div class="topbar-language rs1-select2">
                        <select class="selection-1" name="time">
                            <option>IDN</option>
                            <option>ENG</option>
                        </select>
                    </div>
                </div>
            </li>

            <li class="item-topbar-mobile p-l-10">
                <div class="topbar-social-mobile">
                    <a href="#" class="topbar-social-item fa fa-facebook"></a>
                    <a href="#" class="topbar-social-item fa fa-instagram"></a>
                    <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                    <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                    <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                </div>
            </li>

            <li class="item-menu-mobile">
                <a href="<?php echo site_url('frontend/Home') ?>">Home</a>
            </li>

            <li class="item-menu-mobile">
                <a href="<?php echo base_url('frontend/data_master/Fasilitas') ?>">Sewa Fasilitas</a>
                <ul class="sub-menu">
                    <?php
                    foreach ($nav_fasilitas_mobile as $nav_fasilitas_mobile) :
                    ?>

                        <li>
                            <a href="<?php echo base_url('frontend/data_master/Fasilitas/kategori/' . $nav_fasilitas_mobile->slug_kategori) ?>"><?php echo $nav_fasilitas_mobile->nama_kategori ?></a>
                        </li>

                    <?php
                    endforeach;
                    ?>
                </ul>
                <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
            </li>

            <li class="item-menu-mobile">
                <a href="<?php echo site_url('frontend/Home') ?>#lovestory-section" class="nav-link"><span>About</span></a>
            </li>

            <li class="item-menu-mobile">
                <a href="<?php echo site_url('frontend/Home') ?>#gallery-section" class="nav-link"><span>Galleri</span></a>
            </li>

            <li class="item-menu-mobile">
                <a href="<?php echo site_url('frontend/Home') ?>#rsvp-section" class="nav-link"><span>Contact</span></a>
            </li>
        </ul>
    </nav>
</div>
</header>