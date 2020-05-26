<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url('<?php echo base_url() ?>assets/backend/img/home/heading6.png');">
    <h2 class="l-text2 t-center">
        <?php echo $title ?>
    </h2>
    <p class="m-text13 t-center">
        <?php echo $site->link_website ?> |
        <?php echo $site->tag_line ?>
    </p>
</section>

<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3 p-b-10">
                <div class="leftbar p-r-20 p-r-0-sm">

                    <!--Includ Menu -->
                    <?php include('v_menu.php') ?>

                </div>
            </div>

            <div class="col-md-9 col-lg-9 p-b-50">
                <div class="flex-sb-m flex-w p-b-50">
                </div>

                <!-- Product -->
                <div class="body">

                    <p>Anda dapat memberikan komentar melalui form berikut</p>

                    <?php
                    // Notifikasi 
                    if ($this->session->flashdata('success')) {
                        echo "<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>";
                    }
                    ?>

                    <?php
                    //Notifikasi error
                    echo validation_errors('<div class="alert alert-warning">', '</div>');

                    //Form Open
                    echo form_open(base_url('frontend/dashboard/Informasi/proses_add/'), 'class="form-horizontal"');
                    ?>

                    <div class="bo9 w-size100 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">

                        <!-- Horizontal Form -->
                        <form action="" method="POST">
                            <div class="form-group row">
                                <div class="col-md-3 p-b-0">
                                    <label for="nama" class="col-sm-12 col-form-label">Nama</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="bo4 of-hidden size15 m-b-0">
                                        <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo $isi_form->id_pelanggan; ?>">
                                        <input type="text" class="sizefull s-text7 p-l-22 p-r-22 " name="nama" id="nama" placeholder=" Masukan Nama Lengkap Anda..." value="<?php echo $isi_form->nama; ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3 p-b-0">
                                    <label for="email" class="col-sm-12 col-form-label">Email</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="bo4 of-hidden size15 m-b-0">
                                        <input type="email" class="sizefull s-text7 p-l-22 p-r-22" name="email" id="email" placeholder=" Masukan Email..." value="<?php echo $isi_form->email; ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3 p-b-0">
                                    <label for="komentar" class="col-sm-12 col-form-label">Komentar</label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="komentar" id="komentar" placeholder=" Masukan Komentar..."><?php echo set_value('komentar'); ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Send Komentar</button>
                                    <button type="reset" class="btn btn-danger" name="reset"><i class="fa fa-times"></i> Reset</button>
                                </div>
                            </div>
                        </form>

                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>