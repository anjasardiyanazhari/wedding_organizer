<?php
// Notifikasi
if ($this->session->flashdata('success')) {
    echo "<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>";
}
?>

<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="text-align: center">NO</th>
            <th>NAMA PELANGGAN</th>
            <th>KODE TRANSAKSI</th>
            <th>TANGGAL ACARA</th>
            <th>TANGGAL SELESAI </th>
            <th>JUMLAH HARI</th>
            <th>TANGGAL CHECKOUT</th>
            <th>TANGGAL BAYAR</th>
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
        foreach ($header_transaksi as $isi) :
        ?>

            <tr>
                <td style="text-align: center"> <?= $no++; ?> </td>
                <td><?php echo $isi->nama ?>
                    <br>
                    <small>
                        Telepon: <?php echo $isi->no_telp ?>
                        <br>
                        Email: <?php echo $isi->email ?>
                        <div>
                            Alamat: <?php echo nl2br($isi->alamat) ?>
                    </small>
                </td>
                <td><?php echo $isi->kode_transaksi ?></td>
                <td><?php echo date('d-m-Y', strtotime($isi->tanggal_acara)) ?></td>
                <td><?php echo date('d-m-Y', strtotime($isi->tanggal_selesai_acara)) ?></td>

                <?php
                $x  = strtotime($isi->tanggal_acara);
                $y  = strtotime($isi->tanggal_selesai_acara);
                $jmlHari  = abs(($x - $y) / (60 * 60 * 24));
                ?>
                <td style="text-align: center"> <?php echo $jmlHari ?></td>

                <td><?php echo date('d-m-Y', strtotime($isi->tanggal_checkout)) ?></td>
                <td>
                    <?php if ($isi->tanggal_bayar != "") { ?>
                        <?php echo date('d-m-Y', strtotime($isi->tanggal_bayar)) ?>
                    <?php } else {
                        echo 'pending ';
                    } ?>
                </td>
                <td><?php echo $isi->total_item ?></td>
                <td><?php echo number_format($isi->jumlah_transaksi) ?></td>
                <td><?php echo number_format($isi->jumlah_transaksi * $jmlHari, 0, ',', '.') ?></td>

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
                        <a href="<?php echo base_url('backend/transaksi/Penyewaan/bukti/' . $isi->kode_transaksi) ?>" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Bukti Bayar</a>
                        <a href="<?php echo base_url('backend/transaksi/Penyewaan/update/' . $isi->kode_transaksi) ?>" class="btn btn-info btn-xs"><i class="fa fa-check"></i> Update Status</a>
                    </div>
                    <div class="clearfix"></div><br>
                    <div class="btn-group">
                        <a href="<?php echo base_url('backend/transaksi/Penyewaan/print/' . $isi->kode_transaksi) ?>" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Print Data</a>
                        <a href="<?php echo base_url('backend/transaksi/Penyewaan/pdf/' . $isi->kode_transaksi) ?>" class="btn btn-warning btn-xs" target="_blank"><i class="fa fa-file-pdf"></i> Unduh PDF</a>
                    </div>
                    <div class="clearfix"></div><br>
                    <div class="btn-group">
                        <a href="<?php echo base_url('backend/transaksi/Penyewaan/word/' . $isi->kode_transaksi) ?>" class="btn btn-info btn-xs"><i class="fa fa-file-word"></i> Unduh Word</a>
                        <?php include('v_delete.php') ?>
                    </div>
                </td>
            </tr>

        <?php
        endforeach;
        ?>

    </tbody>
    <tfoot>
        <tr>
            <th style="text-align: center">NO</th>
            <th>NAMA PELANGGAN</th>
            <th>KODE TRANSAKSI</th>
            <th>TANGGAL ACARA</th>
            <th>TANGGAL CHECK OUT</th>
            <th>TANGGAL BAYAR</th>
            <th>JUMLAH HARGA</th>
            <th>JUMLAH ITEM</th>
            <th>STATUS</th>
            <th style="text-align: center">ACTION</th>
        </tr>
    </tfoot>
</table>