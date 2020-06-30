<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url('<?php echo base_url() ?>assets/backend/img/home/heading1.png');">
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
                <div class="flex-sb-m flex-w p-b-40">
                </div>

                <!-- Product -->
                <div class="body">
                    <h2> Selamat Datang <strong><?php echo $this->session->userdata('nama'); ?> !</strong> </h2>

                    <?php
                    // Notifikasi
                    if ($this->session->flashdata('success')) {
                        echo "<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>";
                    }
                    ?>

                    <div class="wrap-table-shopping-cart bgwhite">

                        <?php

                        // Kalau Ada transaksi, Tampilkan Table
                        if ($header_transaksi) { ?>
                            <table id="example1" class="table table-bordered table-stripe ">
                                <thead>
                                    <tr class="bg-success">
                                        <th>NO</th>
                                        <th>KODE TRANSAKSI</th>
                                        <th>TANGGAL ACARA</th>
                                        <th>TANGGAL SELESAI</th>
                                        <th>JUMLAH HARI</th>
                                        <th>JUMLAH ITEM</th>
                                        <th>JUMLAH HARGA/HARI</th>
                                        <th>TOTAL PEMBAYARAN</th>
                                        <th>STATUS</th>
                                        <th style="text-align: center">ACTION</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    $no = 1;
                                    foreach ($header_transaksi as $isi) : ?>

                                        <tr>
                                            <td> <?= $no++; ?> </td>
                                            <td><?php echo $isi->kode_transaksi ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($isi->tanggal_acara)) ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($isi->tanggal_selesai_acara)) ?></td>

                                            <?php
                                            $x  = strtotime($isi->tanggal_acara);
                                            $y  = strtotime($isi->tanggal_selesai_acara);
                                            $jmlHari  = abs(($x - $y) / (60 * 60 * 24));
                                            ?>
                                            <td style="text-align: center"> <?php echo $jmlHari ?></td>

                                            <td style="text-align: center"><?php echo $isi->total_item ?></td>
                                            <td><?php echo number_format($isi->jumlah_transaksi, 0, ',', '.') ?></td>
                                            <td> <span class="badge bg-primary"><?php echo number_format($isi->jumlah_transaksi * $jmlHari, 0, ',', '.') ?></span></td>
                                            <!-- <td><?php echo $isi->status_bayar ?></td> -->
                                            <td style="text-align: center">
                                                <?php if ($isi->status_bayar == "lunas") {
                                                    echo '<span class="badge bg-primary">LUNAS</span>';
                                                } elseif ($isi->status_bayar == "konfirmasi") {
                                                    echo '<span class="badge  bg-danger">MENUNGGU KONFIRMASI <br> PEMBAYARAN</span>';
                                                } else {
                                                    echo '<span class="badge bg-warning">BELUM MELAKUKAN <br> PEMBAYARAN</span>';
                                                } ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <?php include('v_delete.php') ?>
                                                    <a href="<?php echo base_url('frontend/dashboard/Riwayat/detail/' . $isi->kode_transaksi) ?>" class="btn btn-danger btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                                    <a href="<?php echo base_url('frontend/dashboard/Informasi/konfirmasi/' . $isi->kode_transaksi) ?>" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Konfirmasi</a>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php
                                    endforeach;
                                    ?>

                                </tbody>
                            </table>


                        <?php

                            // Kalau Tidak Ada transaksi, Tampilkan notifikasi
                        } else { ?>

                            <p class="alert alert-success"><i class="fa fa-warning"></i> Belum Ada Transaksi</p>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>