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

        .kertas {
            width: 19cm;
            height: 27cm;
            padding: 1cm;
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
    </style>
</head>

<body>
    <div class="kertas">
        <div class="panel-body">
            <center>
                <h3 class="page-header">
                    <h1>TRANSAKSI <?php echo $site->nama_web ?> <br> <small>Kode Transaksi # <i> <?= $header_transaksi->kode_transaksi ?></i></small></h1>
                    <hr>
                </h3>
            </center>
            <br>

            <table border="0">
                <tbody>
                    <tr>
                        <td rowspan=" 5" width="40"></td>
                        <td>Nama Penyewa</td>
                        <td rowspan=" 5" width="40"></td>
                        <td>: <?= $header_transaksi->nama; ?></td>
                    </tr>
                    <tr>
                        <td>No. Telpon</td>
                        <td>: <?= $header_transaksi->no_telp; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?= $header_transaksi->nama; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Acara</td>
                        <td>: <?= $header_transaksi->alamat; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <?php if ($header_transaksi->status_bayar == "lunas") {
                                echo '<p style="color:blue; font-weight:bold">: LUNAS</p>';
                            } elseif ($header_transaksi->status_bayar == "konfirmasi") {
                                echo '<p style="color:orange; font-weight:bold">: KONFIRMASI PEMBAYARAN</p>';
                            } else {
                                echo '<p style="color:red; font-weight:bold">: BELUM MELAKUKAN PEMBAYARAN</p>';
                            } ?>
                        </td>
                    </tr>

                </tbody>
            </table>

            <br>

            <table class="table1" style=" border: solid thin #000" border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr class=" bg-info">
                        <th style=" text-align: center">NO</th>
                        <th style="padding: 3mm 6mm">KODE FASILITAS</th>
                        <th style="padding: 3mm 6mm">NAMA FASILITAS</th>
                        <th style="padding: 3mm 6mm">JUMLAH</th>
                        <th style="padding: 3mm 6mm">HARGA</th>
                        <th style="padding: 3mm 6mm">SUB TOTAL</th>
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
                            <td style=" text-align: center"><?php echo number_format($isi->jumlah) ?></td>
                            <td><?php echo number_format($isi->harga) ?></td>
                            <td><?php echo number_format($isi->total_harga) ?></td>
                        </tr>

                    <?php
                    endforeach;
                    ?>


                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td colspan="4"><strong>TOTAL PENYEWAAN</strong></td>
                        <td><strong>Rp:<?php echo number_format($header_transaksi->jumlah_transaksi) ?></strong></td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</body>

</html>