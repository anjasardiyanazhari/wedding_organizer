<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url('<?php echo base_url() ?>assets/backend/img/home/heading2.png');">
    <h2 class="l-text2 t-center">
        <?php echo $title ?>
    </h2>
    <p class="m-text13 t-center">
        <?php echo $site->link_website ?> |
        <?php echo $site->tag_line ?>
    </p>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">

                <?php
                // Notifikasi Delete Keranjang
                if ($this->session->flashdata('success')) {
                    echo "<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>";
                }
                ?>

                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1">Foto</th>
                        <th class="column-2">Fasilitas</th>
                        <th class="column-3">Harga</th>
                        <th class=" column-4 p-l-70" %>Jumlah</th>
                        <th class=" column-5" width="14%">SUBTOTAL</th>
                        <th class="column-6" width="20%">ACTION</th>
                    </tr>

                    <?php

                    // Looping Data keranjang Sewa
                    foreach ($chart_check as $chart_check) :

                        // Ambil data Fasilitas
                        $id_fasilitas   = $chart_check['id'];
                        $fasilitas      = $this->m_fasilitas->getWhere($id_fasilitas);

                        // Form Update Cart
                        echo form_open(base_url('frontend/transaksi/Pemesanan/update_cart/' . $chart_check['rowid']));
                    ?>

                        <tr class="table-row">
                            <td class="column-1">
                                <div class="cart-img-product b-rad-4 o-f-hidden">
                                    <img src="<?php echo base_url('assets/backend/img/fasilitas/thumbnail/' . $fasilitas->foto) ?>" alt="<?php echo $chart_check['name'] ?>">
                                </div>
                            </td>
                            <td class="column-2">
                                <?php echo $chart_check['name'] ?>
                            </td>
                            <td class="column-3">
                                <?php echo number_format($chart_check['price'], '0', ',', '.') ?>
                            </td>
                            <td class="column-4">
                                <div class="flex-w bo5 of-hidden w-size17">
                                    <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                    </button>

                                    <input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $chart_check['qty'] ?>">

                                    <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="column-5">Rp:<?php

                                                    $sub_total = $chart_check['price'] * $chart_check['qty'];
                                                    echo number_format($sub_total, '0', ',', '.');

                                                    ?>
                            </td>
                            <td>
                                <button type="submit" name="update" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i> Update
                                </button>

                                <a href="<?php echo base_url('frontend/transaksi/Pemesanan/delete/' . $chart_check['rowid']) ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-trash-o"></i> Delete
                                </a>
                            </td>
                        </tr>

                    <?php
                        // Echo Form Close 
                        echo form_close();

                    // Penutup Foreach Looping
                    endforeach;
                    ?>

                    <tr class="table-row bg-info text-strong" style="font-weight: bold;">
                        <td colspan="4" class="column-1" style="color: white;">TOTAL PENYEWAAN</td>
                        <td colspan="2" class="column-2" style="color: white;">Rp:<?php echo number_format($this->cart->total(), '0', ',', '.') ?></td>
                    </tr>
                </table>
            </div>
            <br><br>

            <?php
            //Notifikasi error
            echo validation_errors('<div class="alert alert-warning">', '</div>');

            //Form Open
            echo form_open(base_url('frontend/transaksi/Pemesanan/proses_check_out'), 'class="form-horizontal"');
            $kode_transaksi = date('dmY') . strtoupper(random_string('alnum', 16));
            ?>

            <!-- Horizontal Form -->
            <form action="" method="POST">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-3 p-b-0">
                            <label for="nama" class="col-sm-12 col-form-label">Kode Transaksi</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="bo4 of-hidden size15 m-b-0">
                                <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>">
                                <input type="hidden" name="jumlah_transaksi" id="jumlah_transaksi" value="<?php echo $this->cart->total(); ?>">
                                <input type="hidden" name="tanggal_checkout" id="tanggal_checkout" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                <input type="text" class="sizefull s-text7 p-l-22 p-r-22" name="kode_transaksi" id="kode_transaksi" placeholder=" Kode Transaksi..." value="<?php echo $kode_transaksi; ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3 p-b-0">
                            <label for="tanggal_acara" class="col-sm-12 col-form-label">Tanggal Acara </label>
                        </div>
                        <span style="padding-left: 20px"><i class="fa fa-calendar"></i></span>
                        <div class="col-sm-4">
                            <div class="bo4 of-hidden size15 m-b-0">
                                <input type="text" name="tanggal_acara" id="flatpickr" class="sizefull s-text7 p-l-22 p-r-22" placeholder="Tanggal Acara Resepsi Anda">
                                <span class="input-group-text><i class=" fa fa-calendar"></i></span>
                            </div>
                        </div>
                        <small style="color:red">Pilih jadwal acara resepsi anda. <br> Penyewaan dilakukan min 14 hari dari sekarang.</small>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3 p-b-0">
                            <label for="tanggal_selesai_acara" class="col-sm-12 col-form-label">Tanggal Selesai Acara </label>
                        </div>
                        <span style="padding-left: 20px"><i class="fa fa-calendar"></i></span>
                        <div class="col-sm-4">
                            <div class="bo4 of-hidden size15 m-b-0">
                                <input type="text" name="tanggal_selesai_acara" id="flatpickr" class="sizefull s-text7 p-l-22 p-r-22" placeholder="Tanggal Selesai Acara Resepsi Anda">
                                <span class="input-group-text><i class=" fa fa-calendar"></i></span>
                            </div>
                        </div>
                        <small style="color:red">Pilih jadwal selesai acara resepsi anda .</small>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3 p-b-0">
                            <label for="nama" class="col-sm-12 col-form-label">Nama Penyewa</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="bo4 of-hidden size15 m-b-0">
                                <input type="text" class="sizefull s-text7 p-l-22 p-r-22" name="nama" id="nama" placeholder=" Masukan Nama Lengkap Anda..." value="<?php echo $pelanggan->nama; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3 p-b-0">
                            <label for="email" class="col-sm-12 col-form-label">Email Penyewa</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="bo4 of-hidden size15 m-b-0">
                                <input type="email" class="sizefull s-text7 p-l-22 p-r-22" name="email" id="email" placeholder=" Masukan Email..." value="<?php echo $pelanggan->email; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3 p-b-0">
                            <label for="no_telp" class="col-sm-12 col-form-label">No Telpon Penyewa</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="bo4 of-hidden size15 m-b-0">
                                <input type="number" class="sizefull s-text7 p-l-22 p-r-22" name="no_telp" id="no_telp" placeholder=" Masukan No Telp..." value="<?php echo $pelanggan->no_telp; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3 p-b-0">
                            <label for="alamat" class="col-sm-12 col-form-label">Alamat Penyewa</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="alamat" id="alamat" placeholder=" Masukan Alamat..."><?php echo $pelanggan->alamat; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Check Out Sekarang</button>
                            <button type="reset" class="btn btn-danger" name="reset"><i class="fa fa-times"></i> Reset</button>
                        </div>
                    </div>
            </form>

            <?php echo form_close(); ?>

        </div>
        <div class="flex-w flex-sb-m p-t-6 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m w-full-sm">
            </div>
        </div>

    </div>
</section>