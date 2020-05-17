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
echo form_open_multipart(base_url('backend/dokumentasi/Galleri/proses_add/'), 'class="form-horizontal"');
?>

<p class="btn-group">
    <div class="btn-group float-left">
        <a href="<?php echo base_url('backend/dokumentasi/Galleri/') ?>" title="Kembali" class="btn btn-info btn-lg"><i class="fa fa-backward"></i> Kembali</a>
    </div>
</p>

<!-- Horizontal Form -->
<form action="" method="POST">
    <div class="card-body">
        <div class="form-group row">
            <label for="judul_foto" class="col-sm-2 col-form-label">Judul Foto</label>
            <div class="col-sm-6">
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
<?php echo form_close(); ?>