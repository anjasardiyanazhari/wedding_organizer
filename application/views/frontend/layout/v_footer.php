<!-- Footer -->
<footer class="ftco-footer ftco-section">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2"><?php echo $site->nama_web ?></h2>
                    <p>Far far away, behind the word mountains, far from the countries.</p>
                    <ul class="ftco-footer-social list-unstyled mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Service</h2>
                    <ul class="list-unstyled">
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Gedung</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Dekorasi</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Catering</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Transportasi</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Salon</a></li>
                        <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Many more..</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo site_url('frontend/dashboard/Home') ?>#home-section"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                        <li><a href="<?php echo site_url('frontend/dashboard/Home') ?>#lovestory-section"><span class=" icon-long-arrow-right mr-2"></span>About</a></li>
                        <li><a href="<?php echo site_url('frontend/dashboard/Home') ?>#rsvp-section"><span class="icon-long-arrow-right mr-2"></span>Commentar</a></li>
                        <li><a href="<?php echo site_url('frontend/dashboard/Home') ?>#gallery-section"><span class="icon-long-arrow-right mr-2"></span>Galleri</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Quick Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url('frontend/data_master/Fasilitas') ?>"><span class=" icon-long-arrow-right mr-2"></span>Fasilitas</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text"><?php echo $site->alamat ?></span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?php echo $site->no_telp ?></span></a></li>
                            <li><a href="#"><span class="icon icon-envelope pr-4"></span><span class="text"><?php echo $site->email ?></span></a></li>
                            <li><a href="#"><span class="icon icon-facebook pr-4"></span><span class="text"><?php echo $site->facebook ?></span></a></li>
                            <li><a href="#"><span class="icon icon-instagram pr-4"></span><span class="text"><?php echo $site->instagram ?></span></a></li>
                            <li><a href="#"><span class="icon icon-twitter pr-4"></span><span class="text"><?php echo $site->twitter ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>

<!--===============================================================================================-->
<div style="position:fixed;right:20px;bottom:20px;">
    <a href="https://api.whatsapp.com/send?phone=+<?php echo $site->no_telp ?>&text=Halo, Saya ingin konsultasi jasa wedding organizer Golden Care" target="_blank">
        <button style="background:#32C03C; color: white; vertical-align:center;height:40px;width:200px; border-radius:5px" ;>
            <img src="<?php echo base_url() ?>assets/frontend/images/icons/app.png" style="font-family: Arial, Helvetica, sans-serif"> WhatsApp Kami
        </button>
    </a>
</div>


<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn" style="position:fixed;right:20px;bottom:70px;">
    <span class=" symbol-btn-back-to-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </span>
</div>


<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>

<!-- Plugin Datetimepicker -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript">
    let someDate = new Date();
    let numberOfDaysToAdd = 14;
    someDate.setDate(someDate.getDate() + numberOfDaysToAdd);

    flatpickr('#flatpickr', {
        minDate: someDate,
        dateFormat: "d-m-Y",
    });
</script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/fashe/vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/fashe/vendor/animsition/js/animsition.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/fashe/vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/fashe/vendor/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/fashe/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/fashe/vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/fashe/js/slick-custom.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/fashe/vendor/countdowntime/countdowntime.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/fashe/vendor/lightbox2/js/lightbox.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/fashe/vendor/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.block2-btn-addcart').each(function() {
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to cart !", "success");
        });
    });
</script>

<script src="<?php echo base_url() ?>assets/frontend/fashe/js/main.js"></script>
<!--===============================================================================================-->

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


<script src="<?php echo base_url() ?>assets/frontend/hookup/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/hookup/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/hookup/js/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/hookup/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/hookup/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/hookup/js/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/hookup/js/jquery.stellar.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/hookup/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/hookup/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/hookup/js/aos.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/hookup/js/jquery.animateNumber.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/hookup/js/jquery.mb.YTPlayer.min.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/hookup/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?&sensor=false"></script>
<script src="<?php echo base_url() ?>assets/frontend/hookup/js/google-map.js"></script>

<script type="text/javascript">
    // 1 detik = 1000
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("tanggal").innerHTML = waktu.getDate();
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }
</script>

<script type='text/javascript'>
    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
    var thisDay = date.getDay(),
        thisDay = myDays[thisDay];
    document.write(thisDay);
</script>

<script src="<?php echo base_url() ?>assets/frontend/hookup/js/main.js"></script>

</body>

</html>