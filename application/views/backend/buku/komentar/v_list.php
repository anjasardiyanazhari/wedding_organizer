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
            <th>EMAIL</th>
            <th>KOMENTAR</th>
            <th style="text-align: center">ACTION</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $no = 1;
        foreach ($komentar as $isi) :
        ?>

            <tr>
                <td style="text-align: center"> <?= $no++; ?> </td>
                <td> <?php echo $isi->nama; ?> </td>
                <td> <?php echo $isi->email; ?> </td>
                <td> <?php echo $isi->komentar; ?> </td>
                <td style="text-align: center">
                    <div class="btn-group">
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
            <th>EMAIL</th>
            <th>KOMENTAR</th>
            <th style="text-align: center">ACTION</th>
        </tr>
        </tr>
    </tfoot>
</table>