<?php
// Notifikasi
if ($this->session->flashdata('success')) {
    echo "<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>";
}
?>

<p>
    <a href="<?php echo base_url('backend/dokumentasi/Galleri/add/'); ?>" class="btn btn-success btn-lg">
        <i class="fa fa-plus"></i> Tambah Data
    </a>
</p>

<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="text-align: center">NO</th>
            <th>FOTO</th>
            <th>JUDUL FOTO</th>
            <th style="text-align: center">ACTION</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $no = 1;
        foreach ($galleri as $isi) :
        ?>

            <tr>
                <td style="text-align: center"> <?= $no++; ?> </td>
                <td style="text-align: center">
                    <img src=" <?php echo base_url('./assets/backend/img/dokumentasi/galleri/thumbnail/' . $isi->foto) ?>" class="img img-responsive img-thumbnail" width="75" height="50">
                </td>
                <td> <?php echo $isi->judul_foto; ?> </td>
                <td style="text-align: center">
                    <div class="btn-group">
                        <a href="<?php echo base_url('backend/dokumentasi/Galleri/edit/' . $isi->id_galleri) ?>" class="btn btn-warning btn-xs"><i class="far fas fa-edit"></i> Edit</a>
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
            <th>JUDUL FOTO</th>
            <th style="text-align: center">ACTION</th>
        </tr>
    </tfoot>
</table>