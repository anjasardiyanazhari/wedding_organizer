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
echo form_open_multipart(base_url('backend/setting/konfigurasi/edit_icon/'), 'class="form-horizontal"');
?>

<!-- Horizontal Form -->
<form action="" method="POST">
    <div class="card-body">
        <div class="form-group row">
            <label for="nama_web" class="col-sm-2 col-form-label">Nama Website</label>
            <div class="col-sm-6">
                <input type="hidden" name="id_konfigurasi" value="<?php echo $isi_form->id_konfigurasi; ?>">
                <input type="text" class="form-control" name="nama_web" id="nama_web" placeholder=" Nama Website..." value="<?php echo $isi_form->nama_web; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Upload Icon</label>
            <div class="col-sm-6">
                <input type="file" accept="image/*" class="form-control" name="icon" id="icon">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Icon Lama</label>
            <div class="col-sm-6">
                <img src=" <?php echo base_url('assets/backend/img/icon/thumbnail/' . $isi_form->icon) ?>" class="img img-responsive img-thumbnail" width="200" height="200">
            </div>
        </div>

        <div class="form-group row">
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