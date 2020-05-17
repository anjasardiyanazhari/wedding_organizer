<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row justify-content-center pb-5">
			<div class="col-md-12 text-center heading-section ftco-animate">
				<h2 class="mb-3"> <?php echo $title ?> </h2>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<h4 class="m-text14 p-b-7">
						Kategori Fasilitas
					</h4>

					<ul class="p-b-54">

						<?php
						foreach ($kategori as $kategori) :
						?>

							<li class="p-t-4">
								<a href="<?php echo base_url('frontend/data_master/Fasilitas/Kategori/' . $kategori->slug_kategori) ?>" class="s-text13 active1">
									<?php echo $kategori->nama_kategori ?>
								</a>
							</li>
						<?php
						endforeach;
						?>

						<hr>
					</ul>
				</div>
			</div>

			<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

				<!-- Product -->
				<div class="row">

					<?php
					foreach ($fasilitas_page as $fasilitas_page) :
					?>

						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

							<?php
							// Form untuk memproses Pemesanan 
							echo form_open(base_url('frontend/transaksi/Pemesanan/add'));

							// Elemen yang dibawa
							echo form_hidden('id', $fasilitas_page->id_fasilitas);
							echo form_hidden('qty', 1);
							echo form_hidden('price', $fasilitas_page->harga);
							echo form_hidden('name', $fasilitas_page->nama_fasilitas);

							// Elemen redirect
							echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
							?>

							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="<?php echo base_url('assets/backend/img/fasilitas/thumbnail/' . $fasilitas_page->foto) ?>" alt="<?php echo $fasilitas_page->nama_fasilitas ?>">

									<div class="block2-overlay trans-0-4">
										<a href="<?php echo base_url('frontend/data_master/Fasilitas/detail/' . $fasilitas_page->slug_fasilitas) ?>" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="fa fa-eye" aria-hidden="true"></i>
											<i class="fa fa-eye dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Add to Cart
											</button>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="<?php echo base_url('frontend/data_master/Fasilitas/detail/' . $fasilitas_page->slug_fasilitas) ?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $fasilitas_page->nama_fasilitas ?>
									</a>

									<span class="block2-price m-text6 p-r-5">
										RP <?php echo number_format($fasilitas_page->harga, '0', ',', '.') ?>
									</span>
								</div>
							</div>

							<?php
							// End Penutup Form untuk memproses Pemesanan
							echo form_close();
							?>

						</div>

					<?php
					endforeach;
					?>

				</div>

					<!-- Pagination -->
					<div >
						<?php echo $pagin; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>