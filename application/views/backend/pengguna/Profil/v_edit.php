<?php
//Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form Open
echo form_open(base_url('backend/pengguna/Profil/proses_edit/'), 'class="form-horizontal"');
?>

<p class="btn-group">
    <div class="btn-group float-left">
        <a href="<?php echo base_url('backend/pengguna/Profil/') ?>" title="Kembali" class="btn btn-info btn-lg"><i class="fa fa-backward"></i> Kembali</a>
    </div>
</p>

<!-- Horizontal Form -->
<form action="" method="POST">
    <div class="card-body">
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Pegawai</label>
            <div class="col-sm-6">
                <input type="hidden" name="id_pegawai" value="<?php echo $isi_form->id_pegawai; ?>">
                <input type="text" class="form-control" name="nama" id="nama" placeholder=" Nama Lengkap Pegawai..." value="<?php echo $isi_form->nama; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="username" id="username" placeholder=" Username Pegawai..." value="<?php echo $isi_form->username; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="password" id="password" placeholder=" Password Pegawai..." value="<?php echo $isi_form->password; ?>">
                <span style="color: red">Ketik minimal 8 karakter untuk mengganti password baru, atau biarkan kosong</span>
            </div>
        </div>

        <div class="form-group row">
            <label for="no_telp" class="col-sm-2 col-form-label">No Telp</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder=" No Telp Pegawai..." value="<?php echo $isi_form->no_telp; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-6">
                <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder=" Alamat Pegawai..."><?php echo $isi_form->alamat; ?></textarea>
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