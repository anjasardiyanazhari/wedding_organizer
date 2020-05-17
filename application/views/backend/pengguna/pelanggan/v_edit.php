<?php
//Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form Open
echo form_open(base_url('backend/pengguna/Pelanggan/proses_edit/'), 'class="form-horizontal"');
?>

<p class="btn-group">
    <div class="btn-group float-left">
        <a href="<?php echo base_url('backend/pengguna/Pelanggan/') ?>" title="Kembali" class="btn btn-info btn-lg"><i class="fa fa-backward"></i> Kembali</a>
    </div>
</p>

<!-- Horizontal Form -->
<form action="" method="POST">
    <div class="card-body">
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Pelanggan</label>
            <div class="col-sm-6">
                <input type="hidden" name="id_pelanggan" value="<?php echo $isi_form->id_pelanggan; ?>">
                <input type="text" class="form-control" name="nama" id="nama" placeholder=" Nama Lengkap Pelanggan..." value="<?php echo $isi_form->nama; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="email" id="email" placeholder=" Email Pelanggan..." value="<?php echo $isi_form->email; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="password" id="password" placeholder=" Password Pelanggan..." value="<?php echo $isi_form->password; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="no_telp" class="col-sm-2 col-form-label">No Telp</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder=" No Telp Pelanggan..." value="<?php echo $isi_form->no_telp; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-6">
                <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder=" Alamat Pelanggan..."><?php echo $isi_form->alamat; ?></textarea>
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