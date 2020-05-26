<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url('<?php echo base_url() ?>assets/backend/img/home/heading6.png');">
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
                        <td colspan="4" class="column-1" style="color: white;">TOTAL HARGA/HARI</td>
                        <td colspan="2" class="column-2" style="color: white;">Rp:<?php echo number_format($this->cart->total(), '0', ',', '.') ?></td>
                    </tr>
                </table>
            </div>
            <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                <div class="flex-w flex-m w-full-sm">
                </div>

                <div class="flex-w flex-m w-full-sm">
                    <div class="size12 trans-0-4 m-t-10 m-b-10">
                        <a href="<?php echo base_url('frontend/transaksi/Pemesanan/delete') ?>" class="btn btn-warning btn-lg">
                            <i class="fa fa-trash-o"></i> DELETE ALL
                        </a>
                    </div>

                    <div class="size12 trans-0-4 m-t-10 m-b-10">
                        <a href="<?php echo base_url('frontend/transaksi/Pemesanan/check_out') ?>" class="btn btn-success btn-lg">
                            <i class="fa fa-shopping-cart"></i> CHECK OUT
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>