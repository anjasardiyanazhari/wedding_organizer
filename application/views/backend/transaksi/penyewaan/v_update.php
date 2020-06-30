<?php
// Notifikasi
if ($this->session->flashdata('success')) {
    echo "<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>";
}
?>

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
                <small class="float-right">Tanggal Bayar: <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_bayar)) ?></small>
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
        <!--col -->
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
        <!-- /.col -->
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
            <p class="lead">Payment Methods:</p>
            <img src="<?php echo base_url() ?>assets/backend/img/home/credit/visa.png" alt="Visa">
            <img src="<?php echo base_url() ?>assets/backend/img/home/credit/mastercard.png" alt="Mastercard">
            <img src="<?php echo base_url() ?>assets/backend/img/home/credit/american-express.png" alt="American Express">
            <img src="<?php echo base_url() ?>assets/backend/img/home/credit/paypal2.png" alt="Paypal">

            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                plugg
                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
            </p>
        </div>
        <!-- /.col -->
        <div class="col-6">
            <p class="lead">Tanggal Bayar: <?php if ($header_transaksi->tanggal_bayar == "") {
                                                echo 'Belum melakukan pembayaran';
                                            } else {
                                                echo date('d-m-Y', strtotime($header_transaksi->tanggal_bayar));
                                            } ?>
            </p>

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
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-12">
            <a href="<?php echo base_url('backend/transaksi/Penyewaan/print/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-info "><i class="fas fa-print"></i> Print</a>

            <?php if ($header_transaksi->status_bayar != "konfirmasi") {
                echo '';
            } else { ?>
                <p class="float-right">
                    <?php include('v_set.php') ?>
                </p>
            <?php } ?>

        </div>
    </div>

</div>
<!-- /.invoice -->