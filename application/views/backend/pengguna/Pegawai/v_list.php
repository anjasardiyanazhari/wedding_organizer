<?php
// Notifikasi
if ($this->session->flashdata('success')) {
    echo "<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>";
}
?>

<p>
    <a href="<?php echo base_url('backend/pengguna/Pegawai/add/'); ?>" class="btn btn-success btn-lg">
        <i class="fa fa-plus"></i> Tambah Data
    </a>
</p>

<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="text-align: center">NO</th>
            <th>NAMA LENGKAP</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th>NO TELP</th>
            <th>ALAMAT</th>
            <th style="text-align: center">ACCESS LEVEL</th>
            <th style="text-align: center">ACTION</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $no = 1;
        foreach ($pegawai as $isi) :
        ?>

            <tr>
                <td style="text-align: center"> <?= $no++; ?> </td>
                <td> <?php echo $isi->nama; ?> </td>
                <td> <?php echo $isi->username; ?> </td>
                <td> <?php echo $isi->password; ?> </td>
                <td> <?php echo $isi->no_telp; ?> </td>
                <td> <?php echo $isi->alamat; ?></td>
                <td style="text-align: center"> <?php echo $isi->akses_level; ?></td>
                <td style="text-align: center">
                    <div class="btn-group">
                        <a href="<?php echo base_url('backend/pengguna/Pegawai/edit/' . $isi->id_pegawai) ?>" class="btn btn-warning btn-xs"><i class="far fas fa-edit"></i> Edit</a>
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
            <th>NAMA LENGKAP</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th>NO TELP</th>
            <th>ALAMAT</th>
            <th style="text-align: center">ACCESS LEVEL</th>
            <th style="text-align: center">ACTION</th>
        </tr>
    </tfoot>
</table>