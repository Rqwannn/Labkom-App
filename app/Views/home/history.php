<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- main -->

<div class="main mt-5">
	<div class="container">
		<!-- Table Peminjaman -->
		<div class="row mb-3 justify-content-center">
			<div class="col-12 mb-3">
				<h2>Data PeminjamanKu</h2>
			</div>
			<div class="col-12">
				<table id="data_pinjam" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Peminjam</th>
							<th>Nama Komputer / Alat</th>
							<th>Banyak Pinjam</th>
							<th>Tanggal Pinjam</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($data_pinjam) : ?>
							<?php $i = 0;
							$j = 1; ?>
							<?php foreach ($data_pinjam as $key) : ?>
								<tr>
									<td><?= $j; ?></td>
									<td><?= session()->get("name"); ?></td>
									<td><?= $nama_barang[$i] ?></td>
									<td><?= $key['banyak_pinjam']; ?></td>
									<td><?= $key['tgl_pinjam']; ?></td>
									<td class="<?= ($key['tgl_kembali'] == null) ? 'text-danger' : 'text-success'; ?>">
										<?= ($key['tgl_kembali'] == null) ? 'Belum Kembali' : 'Dikembalikan'; ?>
									</td>
								</tr>
								<?php $i++;
								$j++; ?>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- Table Peminjaman -->
		<div class="row mb-3 justify-content-center">
			<div class="col-12 mb-3">
				<h2>Data PembelianKu</h2>
			</div>
			<div class="col-12">
				<table id="data_beli" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Pembeli</th>
							<th>Nama Barang</th>
							<th>Banyak Pinjam</th>
							<th>Total</th>
							<th>Tanggal Beli</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($data_beli) : ?>
							<?php $i = 1;
							$j = 0; ?>
							<?php foreach ($data_beli as $key) : ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= session()->get("name"); ?></td>
									<td><?= $nama_barang_beli[$j] ?></td>
									<td><?= $key['banyak_beli']; ?></td>
									<td class="total_beli"><?= $key['total']; ?></td>
									<td><?= $key['tgl_beli']; ?></td>
									<td class="<?= ($key['status'] == "0") ? 'text-danger' : 'text-success'; ?>">
										<?= ($key['status'] == "0") ? 'Belum Lunas' : 'Lunas'; ?>
									</td>
								</tr>
								<?php $i++;
								$j++; ?>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>

<!-- /main -->

<?= $this->endSection(); ?>