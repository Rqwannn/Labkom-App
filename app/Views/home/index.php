<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- main content -->

<div class="py-5 bg-light">
	<div class="container">
		<div class="row justify-content-center menyediakan">
			<div class="col-md-10">
				<div class="row justify-content-center text-center">
					<span class="avail">Menyediakan</span>
				</div>
				<?php if (session()->getFlashData("sukses")): ?>
				<div class="row mt-5 justify-content-center">
					<div class="col-md-10">
						<div class="alert alert-success" role="alert">
							<?= session()->getFlashData("sukses"); ?>
						</div>
					</div>					
				</div>	
			<?php endif ?>	
			<?php if (session()->getFlashData("sukses2")): ?>
				<div class="row mt-5 justify-content-center">
					<div class="col-md-10">
						<div class="alert alert-success" role="alert">
							<?= session()->getFlashData("sukses2"); ?>
						</div>
					</div>					
				</div>	
			<?php endif ?>							
			<div class="row mt-5 user-select-none">
				<div class="col-md-6 cardWrap">
					<div class="row justify-content-center">
						<div class="cardEl point" id="pinjam_barang">
							<div class="row justify-content-center">
								<img src="<?= base_URL(); ?>/img/icon/repair.png" style="width: 75px;height: 75px;">
							</div>		
							<div class="row text-center mt-5">
								<div class="text-center mt-3" style="width: 100%;">
									<h3>Pinjam Barang</h3>
								</div>										
							</div>							
						</div>							
					</div>							
				</div>

				<div class="col-md-6 cardWrap">
					<div class="row justify-content-center">
						<div class="cardEl point" id="sewa_pc">
							<div class="row justify-content-center">
								<img style="width: 75px;height: 75px;" src="<?= base_URL(); ?>/img/icon/tower-pc.png">
							</div>		
							<div class="row text-center mt-5">
								<div class="text-center mt-3" style="width: 100%;">
									<h3>Sewa PC</h3>
								</div>										
							</div>							
						</div>							
					</div>							
				</div>

				<div class="col-md-6 cardWrap">
					<div class="row justify-content-center">
						<div class="cardEl point" id="belanja">
							<div class="row justify-content-center">
								<img style="width: 75px;height: 75px;" src="<?= base_URL(); ?>/img/icon/shopping-cart.png">
							</div>		
							<div class="row text-center mt-5">
								<div class="text-center mt-3" style="width: 100%;">
									<h3>Belanja Barang</h3>
								</div>										
							</div>							
						</div>							
					</div>							
				</div>
			</div>
		</div>
	</div>

	<!-- pinjam alat -->
	<div class="row justify-content-center">
		<div class="col-md-4" id="pinjam">
			<div class="row">
				<div class="col-md-12 cardWrap">
					<div class="row justify-content-center">
						<div class="cardEl point">
							<div class="row justify-content-center">
								<img src="<?= base_URL(); ?>/img/icon/repair.png" style="width: 75px;height: 75px;">
							</div>		
							<div class="row text-center mt-5">
								<div class="text-center mt-3" style="width: 100%;">
									<h3>Pinjam Barang</h3>
								</div>										
							</div>							
						</div>							
					</div>	
					<div class="row" style="margin-top: 4rem">
						<div class="col-12 text-center">
							<span class="point" id="back">Back</span>
						</div>
					</div>						
				</div>
			</div>
		</div>
		<div class="col-md-6" id="pinjam2">
			<div class="row text-left">
				<span class="avail">Pinjam Barang</span>
			</div>
			<?php if (!$barang): ?>
				<div class="row mt-3">
					<span class="text-danger font-italic">Tidak ada barang yang tersedia</span>
				</div>				
			<?php endif ?>
			<div class="row mt-3">
				<form method="post" action="<?= base_URL(); ?>/pinjamAlat">
					<?= csrf_field() ?>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="banyak_pinjam">Banyak Pinjam</label>
							<input type="text" class="form-control" name="banyak_pinjam" id="banyak_pinjam" <?= (!$barang) ? 'disabled' : '' ; ?> onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
							<small class="text-danger text-italic" id="validateBanyakPinjam"></small>
						</div>
						<div class="col-md-6 mb-3">
							<label for="tglPesan">Tanggal Pinjam</label>
							<input type="date" class="form-control" id="tglPinjam" name="tglPinjam" <?= (!$barang) ? 'disabled' : '' ; ?>>
							<small class="text-danger text-italic" id="validateTglPinjam"></small>
						</div>
					</div>
					<div class="form-row">
						<div class="col-12 mb-3"><span>Pilih Barang</span></div>
					</div>
					<?php if ($barang): ?>
						<div class="row user-select-none">
							<div class="col-12">
								<div class="row">
									<div class="col-12 text-center">
										<span class="text-danger text-italic" id="validateBarang"></span>
									</div>									
								</div>
								<div class="row">
									<?php foreach ($barang as $key): ?>
										<div class="col-3 mb-3 pinjamBarang point" data-id="<?= $key['stok']; ?>" id="barang<?= strtolower($key['id']); ?>">
											<div class="row">
												<div class="col-12">
													<img src="/barang/<?= $key['gambar']; ?>" class="w-100">
												</div>									
											</div>
											<div class="row">
												<div class="col-12 text-center"><span><?= $key['nama_barang']; ?></span></div>
											</div>
										</div>
									<?php endforeach ?>	
								</div>	
							</div>			
						</div>
						<input type="text" name="pilihan" value="<?= strtolower($barang[0]['id']); ?>" id="pilihan" style="display: none;">
					<?php endif ?>

					<button class="btn btn-primary mt-2" type="submit" id="btn-submit" <?= (!$barang) ? 'disabled' : '' ; ?>>Pesan Sekarang</button>
				</form>
			</div>
		</div>
	</div>
	<!-- /pinjam alat -->

	<!-- pinjam komputer -->
	<div class="row justify-content-center">
		<div class="col-md-4" id="pinjamKomputer">
			<div class="row">
				<div class="col-md-12 cardWrap">
					<div class="row justify-content-center">
						<div class="cardEl point">
							<div class="row justify-content-center">
								<img src="<?= base_URL(); ?>/img/icon/tower-pc.png" style="width: 75px;height: 75px;">
							</div>		
							<div class="row text-center mt-5">
								<div class="text-center mt-3" style="width: 100%;">
									<h3>Sewa PC</h3>
								</div>										
							</div>							
						</div>							
					</div>	
					<div class="row" style="margin-top: 4rem">
						<div class="col-12 text-center">
							<span class="point" id="back2">Back</span>
						</div>
					</div>						
				</div>
			</div>
		</div>
		<div class="col-md-6" id="pinjamKomputer2">
			<div class="row text-left">
				<span class="avail">Sewa PC</span>
			</div>
			<?php if (!$komputer): ?>
				<div class="row mt-3">
					<span class="text-danger font-italic">Tidak ada komputer yang tersedia</span>
				</div>				
			<?php endif ?>
			<div class="row mt-3">
				<form method="post" action="<?= base_URL(); ?>/pinjamKomputer">
					<?= csrf_field() ?>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="banyak_pinjam">Banyak Sewa</label>
							<input type="text" class="form-control" name="banyak_pinjam2" id="banyak_pinjam2" <?= (!$komputer) ? 'disabled' : '' ; ?> onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
							<small class="text-danger text-italic" id="validateBanyakPinjam2"></small>
						</div>
						<div class="col-md-6 mb-3">
							<label for="tglPesan">Tanggal Sewa</label>
							<input type="date" class="form-control" id="tglPinjam2" name="tglPinjam2" <?= (!$komputer) ? 'disabled' : '' ; ?>>
							<small class="text-danger text-italic" id="validateTglPinjam2"></small>
						</div>
					</div>
					<div class="form-row">
						<div class="col-12 mb-3"><span>Pilih Komputer</span></div>
					</div>
					<?php if ($komputer): ?>
						<div class="row user-select-none">
							<div class="col-12">
								<div class="row">
									<div class="col-12 text-center">
										<span class="text-danger text-italic" id="validateBarang2"></span>
									</div>									
								</div>
								<div class="row">
									<?php foreach ($komputer as $key): ?>
										<div class="col-3 mb-3 pinjamBarang2 point" data-id="<?= $key['stok']; ?>" id="komputer<?= strtolower($key['id']); ?>">
											<div class="row">
												<div class="col-12">
													<img src="/barang/<?= $key['gambar']; ?>" class="w-100">
												</div>									
											</div>
											<div class="row">
												<div class="col-12 text-center"><span><?= $key['nama_barang']; ?></span></div>
											</div>
										</div>
									<?php endforeach ?>	
								</div>	
							</div>			
						</div>
						<input type="text" name="pilihan2" value="<?= strtolower($komputer[0]['id']); ?>" id="pilihan2" style="display: none;">
					<?php endif ?>

					<button class="btn btn-primary mt-2" type="submit" id="btn-submit2" <?= (!$komputer) ? 'disabled' : '' ; ?>>Pesan Sekarang</button>
				</form>
			</div>
		</div>
	</div>
	<!-- /pinjam komputer -->

	<!-- Belanja -->
	<div class="row justify-content-center">
		<div class="col-md-4" id="belanjaBarang">
			<div class="row">
				<div class="col-md-12 cardWrap">
					<div class="row justify-content-center">
						<div class="cardEl point">
							<div class="row justify-content-center">
								<img src="<?= base_URL(); ?>/img/icon/shopping-cart.png" style="width: 75px;height: 75px;">
							</div>		
							<div class="row text-center mt-5">
								<div class="text-center mt-3" style="width: 100%;">
									<h3>Belanja</h3>
								</div>										
							</div>							
						</div>							
					</div>	
					<div class="row" style="margin-top: 4rem">
						<div class="col-12 text-center">
							<span class="point" id="back3">Back</span>
						</div>
					</div>						
				</div>
			</div>
		</div>
		<div class="col-md-6" id="belanjaBarang2">
			<div class="row text-left">
				<span class="avail">Belanja</span>
			</div>
			<?php if (!$belanja): ?>
				<div class="row mt-3">
					<span class="text-danger font-italic">Tidak ada barang untuk dijual</span>
				</div>				
			<?php endif ?>
			<div class="row mt-3">
				<form method="post" action="<?= base_URL(); ?>/belanja">
					<?= csrf_field() ?>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="banyak_pinjam">Banyak Beli</label>
							<input type="text" class="form-control" name="banyak_pinjam3" id="banyak_pinjam3" <?= (!$belanja) ? 'disabled' : '' ; ?> onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
							<small class="text-danger text-italic" id="validateBanyakPinjam3"></small>
						</div>
						<div class="col-md-6 mb-3">
							<label for="tglPesan">Tanggal Beli</label>
							<input type="date" class="form-control" id="tglPinjam3" name="tglPinjam3" <?= (!$belanja) ? 'disabled' : '' ; ?>>
							<small class="text-danger text-italic" id="validateTglPinjam3"></small>
						</div>
					</div>
					<div class="form-row">
						<div class="col-12 mb-3"><span>Pilih Barang</span></div>
					</div>
					<?php if ($belanja): ?>
						<div class="row user-select-none">
							<div class="col-12">
								<div class="row">
									<div class="col-12 text-center">
										<span class="text-danger text-italic" id="validateBarang3"></span>
									</div>									
								</div>
								<div class="row">
									<?php foreach ($belanja as $key): ?>
										<div class="col-3 mb-3 pinjamBarang3 point" data-id="<?= $key['stok']; ?>" id="belanja<?= strtolower($key['id']); ?>">
											<div class="row">
												<div class="col-12">
													<img src="/barang/<?= $key['gambar']; ?>" class="w-100">
												</div>									
											</div>
											<div class="row">
												<div class="col-12 text-center"><span><?= $key['nama_barang']; ?></span></div>
											</div>
										</div>
									<?php endforeach ?>	
								</div>	
							</div>			
						</div>
						<input type="text" name="pilihan3" value="<?= strtolower($belanja[0]['id']); ?>" id="pilihan3" style="display: none;">
					<?php endif ?>

					<button class="btn btn-primary mt-2" type="submit" id="btn-submit3" <?= (!$belanja) ? 'disabled' : '' ; ?>>Belanja Sekarang</button>
				</form>
			</div>
		</div>
	</div>
	<!-- /Belanja -->

