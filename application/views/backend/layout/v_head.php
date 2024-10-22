<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> <?php echo $title ?> </title>

    <!-- Icon -->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/backend/img/icon/thumbnail/' . (isset($site->icon) ? $site->icon : '')) ?>" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/adminlte/plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- fullCalendar -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

<!--    <link rel="stylesheet" href="--><?php //echo base_url() ?><!--assets/backend/adminlte/plugins/fullcalendar/main.min.css">-->
<!--    <link rel="stylesheet" href="--><?php //echo base_url() ?><!--assets/backend/adminlte/plugins/fullcalendar-interaction/main.min.css">-->
<!--    <link rel="stylesheet" href="--><?php //echo base_url() ?><!--assets/backend/adminlte/plugins/fullcalendar-daygrid/main.min.css">-->
<!--    <link rel="stylesheet" href="--><?php //echo base_url() ?><!--assets/backend/adminlte/plugins/fullcalendar-timegrid/main.min.css">-->
<!--    <link rel="stylesheet" href="--><?php //echo base_url() ?><!--assets/backend/adminlte/plugins/fullcalendar-bootstrap/main.min.css">-->

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/adminlte/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
