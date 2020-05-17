<?php
// Error Upload
if (isset($error)) {
    echo '<p class="alert alert-warning">', $error;
    '</p>';
}

//Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form Open
echo form_open_multipart(base_url('backend/data_master/Kategori/proses_add/'), 'class="form-horizontal"');
?>

<p class="btn-group">
    <div class="btn-group float-left">
        <a href="<?php echo base_url('backend/data_master/Kategori/') ?>" title="Kembali" class="btn btn-info btn-lg"><i class="fa fa-backward"></i> Kembali</a>
    </div>
</p>

<!-- Horizontal Form -->
<form action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder=" Nama kategori..." value="<?php echo set_value('nama_kategori'); ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="urutan" class="col-sm-2 col-form-label">Urutan</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="urutan" id="urutan" placeholder=" Urutan Kategori..." value="<?php echo set_value('urutan'); ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-danger" name="reset"><i class="fa fa-times"></i> Reset</button>
            </div>
        </div>
    </div>
</form>

<?php echo form_close(); ?>