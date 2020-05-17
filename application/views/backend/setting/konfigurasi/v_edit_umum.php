<?php
// Error Upload
if (isset($error)) {
    echo '<p class="alert alert-warning">', $error;
    '</p>';
}

// Notifikasi
if ($this->session->flashdata('success')) {
    echo "<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>";
}

//Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form Open
echo form_open_multipart(base_url('backend/setting/konfigurasi/edit_umum/'), 'class="form-horizontal"');
?>

<!-- Horizontal Form -->
<form action="" method="POST">
    <div class="card-body">
        <div class="form-group row">
            <label for="nama_web" class="col-sm-2 col-form-label">Nama Website</label>
            <div class="col-sm-6">
                <input type="hidden" name="id_konfigurasi" value="<?php echo $isi_form->id_konfigurasi; ?>">
                <input type="text" class="form-control" name="nama_web" id="nama_web" placeholder=" Nama Website..." value="<?php echo $isi_form->nama_web; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="nama_web" class="col-sm-2 col-form-label">Tag Line</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="tag_line" id="tag_line" placeholder=" Tag Line..." value="<?php echo $isi_form->tag_line; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="nama_web" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="email" id="email" placeholder=" Email..." value="<?php echo $isi_form->email; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="nama_web" class="col-sm-2 col-form-label">Link Website</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="link_website" id="link_website" placeholder=" Link Website..." value="<?php echo $isi_form->link_website; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="nama_web" class="col-sm-2 col-form-label">No Telp</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder=" No Telp..." value="<?php echo $isi_form->no_telp; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="nama_web" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-6">
                <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder=" Alamat..."><?php echo $isi_form->alamat; ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="googel_maps" class="col-sm-2 col-form-label">Googel Maps</label>
            <div class="col-sm-6">
                <textarea class="form-control" rows="3" name="google_maps" id="google_maps" placeholder=" Google Maps..."><?php echo $isi_form->google_maps; ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="nama_web" class="col-sm-2 col-form-label">Facebook</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="facebook" id="facebook" placeholder=" Facebook..." value="<?php echo $isi_form->facebook; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="nama_web" class="col-sm-2 col-form-label">Instagram</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="instagram" id="instagram" placeholder=" Instagram..." value="<?php echo $isi_form->instagram; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="nama_web" class="col-sm-2 col-form-label">Twitter</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="twitter" id="twitter" placeholder=" Twitter..." value="<?php echo $isi_form->twitter; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="keyword" class="col-sm-2 col-form-label">Keyword (SEO Google)</label>
            <div class="col-sm-6">
                <textarea class="form-control" rows="3" name="keyword" id="keyword" placeholder=" Keyword SEO Google..."><?php echo $isi_form->keyword; ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-6">
                <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder=" Deskripsi..."><?php echo $isi_form->deskripsi; ?></textarea>
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