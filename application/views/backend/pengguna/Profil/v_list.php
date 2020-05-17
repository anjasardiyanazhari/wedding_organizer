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

        <tr>
            <td style="text-align: center"> 1 </td>
            <td> <?php echo $profil->nama; ?> </td>
            <td> <?php echo $profil->username; ?> </td>
            <td> <?php echo $profil->password; ?> </td>
            <td> <?php echo $profil->no_telp; ?> </td>
            <td> <?php echo $profil->alamat; ?></td>
            <td style="text-align: center"> <?php echo $profil->akses_level; ?></td>
            <td style="text-align: center">
                <div class="btn-group">
                    <a href="<?php echo base_url('backend/pengguna/Profil/edit/' . $profil->id_pegawai) ?>" class="btn btn-warning btn-xs"><i class="far fas fa-edit"></i> Edit</a>
                </div>
            </td>
        </tr>

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