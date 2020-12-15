<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- main -->
<div class="main py-5 bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-11 user-select-none">
				<div class="row">
					<div class="col-md-6 mb-3">
						<div class="row justify-content-center">
							<div class="col-md-10 card-info py-4 point" id="card-guru">
								<div class="container-fluid">
									<div class="row">
										<div class="col-5">
											<div class="wrapInfo">
												<img src="<?= base_URL(); ?>/img/icon/teacher.png" width="100">
											</div>
										</div>
										<div class="col-7">
											<span class="infoText" id="infoGuruTxt">Guru</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 mb-3">
						<div class="row justify-content-center">
							<div class="col-md-10 card-info py-4 point" id="card-siswa">
								<div class="container-fluid">
									<div class="row">
										<div class="col-5">
											<div class="wrapInfo">
												<img src="<?= base_URL(); ?>/img/icon/student.png" width="100">
											</div>
										</div>
										<div class="col-7">
											<span class="infoText" id="infoSiswaTxt">Siswa</span>
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
</div>
<!-- /main -->

<!-- down data -->
<div class="container theTable" id="teachTable">
	<div class="row mt-5 wrapGuru2">
		<div class="col-12 text-center">
			<h1>Data Guru SMKN 1 Depok</h1>
		</div>
	</div>
	<div class="row" id="wrapGuru">
		<?php foreach ($guru as $key) : ?>
			<div class="col-lg-3 col-md-6 mb-3 wrapGuru">
				<div class="member">
					<img src="<?= $key['gambar']; ?>" class="img-fluid rounded-circle" alt="Profile Guru">
					<div class="member-info">
						<div class="member-info-content text-center">
							<h4><?= $key['nama']; ?></h4>
							<span><?= $key['nip']; ?></span>
							<span><?= $key['level']; ?></span>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>

	</div>
</div>
<div class="container theTable" id="studentTable">
	<div class="row mt-5 wrapSiswa2">
		<div class="col-12 text-center">
			<h1>Data Siswa RPL SMKN 1 Depok</h1>
		</div>
	</div>

	<div class="row wrapSiswa" id="wrapSiswa">
		<div class="col-12">
			<table id="data_siswa" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Siswa</th>
						<th>Kelas Siswa</th>
						<th>NIS</th>
						<th>NISN</th>
						<th>Jenis Kelamin</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($siswa) : ?>
						<?php $s=1; ?>
						<?php foreach ($siswa as $key) : ?>
							<tr>
								<td><?= $s; ?></td>
								<td><?= $key['nama']; ?></td>
								<td><?= $key['kelas']; ?></td>
								<td><?= $key['nis']; ?></td>
								<td><?= $key['nisn']; ?></td>
								<td><?= $key['jk']; ?></td>
							</tr>
							<?php $s++; ?>
						<?php endforeach ?>
					<?php endif ?>

				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /down data -->

<?= $this->endSection(); ?>