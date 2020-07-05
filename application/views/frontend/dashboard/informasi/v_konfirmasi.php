<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url('<?php echo base_url() ?>assets/backend/img/home/heading5.png');">
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

                    <p>Berikut Adalah Konfirmasi Pembayaran Anda</p>

                    <?php

                    // Kalau Ada transaksi, Tampilkan Table
                    if ($header_transaksi) { ?>

                        <!-- Tabel 1 -->
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-success">
                                    <th width="30%">KODE TRANSAKSI</th>
                                    <th> <?php echo $header_transaksi->kode_transaksi ?></th>
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

                                <tr>
                                    <td>Bukti Bayar</td>
                                    <td> <?php if ($header_transaksi->bukti_bayar != "") { ?>
                                            <img src=" <?php echo base_url('assets/backend/img/bukti_bayar/thumbnail/' . $header_transaksi->bukti_bayar) ?>" class="img img-responsive img-thumbnail" width="550">
                                        <?php } else {
                                                echo 'Belum ada bukti pembayaran';
                                            } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>

                        <?php
                        // Error Upload
                        if ($this->session->flashdata('success')) {
                            echo "<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>";
                        }

                        // Notifikasi error
                        echo validation_errors('<p class="alert alert-warning">', '</p>');

                        // Form Open
                        echo form_open_multipart(base_url('frontend/dashboard/Informasi/konfirmasi/' . $header_transaksi->kode_transaksi));
                        ?>

                        <!-- Tabel 2 -->
                        <div class="bo9 w-size100 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                            <!-- Horizontal Form -->
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="id_rekening" class="col-sm-12 col-form-label">PEMBAYARAN KE REKENING</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="bo4 of-hidden size15 m-b-0">
                                            <select class="sizefull s-text7 p-l-22 p-r-22" name="id_rekening" id="id_rekening">
                                                <?php foreach ($rekening as $isi) { ?>
                                                    <option value="<?php echo $isi->id_rekening ?>" <?php if ($header_transaksi->id_rekening == $isi->id_rekening) {
                                                                                                        echo "selected";
                                                                                                    } ?>> (Nama: <?php echo $isi->nama_bank ?>) (No. Rekening: <?php echo $isi->nomor_rekening ?>) (a. n: <?php echo $isi->nama_pemilik ?>)
                                                    </option> <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="tanggal_bayar" class="col-sm-12 col-form-label">Tanggal Bayar</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="bo4 of-hidden size15 m-b-0">
                                            <input type="text" class="sizefull s-text7 p-l-22 p-r-22" name="tanggal_bayar" id="tanggal_bayar" placeholder="dd-mm-yyyy" value="<?php if (isset($_POST['tanggal_bayar'])) {
                                                                                                                                                                                    echo set_value('tanggal_bayar');
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo date('d-m-Y');
                                                                                                                                                                                } ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="jumlah_bayar" class="col-sm-12 col-form-label">Jumlah Pembayaran</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="bo4 of-hidden size15 m-b-0">
                                            <input type="text" class="sizefull s-text7 p-l-22 p-r-22" name="jumlah_bayar" id="jumlah_bayar" placeholder="Jumlah Pembayaran" value="<?php if (isset($_POST['jumlah_bayar'])) {
                                                                                                                                                                                        echo set_value('jumlah_bayar');
                                                                                                                                                                                    } elseif ($header_transaksi->jumlah_bayar != "") {
                                                                                                                                                                                        echo $header_transaksi->jumlah_bayar;
                                                                                                                                                                                    } else {
                                                                                                                                                                                        echo $header_transaksi->jumlah_bayar;
                                                                                                                                                                                    } ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="nama_bank" class="col-sm-12 col-form-label">Dari Bank</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="bo4 of-hidden size15 m-b-0">
                                            <select class="sizefull s-text7 p-l-22 p-r-22" name="nama_bank" id="nama_bank">
                                                <?php
                                                if ($header_transaksi->nama_bank == "Bank Indonesia (BI)") {
                                                    echo " <option value='Bank Indonesia (BI)' Selected>Bank Indonesia (BI)</option>";
                                                } else {
                                                    echo " <option value='Bank Indonesia (BI)'>Bank Indonesia (BI)</option>";
                                                }
                                                if ($header_transaksi->nama_bank == "Bank Mandiri") {
                                                    echo " <option value='Bank Mandiri' Selected>Bank Mandiri</option>";
                                                } else {
                                                    echo " <option value='Bank Mandiri'>Bank Mandiri</option>";
                                                }
                                                if ($header_transaksi->nama_bank == "Bank BNI") {
                                                    echo " <option value='Bank BNI' Selected>Bank BNI</option>";
                                                } else {
                                                    echo " <option value='Bank BNI'>Bank BNI</option>";
                                                }
                                                if ($header_transaksi->nama_bank == "Bank BRI") {
                                                    echo " <option value='Bank BRI' Selected>Bank BRI</option>";
                                                } else {
                                                    echo " <option value='Bank BRI'>Bank BRI</option>";
                                                }
                                                if ($header_transaksi->nama_bank == "Bank BTN") {
                                                    echo " <option value='Bank BTN' Selected>Bank BTN</option>";
                                                } else {
                                                    echo " <option value='Bank BTN'>Bank BTN</option>";
                                                }
                                                if ($header_transaksi->nama_bank == "Bank BCA") {
                                                    echo " <option value='Bank BCA' Selected>Bank BCA</option>";
                                                } else {
                                                    echo " <option value='Bank BCA'>Bank BCA</option>";
                                                }
                                                if ($header_transaksi->nama_bank == "Bank CIMB Niaga") {
                                                    echo " <option value='Bank CIMB Niaga' Selected>Bank CIMB Niaga</option>";
                                                } else {
                                                    echo " <option value='Bank CIMB Niaga'>Bank CIMB Niaga</option>";
                                                }
                                                if ($header_transaksi->nama_bank == "Bank Danamon") {
                                                    echo " <option value='Bank Danamon' Selected>Bank Danamon</option>";
                                                } else {
                                                    echo " <option value='Bank Danamon'>Bank Danamon</option>";
                                                }
                                                if ($header_transaksi->nama_bank == "Bank Panin") {
                                                    echo " <option value='Bank Panin' Selected>Bank Panin</option>";
                                                } else {
                                                    echo " <option value='Bank Panin'>Bank Panin</option>";
                                                }
                                                if ($header_transaksi->nama_bank == "Bank Mybank") {
                                                    echo " <option value='Bank Mybank' Selected>Bank Mybank</option>";
                                                } else {
                                                    echo " <option value='Bank Mybank'>Bank Mybank</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="rekening_pembayaran" class="col-sm-12 col-form-label">Dari Nomor Rekening</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="bo4 of-hidden size15 m-b-0">
                                            <input type="number" class="sizefull s-text7 p-l-22 p-r-22" name="rekening_pembayaran" id="rekening_pembayaran" placeholder="Nomor Rekening" value="<?php if (isset($_POST['rekening_pembayaran'])) {
                                                                                                                                                                                                    echo set_value('rekening_pembayaran');
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    echo $header_transaksi->rekening_pembayaran;
                                                                                                                                                                                                } ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="rekening_pelanggan" class="col-sm-12 col-form-label">Nama Pemilik Rekening</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="bo4 of-hidden size15 m-b-0">
                                            <input type="text" class="sizefull s-text7 p-l-22 p-r-22" name="rekening_pelanggan" id="rekening_pelanggan" placeholder="Nama Pemilik Rekening" value="<?php if (isset($_POST['rekening_pelanggan'])) {
                                                                                                                                                                                                        echo set_value('rekening_pelanggan');
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        echo $header_transaksi->rekening_pelanggan;
                                                                                                                                                                                                    } ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3 p-b-0">
                                        <label for="bukti_bayar" class="col-sm-12 col-form-label">Upload Bukti Pembayaran</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="bo4 of-hidden size15 m-b-0">
                                            <input type="file" class="sizefull s-text7 p-l-22 p-r-22" name="bukti_bayar" id="bukti_bayar" placeholder="Upload Bukti Transaksi Pembayaran">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-upload"></i> Konfirmasi</button>
                                        <button type="reset" class="btn btn-danger" name="reset"><i class="fa fa-times"></i> Reset</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    <?php
                        // Form Close
                        echo form_close();

                        // Kalau Tidak Ada transaksi, Tampilkan notifikasi
                    } else { ?>

                        <p class=" alert alert-success"><i class="fa fa-warning"></i> Belum Ada Transaksi</p>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 
<div>
    <a href="https://api.whatsapp.com/send?phone=+<?php echo $site->no_telp ?>&text=Kode Transaksi=<?php echo $kode_transaksi; ?>" target="_blank"> </a>
</div> -->