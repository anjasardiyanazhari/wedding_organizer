<?php
// Notifikasi
if ($this->session->flashdata('success')) {
    echo "<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>";
}
?>

<p>
    <a href="<?php echo base_url('backend/data_master/Fasilitas/add/'); ?>" class="btn btn-success btn-lg">
        <i class="fa fa-plus"></i> Tambah Data
    </a>
</p>

<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="text-align: center">NO</th>
            <th>FOTO</th>
            <th>NAMA</th>
            <th>KATEGORI</th>
            <th>HARGA</th>
            <th>DESKRIPSI</th>
            <th>STATUS</th>
            <th style="text-align: center">ACTION</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $no = 1;
        foreach ($fasilitas as $isi) :
        ?>

            <tr>
                <td style="text-align: center"> <?= $no++; ?> </td>
                <td style="text-align: center">
                    <img src=" <?php echo base_url('assets/backend/img/fasilitas/thumbnail/' . $isi->foto) ?>" class="img img-responsive img-thumbnail" width="75" height="50">
                </td>
                <td> <?php echo $isi->nama_fasilitas; ?> </td>
                <td> <?php echo $isi->nama_kategori; ?> </td>
                <td> <?php echo number_format($isi->harga, '0', ',', '.'); ?> </td>
                <td> <?php echo $isi->deskripsi; ?> </td>
                <td> <?php echo $isi->status_fasilitas; ?></td>
                <td style="text-align: center">
                    <div class="btn-group">
                        <a href="<?php echo base_url('backend/data_master/Fasilitas/add_foto/' . $isi->id_fasilitas) ?>" class="btn btn-primary btn-xs"><i class="fa fa-image"></i> Foto (<?php echo $isi->total_foto; ?>)</a>
                        <a href="<?php echo base_url('backend/data_master/Fasilitas/edit/' . $isi->id_fasilitas) ?>" class="btn btn-warning btn-xs"><i class="far fas fa-edit"></i> Edit</a>
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
            <th>FOTO</th>
            <th>NAMA</th>
            <th>KATEGORI</th>
            <th>HARGA</th>
            <th>DESKRIPSI</th>
            <th>STATUS</th>
            <th style="text-align: center">ACTION</th>
        </tr>
    </tfoot>
</table>