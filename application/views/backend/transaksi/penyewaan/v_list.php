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
                    <div class=" btn-group">
                        <a href="<?php echo base_url('backend/transaksi/Penyewaan/bukti/' . $isi->kode_transaksi) ?>" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Bukti Bayar</a>
                        <a href="<?php echo base_url('backend/transaksi/Penyewaan/update/' . $isi->kode_transaksi) ?>" class="btn btn-info btn-xs"><i class="fa fa-check"></i> Update Status</a>
                    </div>
                    <div class="clearfix"></div><br>
                    <div class="btn-group">
                        <a href="https://api.whatsapp.com/send?phone=+62<?php echo $isi->no_telp ?>&text=Hallo...,%0a Kami dari _wedding organizer_ Golden Care, Ingin mengkonfirmasi *apakah benar* dengan data berikut: %0a %0a *Data Diri* %0a Nama : <?php echo $isi->nama ?>, %0a No Telp : <?php echo $isi->no_telp ?>, %0a Email : <?php echo $isi->email ?>, %0a Alamat : <?php echo $isi->alamat ?>. %0a %0a *Data Penyewaan* %0a Kode Transaksi : <?php echo $isi->kode_transaksi ?>, %0a Tanggal Acara : <?php echo $isi->tanggal_acara ?>, %0a Tanggal Selesai Acara : <?php echo $isi->tanggal_selesai_acara ?>, %0a Jumlah Hari : <?php echo $jmlHari ?>, %0a Jumlah Item : <?php echo $isi->total_item ?>, %0a Jumlah Harga/Hari : <?php echo $isi->jumlah_transaksi ?>, %0a Total Pembayaran : <?php echo number_format($isi->jumlah_transaksi * $jmlHari, 0, ',', '.') ?>, %0a Status Bayar : *<?php echo $isi->status_bayar ?>*." target=" _blank">
                            <button class="btn btn-primary btn-sm">
                                <img><i class="fab fa-whatsapp"></i> Chat WA</img>
                            </button>
                        </a>
                        <a href="<?php echo base_url('backend/transaksi/Penyewaan/print/' . $isi->kode_transaksi) ?>" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Print Data</a>
                    </div>
                    <div class="clearfix"></div><br>
                    <div class="btn-group">
                        <a href="<?php echo base_url('backend/transaksi/Penyewaan/pdf/' . $isi->kode_transaksi) ?>" class="btn btn-warning btn-xs" target="_blank"><i class="fa fa-file-pdf"></i> Unduh PDF</a>
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