</div>
</div>

<!-- /main content -->

<!-- contact us -->
<div class="container contact mt-4">
	<div class="row">
		<div class="col-12 text-center">
			<h2>Contact Us</h2>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<iframe src="https://maps.google.com/maps?q=smk%20negeri%201%20depok&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
		</div>
		<div class="col-md-6">
			<form action="" method="">
				<div class="row">
					<div class="mb-3 col-6">
						<input type="text" name="email" id="email" class="form-control" autocomplete="off" placeholder="Your Email *">
					</div>
					<div class="mb-3 col-6">
						<input type="text" name="name" id="name" class="form-control" autocomplete="off" placeholder="Your Name *">
					</div>
				</div> 
				<div class="row">
					<div class="mb-3 col-12">
						<input type="text" name="subject" id="subject" class="form-control" autocomplete="off" placeholder="Subject *">
					</div>
				</div> 
				<div class="row">
					<div class="mb-3 col-12">
						<textarea class="form-control" style="min-height: 150px;resize: none;" placeholder="your message *"></textarea>
					</div>
				</div> 
				<div class="row justify-content-center">
					<div class="mb-3 col-5">
						<button class="btn send rounded-pill" type="submit">Send</button>
					</div>
				</div> 
			</form>
		</div>
	</div>
</div>
<!-- /contact us -->

<?= $this->endSection(); ?>