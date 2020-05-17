<?php
// Error Upload
if ($this->session->flashdata('error')) {
    echo "<div class='alert alert-warning'>" . $this->session->flashdata('error') . "</div>";
}

//Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form Open
echo form_open_multipart(base_url('backend/data_master/Fasilitas/proses_add/'), 'class="form-horizontal"');
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
            <label for="nama_fasilitas" class="col-sm-2 col-form-label">Nama Fasilitas</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_fasilitas" id="nama_fasilitas" placeholder=" Nama Fasilitas..." value="<?php echo set_value('nama_fasilitas'); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="kode_fasilitas" class="col-sm-2 col-form-label">Kode Fasilitas</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode_fasilitas" id="kode_fasilitas" placeholder=" Kode Fasilitas..." value="<?php echo set_value('kode_fasilitas'); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-6">
                <select name="id_kategori" class="form-control">
                    <?php foreach ($kategori as $isi) { ?>
                        <option value="<?php echo $isi->id_kategori ?>"><?php echo $isi->nama_kategori ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga Fasilitas</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="harga" id="harga" placeholder=" Harga Fasilitas..." value="<?php echo set_value('harga'); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-6">
                <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder=" Deskripsi Fasilitas..."><?php echo set_value('deskripsi'); ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Upload Foto</label>
            <div class="col-sm-6">
                <input type="file" accept="image/*" class="form-control" name="foto" id="foto">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Status Fasilitas</label>
            <div class="col-sm-6">
                <select name="status_fasilitas" id="status_fasilitas" class="form-control">
                    <option value="Publish">Publikasikan</option>
                    <option value="Draft">Simpan Ke Draft</option>
                </select>
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