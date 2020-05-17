<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/login/css/opensans-font.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/login/fonts/line-awesome/css/line-awesome.min.css">
    <!-- Jquery -->
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/login/css/style.css" />
</head>

<body class="form-v7">
    <div class="page-content">
        <div class="form-v7-content">
            <div class="form-left">
                <img src="<?php echo base_url() ?>assets/frontend/login/images/login.jpg" alt="form">
                <p class="text-1">Sign In</p>
                <p class="text-2">Privaci policy & Term of service</p>
            </div>
            <div class="form-detail" id="myform">
                <br> <br>

                <?php
                //Notifikasi error
                echo validation_errors('<div class="alert alert-warning">', '</div>');

                //notifikasi gagal login
                if ($this->session->flashdata('warning')) {
                    echo '<div class="alert alert-warning">' . $this->session->flashdata('warning'), '</div>';
                }

                //notifikasi logout
                if ($this->session->flashdata('success')) {
                    echo '<div class="alert alert-success">' . $this->session->flashdata('success'), '</div>';
                }

                //Form Open
                echo form_open(base_url('frontend/auth/Login/proses_login/'), 'class="form-horizontal"');
                ?>

                <form action="#" method="post" id="myform">
                    <br>
                    <div class="form-row">
                        <label for="email">E-MAIL (Username)</label>
                        <input type="text" name="email" id="email" class="input-text" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" value="<?php echo set_value('email'); ?>" required>
                    </div>
                    <div class="form-row">
                        <label for="password">PASSWORD</label>
                        <input type="password" name="password" id="password" class="input-text" value="<?php echo set_value('password'); ?>" required>
                    </div>
                    <br>
                    <div class="form-row-last">
                        <input type="submit" name="submit" class="register" value="Login">
                        <p>Or<a href="<?php echo base_url('frontend/auth/Registrasi') ?>">Sign Up</a></p>
                    </div>
                    <br> <br> <br> <br>
                </form>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>