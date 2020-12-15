<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- main content -->

<div class="py-5 bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="row justify-content-center text-center">
					<span class="avail">Menyediakan</span>
				</div>
				<div class="row mt-5">
					<div class="col-md-4 cardWrap">
						<div class="row justify-content-center">
							<div class="cardEl point mt-5">
								<div class="row justify-content-center">
									<img style="width: 75px;height: 75px;" src="<?= base_URL(); ?>/img/icon/repair.png">
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-8 cardWrap">
						<div class="row justify-content-center">
							<div class="card-2">
								<div class="row mt-3">
									<div class="col-12 text-center">
										<h3 class="text-center">Data Barang Tersedia</h3>
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-md-12">
										<canvas id="barangChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="row mt-5">
					<div class="col-md-4 cardWrap">
						<div class="row justify-content-center">
							<div class="cardEl point mt-5">
								<div class="row justify-content-center">
									<img style="width: 75px;height: 75px;" src="<?= base_URL(); ?>/img/icon/tower-pc.png">
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-8 cardWrap">
						<div class="row justify-content-center">
							<div class="card-2">
								<div class="row mt-3">
									<div class="col-12 text-center">
										<h3 class="text-center">Data Komputer Tersedia</h3>
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-md-12">
										<canvas id="komputerChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="row mt-5">
					<div class="col-md-4 cardWrap">
						<div class="row justify-content-center">
							<div class="cardEl point mt-5">
								<div class="row justify-content-center">
									<img style="width: 75px;height: 75px;" src="<?= base_URL(); ?>/img/icon/shopping-cart.png">
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-8 cardWrap">
						<div class="row justify-content-center">
							<div class="card-2">
								<div class="row mt-3">
									<div class="col-12 text-center">
										<h3 class="text-center">Data Jualan</h3>
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-md-12">
										<canvas id="jualanChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /main content -->
<div class="komputer d-none" style="display: none;">
	<?php if ($komputer) : ?>
		<ul>
			<?php
			$availableKom = $komputer['showOff'];
			$otherKom = $komputer['other']; ?>
			<?php if ($availableKom) : ?>
				<?php foreach ($availableKom as $key) : ?>
					<li class="komputerTersedia" data-stok="<?= $key['stok']; ?>"><?= $key['nama_barang']; ?></li>
				<?php endforeach ?>
			<?php endif ?>
			<?php if ($otherKom) : ?>
				<?php foreach ($otherKom as $key) : ?>
					<li class="komputerOther" data-stok="<?= $key['stok']; ?>"><?= $key['nama_barang']; ?></li>
				<?php endforeach ?>
			<?php endif ?>
		</ul>
	<?php endif ?>
</div>
<div class="barang d-none" style="display: none;">
	<?php if ($barang) : ?>
		<ul>
			<?php
			$availableBarang = $barang['showOff'];
			$otherBarang = $barang['other']; ?>
			<?php if ($availableBarang) : ?>
				<?php foreach ($availableBarang as $key) : ?>
					<li class="barangTersedia" data-stok="<?= $key['stok']; ?>"><?= $key['nama_barang']; ?></li>
				<?php endforeach ?>
			<?php endif ?>
			<?php if ($otherBarang) : ?>
				<?php foreach ($otherBarang as $key) : ?>
					<li class="barangOther" data-stok="<?= $key['stok']; ?>"><?= $key['nama_barang']; ?></li>
				<?php endforeach ?>
			<?php endif ?>
		</ul>
	<?php endif ?>
</div>
<div class="jual d-none" style="display: none;">
	<?php if ($jual) : ?>
		<ul>
			<?php
			$availableJual = $jual['showOff'];
			$otherJual = $jual['other']; ?>
			<?php if ($availableJual) : ?>
				<?php foreach ($availableJual as $key) : ?>
					<li class="jualTersedia" data-stok="<?= $key['stok']; ?>"><?= $key['nama_barang']; ?></li>
				<?php endforeach ?>
			<?php endif ?>
			<?php if ($otherJual) : ?>
				<?php foreach ($otherJual as $key) : ?>
					<li class="jualOther" data-stok="<?= $key['stok']; ?>"><?= $key['nama_barang']; ?></li>
				<?php endforeach ?>
			<?php endif ?>
		</ul>
	<?php endif ?>
</div>

<?= $this->endSection(); ?>