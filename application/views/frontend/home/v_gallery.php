<section class="ftco-section bg-light" id="gallery-section">
    <div class="container-fluid px-md-2">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <h2 class="mb-3">Gallery</h2>
            </div>
        </div>


        <div class="row">
            <?php
            foreach ($galleri as $galleri) :
            ?>
                <div class="col-md-3 ftco-animate">
                    <?php form_hidden($galleri->id_galleri); ?>
                    <a href="<?php echo base_url('assets/backend/img/dokumentasi/galleri/asli/' . $galleri->foto) ?>" class="gallery img image-popup d-flex align-items-center justify-content-center" style="background-image: url('<?php echo base_url('assets/backend/img/dokumentasi/galleri/thumbnail/' . $galleri->foto) ?>');">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="ion-ios-image"></span></div>
                    </a>

                </div>
            <?php
            endforeach;
            ?>
        </div>

</section>