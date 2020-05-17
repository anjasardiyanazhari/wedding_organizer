<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url('<?php echo base_url() ?>assets/frontend/images/heading1.png');">
    <h2 class="l-text2 t-center">
        <?php echo $title ?>
    </h2>
    <p class="m-text13 t-center">
        <?php echo $site->link_website ?> |
        <?php echo $site->tag_line ?>
    </p>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart">
            <div class="wrap-table-shopping-cart bgwhite">

                <p class="alert alert-info" style="font-weight: bold;"> REGISTRASI TELAH DILAKUKAN <a href="<?php echo base_url('frontend/auth/Login') ?>" class="btn btn-info btn-sm"><i class="fa fa-user"></i> LOGIN DISINI</a> DAN ANDA JUGA BISA MELAKUKAN CHECK OUT <a href="<?php echo base_url('frontend/transaksi/Pemesanan/check_out') ?>" class="btn btn-info btn-sm"><i class="fa fa-shopping-cart"></i> CHECK OUT</<a></a> </p>

            </div>
        </div>
</section>