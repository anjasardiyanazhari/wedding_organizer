<?php
// Error Upload
if ($this->session->flashdata('error')) {
    echo "<div class='alert alert-warning'>" . $this->session->flashdata('error') . "</div>";
}

// Notifikasi
if ($this->session->flashdata('success')) {
    echo "<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>";
}

//Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form Open
echo form_open_multipart(base_url('backend/data_master/Fasilitas/proses_add_foto/'), 'class="form-horizontal"');
?>

<p class="btn-group">
    <div class="btn-group float-left">
        <a href="<?php echo base_url('backend/data_master/Fasilitas/') ?>" title="Kembali" class="btn btn-info btn-lg"><i class="fa fa-backward"></i> Kembali</a>
    </div>
</p>

<!-- Horizontal Form -->
<form action="" method="POST">
    <div class="card-body">
        <div class="form-group row">
            <label for="judul_foto" class="col-sm-2 col-form-label">Judul Foto</label>
            <div class="col-sm-6">
                <input type="hidden" name="id_fasilitas" value="<?php echo $isi_form->id_fasilitas; ?>">
                <input type="text" class="form-control" name="judul_foto" id="judul_foto" placeholder=" Judul Foto..." value="<?php echo set_value('judul_foto'); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Upload Foto</label>
            <div class="col-sm-6">
                <input type="file" accept="image/*" class="form-control" name="foto" id="foto">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-danger" name="reset"><i class="fa fa-times"></i> Reset</button>
            </div>
        </div>
    </div>
</form>
<hr>
<?php echo form_close(); ?>

<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="text-align: center">NO</th>
            <th>FOTO</th>
            <th>JUDUL</th>
            <th style="text-align: center">ACTION</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td style="text-align: center">1</td>
            <td style="text-align: center">
                <img src="<?php echo base_url('assets/backend/img/fasilitas/thumbnail/' . $isi_form->foto) ?>" class="img img-responsive img-thumbnail" width="75" height="50">
            </td>
            <td><?php echo $isi_form->nama_fasilitas ?></td>
            <td> </td>
        </tr>

        <?php $no = 2;
        foreach ($isi_form_tbl_foto as $isi_form) :
        ?>

            <tr>
                <td style="text-align: center"><?php echo $no ?></td>
                <td style="text-align: center">
                    <img src=" <?php echo base_url('assets/backend/img/fasilitas/thumbnail/' . $isi_form->foto) ?>" class="img img-responsive img-thumbnail" width="75" height="50">
                </td>
                <td><?php echo $isi_form->judul_foto ?></td>

                <td style="text-align: center">
                    <div class="btn-group">
                        <?php include('v_delete_foto.php') ?>
                    </div>
                </td>
            </tr>

        <?php $no++;
        endforeach;
        ?>

    </tbody>
    <tfoot>
        <tr>
            <th style="text-align: center">NO</th>
            <th>FOTO</th>
            <th>JUDUL</th>
            <th style="text-align: center">ACTION</th>
        </tr>
    </tfoot>
</table>