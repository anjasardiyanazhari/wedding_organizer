<?php
//Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form Open
echo form_open(base_url('backend/data_master/Rekening/proses_edit/'), 'class="form-horizontal"');
?>

<p class="btn-group">
    <div class="btn-group float-left">
        <a href="<?php echo base_url('backend/data_master/Rekening/') ?>" title="Kembali" class="btn btn-info btn-lg"><i class="fa fa-backward"></i> Kembali</a>
    </div>
</p>

<!-- Horizontal Form -->
<form action="" method="POST">
    <div class="card-body">
        <div class="form-group row">
            <label for="nama_bank" class="col-sm-2 col-form-label">Nama Bank</label>
            <div class="col-sm-6">
                <input type="hidden" name="id_rekening" value="<?php echo $isi_form->id_rekening; ?>">
                <input type="text" class="form-control" name="nama_bank" id="nama_bank" placeholder=" Nama Bank..." value="<?php echo $isi_form->nama_bank; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="nomor_rekening" class="col-sm-2 col-form-label">Nomor Rekening</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nomor_rekening" id="nomor_rekening" placeholder=" Nomor Rekening..." value="<?php echo $isi_form->nomor_rekening; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="nama_pemilik" class="col-sm-2 col-form-label">Nama Pemeilik Rekening (atas nama)</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder=" Nama Pemilik Rekening..." value="<?php echo $isi_form->nama_pemilik; ?>">
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