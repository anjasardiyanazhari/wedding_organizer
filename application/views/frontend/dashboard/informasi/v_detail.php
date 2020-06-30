<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url('<?php echo base_url() ?>assets/backend/img/home/heading4.png');">
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

                    <p>Berikut Adalah Detail Sewa Anda</p>

                    <?php

                    // Kalau Ada transaksi, Tampilkan Table
                    if ($header_transaksi) { ?>
                        <table id="example1" class="table table-bordered table-stripe">
                            <thead>
                                <tr class="bg-success">
                                    <th width="30%">KODE TRANSAKSI</th>
                                    <th>: <?php echo $header_transaksi->kode_transaksi ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Tanggal Acara</td>
                                    <td> <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_acara)) ?></td>
                                </tr>

                                <tr>
                                    <td>Tanggal Selesai Acara</td>
                                    <td> <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_selesai_acara)) ?></td>
                                </tr>

                                <tr>
                                    <?php
                                    $x  = strtotime($header_transaksi->tanggal_acara);
                                    $y  = strtotime($header_transaksi->tanggal_selesai_acara);
                                    $jmlHari  = abs(($x - $y) / (60 * 60 * 24));
                                    ?>

                                    <td>Jumlah Hari</td>
                                    <td> <?php echo $jmlHari ?></td>
                                </tr>

                                <tr>
                                    <td>Jumlah Item</td>
                                    <td> <?php echo number_format($header_transaksi->total_item) ?></td>
                                </tr>

                                <tr>
                                    <td>Jumlah Harga/Hari</td>
                                    <td> <?php echo number_format($header_transaksi->jumlah_transaksi, 0, ',', '.') ?></td>
                                </tr>

                                <tr>
                                    <td>Total Pembayaran</td>
                                    <td> <span class="badge bg-primary"><?php echo number_format($header_transaksi->jumlah_transaksi * $jmlHari, 0, ',', '.') ?> </span></td>
                                </tr>

                                <tr>
                                    <td>Status Bayar</td>
                                    <td> <?php echo $header_transaksi->status_bayar  ?></td>
                                </tr>
                            </tbody>
                        </table><br>


                        <div class="wrap-table-shopping-cart bgwhite">

                            <table id="example1" class="table table-bordered table-stripe">
                                <thead>
                                    <tr class="bg-success">
                                        <th>NO</th>
                                        <th>KODE FASILITAS</th>
                                        <th>NAMA FASILITAS</th>
                                        <th>JUMLAH</th>
                                        <th>HARGA</th>
                                        <th>SUB TOTAL</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    $no = 1;
                                    foreach ($transaksi as $isi) : ?>

                                        <tr>
                                            <td> <?= $no++; ?> </td>
                                            <td><?php echo $isi->kode_fasilitas ?></td>
                                            <td><?php echo $isi->nama_fasilitas ?></td>
                                            <td style="text-align: center"><?php echo number_format($isi->jumlah) ?></td>
                                            <td><?php echo number_format($isi->harga, 0, ',', '.') ?></td>
                                            <td><?php echo number_format($isi->total_harga, 0, ',', '.') ?></td>
                                        </tr>

                                    <?php
                                    endforeach;
                                    ?>

                                </tbody>
                            </table>
                        </div>

                    <?php

                        // Kalau Tidak Ada transaksi, Tampilkan notifikasi
                    } else { ?>

                        <div class="col-sm-12 ">
                            <p class="alert alert-success"><i class="fa fa-warning"></i> Belum Ada Transaksi</p>
                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>