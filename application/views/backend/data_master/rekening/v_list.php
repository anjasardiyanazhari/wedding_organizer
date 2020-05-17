<?php
// Notifikasi
if ($this->session->flashdata('success')) {
    echo "<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>";
}
?>

<?php
// Validasi level_akses
if ($this->session->userdata('akses_level') == 'Admin') :
?>
    <p>
        <a href="<?php echo base_url('backend/data_master/Rekening/add/'); ?>" class="btn btn-success btn-lg">
            <i class="fa fa-plus"></i> Tambah Data
        </a>
    </p>

<?php endif; ?>

<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="text-align: center">NO</th>
            <th>NAMA BANK</th>
            <th>NOMOR REKENING</th>
            <th>NAMA PEMILIK</th>
            <th style="text-align: center">ACTION</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $no = 1;
        foreach ($rekening as $isi) :
        ?>

            <tr>
                <td style="text-align: center"> <?= $no++; ?> </td>
                <td> <?php echo $isi->nama_bank; ?> </td>
                <td> <?php echo $isi->nomor_rekening; ?> </td>
                <td> <?php echo $isi->nama_pemilik; ?> </td>
                <td style="text-align: center">
                    <div class="btn-group">
                        <a href="<?php echo base_url('backend/data_master/Rekening/edit/' . $isi->id_rekening) ?>" class="btn btn-warning btn-xs"><i class="far fas fa-edit"></i> Edit</a>
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
            <th>NAMA BANK</th>
            <th>NOMOR REKENING</th>
            <th>NAMA PEMILIK</th>
            <th style="text-align: center">ACTION</th>
        </tr>
    </tfoot>
</table>