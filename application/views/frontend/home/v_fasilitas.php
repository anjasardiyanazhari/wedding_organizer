<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-105">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <h2 class="mb-3">All New Fasilitas</h2>
            </div>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">

                <?php
                foreach ($fasilitas as $fasilitas) :
                ?>

                    <div class="item-slick2 p-l-15 p-r-15">

                        <?php
                        // Form untuk memproses Pemesanan 
                        echo form_open(base_url('frontend/transaksi/Pemesanan/add'));

                        // Elemen yang dibawa
                        echo form_hidden('id', $fasilitas->id_fasilitas);
                        echo form_hidden('qty', 1);
                        echo form_hidden('price', $fasilitas->harga);
                        echo form_hidden('name', $fasilitas->nama_fasilitas);

                        // Elemen redirect
                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                        ?>

                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="<?php echo base_url('assets/backend/img/fasilitas/thumbnail/' . $fasilitas->foto) ?>" alt="<?php echo $fasilitas->nama_fasilitas ?>">

                                <div class="block2-overlay trans-0-4">
                                    <a href="<?php echo base_url('frontend/data_master/Fasilitas/detail/' . $fasilitas->slug_fasilitas) ?>" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <i class="fa fa-eye dis-none" aria-hidden="true"></i>
                                    </a>

                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="<?php echo base_url('frontend/data_master/Fasilitas/detail/' . $fasilitas->slug_fasilitas) ?>" class="block2-name dis-block s-text3 p-b-5">
                                    <?php echo $fasilitas->nama_fasilitas ?>

                                </a>

                                <span class="block2-price m-text6 p-r-5">
                                    RP <?php echo number_format($fasilitas->harga, '0', ',', '.') ?>
                                </span>
                            </div>
                        </div>

                        <?php
                        // End Penutup Form untuk memproses Pemesanan
                        echo form_close();
                        ?>

                    </div>

                <?php
                endforeach;
                ?>

            </div>
        </div>
    </div>
</section>