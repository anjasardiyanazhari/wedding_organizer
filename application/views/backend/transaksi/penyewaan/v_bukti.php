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
<div class="clearfix"></div><br>
<center>
    <h3 class="page-header">
        <h1>TRANSAKSI <?php echo $site->nama_web ?> <br> <small>Kode Transaksi # <i> <?= $header_transaksi->kode_transaksi ?></i></small></h1>
        <hr>
    </h3>
</center>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="25%">NAMA PELANGGAN</th>
            <th>: <?php echo $header_transaksi->nama ?></th>
        </tr>
        <tr>
            <th width="25%">KODE TRANSAKSI</th>
            <th>: <?php echo $header_transaksi->kode_transaksi ?></th>
        </tr>

        <tr>
            <th>TANGGAL ACARA</th>
            <th>: <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_acara)) ?></th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Tanggal Check Out</td>
            <td>: <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_checkout)) ?></td>
        </tr>

        <tr>
            <td>Jumlah Total</td>
            <td>: <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
        </tr>

        <tr>
            <td>Status Bayar</td>
            <td>: <?php echo $header_transaksi->status_bayar  ?></td>
        </tr>

        <tr>
            <td>Bukti Bayar</td>
            <!-- $header_transaksi->status_bayar  ?> -->
            <td>: <?php if ($header_transaksi->bukti_bayar == "") {
                        echo 'Belum ada bukti pembayaran';
                    } else { ?>
                    <img src=" <?php echo base_url('assets/backend/img/bukti_bayar/thumbnail/' . $header_transaksi->bukti_bayar) ?>" class="img img-responsive img-thumbnail" width="550">
                <?php } ?>
            </td>
        </tr>

        <tr>
            <td>Pembayaran ke rekening</td>
            <td>: <?php echo $header_transaksi->bank ?>,
                No. rekening <?php echo $header_transaksi->nomor_rekening ?>,
                a.n <?php echo $header_transaksi->nama_pemilik ?>
            </td>
        </tr>

        <tr>
            <td>Tanggal Bayar</td>
            <td>: <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_bayar)) ?></td>
        </tr>

        <tr>
            <td>Jumlah Pembayaran</td>
            <td>: <?php echo number_format($header_transaksi->jumlah_bayar, '0', ',', '.') ?></td>
        </tr>

        <tr>
            <td>Pembayaran dari</td>
            <td>: <?php echo $header_transaksi->nama_bank ?>,
                No. rekening <?php echo $header_transaksi->rekening_pembayaran ?>,
                a.n <?php echo $header_transaksi->rekening_pelanggan ?>
            </td>
        </tr>

    </tbody>
</table>