<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-<?php echo $isi->kode_transaksi ?>">
    <i class=" far fa-credit-card"></i> Set Status Lunas
</button>
<div class="modal fade" id="delete-<?php echo $isi->kode_transaksi ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><?php echo (isset($sub_title) ? $sub_title : 'DATA'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning alert-dismissible">
                    <h4>Peringatan !</h4>
                    Yakin ingin update status data ini..? Mohon cek kembali bukti pembayaran terlebih dahulu
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                <a href="<?php echo base_url('backend/transaksi/Penyewaan/update_status/' . $isi->kode_transaksi)  ?>" class="btn btn-success"> Ya, saya yakin</a>
            </div>
        </div>
    </div>
</div>