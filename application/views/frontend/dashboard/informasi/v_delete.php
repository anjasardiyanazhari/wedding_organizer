<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#delete-<?php echo $isi->kode_transaksi ?>">
    <i class="fa fa-trash"></i> Delete
</button>

<div class="modal fade" id="delete-<?php echo $isi->kode_transaksi ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">HAPUS <?php echo (isset($sub_title) ? $sub_title : 'DATA'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info alert-dismissible">
                    <h4>Peringatan !</h4>
                    Yakin ingin menghapus data ini..? Data yang sudah di hapus tidak dapat di kembalikan
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <a href="<?php echo base_url('frontend/dashboard/Informasi/delete_penyewaan/' . $isi->kode_transaksi) ?>" class="btn btn-success"> Ya, saya yakin</a>
            </div>
        </div>
    </div>
</div>