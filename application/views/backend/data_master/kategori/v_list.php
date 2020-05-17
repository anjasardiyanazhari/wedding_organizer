<?php
// Notifikasi
if ($this->session->flashdata('success')) {
    echo "<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>";
}
?>

<p>
    <a href="<?php echo base_url('backend/data_master/Kategori/add/'); ?>" class="btn btn-success btn-lg">
        <i class="fa fa-plus"></i> Tambah Data
    </a>
</p>

<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="text-align: center">NO</th>
            <th>NAMA</th>
            <th>SLUG</th>
            <th>URUTAN</th>
            <th style="text-align: center">ACTION</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $no = 1;
        foreach ($kategori as $isi) :
        ?>

            <tr>
                <td style="text-align: center"> <?= $no++; ?> </td>
                <td> <?php echo $isi->nama_kategori; ?> </td>
                <td> <?php echo $isi->slug_kategori; ?> </td>
                <td> <?php echo $isi->urutan; ?> </td>
                <td style="text-align: center">
                    <div class="btn-group">
                        <a href="<?php echo base_url('backend/data_master/kategori/edit/' . $isi->id_kategori) ?>" class="btn btn-warning btn-xs"><i class="far fas fa-edit"></i> Edit</a>
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
            <th>NAMA</th>
            <th>SLUG</th>
            <th>URUTAN</th>
            <th style="text-align: center">ACTION</th>
        </tr>
    </tfoot>
</table>