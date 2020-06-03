  <!-- Menu -->
  <h4 class="m-text14 p-b-7">
      MAIN MENU
  </h4>

  <ul class="p-b-1">

      <li class="p-t-4">
          <a href="<?php echo base_url('frontend/dashboard/Informasi') ?>" <?php if ($this->uri->segment(3) == 'Informasi') {
                                                                                echo 'class="s-text13 active1"';
                                                                            } else {
                                                                                echo 'class="s-text13"';
                                                                            } ?>">
              <i class="fa fa-dashboard"> Dashboard</i>
          </a>
      </li>

      <li class="p-t-4">
          <a href="<?php echo base_url('frontend/transaksi/Pemesanan') ?>" class="s-text13 ">
              <i class="fa fa-shopping-cart"> Keranjang Penyewaan</i>
          </a>
      </li>

      <li class="p-t-4">
          <a href="<?php echo base_url('frontend/dashboard/Riwayat') ?>" <?php if ($this->uri->segment(3) == 'Riwayat') {
                                                                                echo 'class="s-text13 active1"';
                                                                            } else {
                                                                                echo 'class="s-text13"';
                                                                            } ?>">
              <i class="fa fa-check"> Riwayat Penyewaan</i>
          </a>
      </li>

      <li class="p-t-4">
          <a href="<?php echo base_url('frontend/dashboard/Profil') ?>" <?php if ($this->uri->segment(3) == 'Profil') {
                                                                            echo 'class="s-text13 active1"';
                                                                        } else {
                                                                            echo 'class="s-text13"';
                                                                        } ?>">
              <i class="fa fa-user"> Profil Saya</i>
          </a>
      </li>

      <li class="p-t-4">
          <a href="<?php echo base_url('frontend/dashboard/Contact') ?>" <?php if ($this->uri->segment(3) == 'Contact') {
                                                                                echo 'class="s-text13 active1"';
                                                                            } else {
                                                                                echo 'class="s-text13"';
                                                                            } ?>">
              <i class="fa fa-comments"> Contact Us</i>
          </a>
      </li>

      <li class="p-t-4">
          <a href="<?php echo base_url('frontend/auth/Login/logout/index') ?>" <?php if ($this->uri->segment(4) == 'logout') {
                                                                                    echo 'class="s-text13 active1"';
                                                                                } else {
                                                                                    echo 'class="s-text13"';
                                                                                } ?>">
              <i class="fa fa-sign-out"> Logout</i>
          </a>
      </li>
  </ul>