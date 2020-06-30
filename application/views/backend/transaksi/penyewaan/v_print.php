<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style type="text/css" media="print">
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        .print {
            top: 2.54cm;
            bottom: 2.54cm;
            left: 3.18cm;
            right: 3.18cm;

            /* width: 20.9cm; */
            /* height: 29.6cm; */
            height: 33.6cm;
        }

        .table1 {
            border: solid thin #000;
            border-collapse: collapse;
        }

        td,
        th {
            /* padding: 3mm 6mm; */
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #F5F5F5;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
        }

        .btn-group {
            display: none;
        }
    </style>

    <style type="text/css" media="screen">

    </style>
</head>

<body onload="print()">

    <div class="print">
        <p class="btn-group">
            <div class="btn-group float-right">
                <a href="<?php echo base_url('backend/transaksi/Penyewaan/') ?>" title="Kembali" class="btn btn-info btn-lg"><i class="fa fa-backward"></i> Kembali</a>
            </div>
        </p>
        <br>

        <!-- Main content -->
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-globe"></i> Golden Care.
                        <small class="float-right"><?php if ($header_transaksi->tanggal_bayar == "") {
                                                        echo 'Belum melakukan pembayaran';
                                                    } else {
                                                        echo date('d-m-Y', strtotime($header_transaksi->tanggal_bayar));
                                                    } ?></small>
                    </h4>
                </div>
            </div>
            <br>
            <center>
                <h3 class="page-header">
                    <h1>TRANSAKSI <?php echo $site->nama_web ?> <br> <small>Kode Transaksi # <i> <?= $header_transaksi->kode_transaksi ?></i></small></h1>
                    <hr>
                </h3>
            </center>
            <br>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-1 invoice-col">
                </div>
                <div class="col-sm-2 invoice-col">
                    <address>
                        <strong>Nama Penyewa</strong><br>
                        <td>No. Telpon</td><br>
                        <td>Alamat</td><br>
                        <td>Tanggal Acara</td><br>
                        <td>Tanggal Selesai Acara</td><br>
                        <td>Status</td>
                    </address>
                </div>
                <div class="col-sm-9 invoice-col">
                    <td>: <b> <?= $header_transaksi->nama; ?></b></td><br>
                    <td>: <?= $header_transaksi->no_telp; ?></td><br>
                    <td>: <?= $header_transaksi->alamat; ?></td><br>
                    <td>: <?= date('d-m-Y', strtotime($header_transaksi->tanggal_acara)); ?></td><br>
                    <td>: <?= date('d-m-Y', strtotime($header_transaksi->tanggal_selesai_acara)); ?></td><br>
                    <td>:
                        <?php if ($header_transaksi->status_bayar == "lunas") {
                            echo '<span class="badge bg-primary">LUNAS</span>';
                        } elseif ($header_transaksi->status_bayar == "konfirmasi") {
                            echo '<span class="badge  bg-danger">MENUNGGU KONFIRMASI PEMBAYARAN</span>';
                        } else {
                            echo '<span class="badge bg-warning">BELUM MELAKUKAN PEMBAYARAN</span>';
                        } ?>
                    </td>
                </div>
            </div><br>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="bg-info">
                                <th style=" text-align: center">NO</th>
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
                                    <td style=" text-align: center"> <?= $no++; ?> </td>
                                    <td><?php echo $isi->kode_fasilitas ?></td>
                                    <td><?php echo $isi->nama_fasilitas ?></td>
                                    <td><?php echo number_format($isi->jumlah) ?></td>
                                    <td><?php echo number_format($isi->harga) ?></td>
                                    <td><?php echo number_format($isi->total_harga) ?></td>
                                </tr>

                            <?php
                            endforeach;
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <table border="0">
                        <tbody>
                            <tr>
                                <td><strong>Bukti Bayar:</strong></td>
                                <td> <?php if ($header_transaksi->bukti_bayar == "") {
                                            echo '<strong>Belum ada bukti pembayaran</strong>';
                                        } else { ?>
                            <tr>
                                <td>
                                    <img src=" <?php echo base_url('assets/backend/img/bukti_bayar/asli/' . $header_transaksi->bukti_bayar) ?>" class="img img-responsive img-thumbnail" width="600">
                                </td>
                            </tr>
                        <?php } ?>
                        </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Tanggal Bayar: <?php if ($header_transaksi->tanggal_bayar == "") {
                                                        echo 'Belum melakukan pembayaran';
                                                    } else {
                                                        echo date('d-m-Y', strtotime($header_transaksi->tanggal_bayar));
                                                    } ?>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Total:</th>
                                    <th>Rp:<?php echo number_format($header_transaksi->jumlah_transaksi) ?></th>
                                </tr>
                            </table>
                        </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
</body>

</html>