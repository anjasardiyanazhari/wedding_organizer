<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo (isset($sub_title) ? $sub_title : 'DATA'); ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('backend/dashboard/Informasi') ?>">Administrator</a></li>
                        <li class="breadcrumb-item active"> <?php echo ucfirst(str_replace('_', '', $this->uri->segment(2))); ?> </li>
                        <li class=" breadcrumb-item active"><?php echo (isset($sub_title) ? $sub_title : 'DATA'); ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo (isset($sub_header) ? $sub_header : 'DATA'); ?> </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- load ke Content -->
                            <?php
                            $this->load->view($halaman);
                            ?>

                        </div>
                    </div>
                </div>

            </div> <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> <!-- /.content -->
</div>
<!-- /.content-wrapper -->