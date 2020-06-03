<section class="ftco-section" id="rsvp-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <h2 class="mb-3">Contact Us</h2>
            </div>
        </div>

        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 p-b-30">
                        <div class="p-r-20 p-r-0-lg">
                            <div style="width: 600" height="540">
                                <iframe src=" <?php echo $site->google_maps ?>" width="600" height="540" frameborder="0" style="border:0; width: 100%;" allowfullscreen="" aria-hidden=" false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 p-b-30">
                        <p>
                            <li><span class="icon icon-home pr-4"></span><span class="text"><strong><?php echo $site->nama_web ?></strong></span> </li>
                            <li><span class="icon icon-map-marker pr-4"></span><span class="text"> <?php echo $site->alamat ?></span></li>
                            <li><span class="icon icon-phone pr-4"></span><span class="text"><?php echo $site->no_telp ?></span></li>
                        </p>

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
                        echo form_open(base_url('frontend/Home/proses_add/'), 'class="form-horizontal"');
                        ?>

                        <form action="" method="post">
                            <h4 class="m-text26 p-b-36 p-t-15">
                                Send us your message
                            </h4>

                            <div class="bo4 of-hidden size15 m-b-20">
                                <input type="text" class="sizefull s-text7 p-l-22 p-r-22" name="nama" id="nama" placeholder=" Full Name" value="<?php echo set_value('nama'); ?>" required>
                            </div>

                            <div class="bo4 of-hidden size15 m-b-20">
                                <input type="email" class="sizefull s-text7 p-l-22 p-r-22" name="email" id="email" placeholder=" Email Address" value="<?php echo set_value('email'); ?>" required>
                            </div>

                            <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" rows="3" name="message" id="message" placeholder=" Message" required><?php echo set_value('message'); ?></textarea>

                            <div class="w-size25">
                                <!-- Button -->
                                <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" name="submit"> Send</button>
                            </div>
                        </form>

                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>