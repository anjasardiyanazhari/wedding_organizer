<?php
// load konfigurasi website
$site = $this->m_konfigurasi->getAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!-- Icon -->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/backend/img/icon/asli/' . $site->icon) ?>" />
    <!-- SEO google -->
    <meta name="keyword" content="<?php echo $site->keyword ?>">
    <meta name="deskripsi" content="<?php echo $title ?>,<?php echo $site->deskripsi ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fashe/vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fashe/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fashe/fonts/themify/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fashe/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fashe/fonts/elegant-font/html-css/style.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fashe/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fashe/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fashe/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fashe/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fashe/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fashe/vendor/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fashe/vendor/lightbox2/css/lightbox.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fashe/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fashe/css/main.css">

    <!-- Plugin Datetimepicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Caslon+Text:400,400i,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/hookup/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/hookup/css/animate.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/hookup/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/hookup/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/hookup/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/hookup/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/hookup/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/hookup/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/hookup/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/hookup/css/style.css">
</head>


<body class="animsition">