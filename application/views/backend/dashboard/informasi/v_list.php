<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-indigo">
            <div class="inner">
                <h3><?php echo count($total_pegawai) ?></h3>

                <p>Administrator</p>
            </div>
            <div class="icon">
                <!-- <i class="ion ion-shopping-cart"></i> -->
                <i class="fas fa-user"></i>
            </div>
            <a href="<?php echo base_url('backend/pengguna/Pegawai'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?php echo count($total_pelanggan) ?></h3>

                <p>Pelanggan</p>
            </div>
            <div class="icon">
                <!-- <i class="ion ion-shopping-cart"></i> -->
                <i class="fas fa-users"></i>
            </div>
            <a href="<?php echo base_url('backend/pengguna/Pelanggan'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-lime">
            <div class="inner">
                <h3><?php echo count($total_kategori) ?></h3>

                <p>Total Kategori</p>
            </div>
            <div class="icon">
                <!-- <i class="ion ion-person-add"></i> -->
                <i class="fas fa-tags"></i>
            </div>
            <a href="<?php echo site_url('backend/data_master/Kategori') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-orange">
            <div class="inner">
                <h3><?php echo count($total_fasilitas) ?></h3>

                <p>Total Fasilitas</p>
            </div>
            <div class="icon">
                <!-- <i class="ion ion-person-add"></i> -->
                <i class="fas fa-shopping-bag"></i>
            </div>
            <a href="<?php echo site_url('backend/data_master/Fasilitas') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3><?php echo count($total_rekening) ?></h3>

                <p>Rekening</p>
            </div>
            <div class="icon">
                <!-- <i class="ion ion-pie-graph"></i> -->
                <i class="fab fa-cc-mastercard"></i>
            </div>
            <a href="<?php echo site_url('backend/data_master/Rekening') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?php echo count($total_header_transaksi) ?></h3>

                <p>Total Penyewaan</p>
            </div>
            <div class="icon">
                <!-- <i class="ion ion-stats-bars"></i> -->
                <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="<?php echo site_url('backend/transaksi/Penyewaan') ?>" class=" small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?php echo count($total_contact) ?></h3>

                <p>Message</p>
            </div>
            <div class="icon">
                <!-- <i class="ion ion-pie-graph"></i> -->
                <i class="fas fa-comments"></i>
            </div>
            <a href="<?php echo base_url('backend/buku/Contact') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-olive">
            <div class="inner">
                <h3><?php echo count($total_galleri) ?></h3>

                <p>Galleri</p>
            </div>
            <div class="icon">
                <!-- <i class="ion ion-pie-graph"></i> -->
                <i class="fas fa-images"></i>
            </div>
            <a href="<?php echo base_url('backend/dokumentasi/Galleri') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div> <br>

<!-- Main content -->
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="sticky-top mb-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Info Events</h4>
                </div>
                <div class="card-body">
                    <!-- the events -->
                    <div id="external-events">
                        <div class="external-event bg-primary">Lunas</div>
                        <div class="external-event bg-danger">Menunggu Konfirmasi</div>
                        <div class="external-event bg-warning">Menunggu Pembayaran</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>