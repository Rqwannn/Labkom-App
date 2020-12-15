<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="/img/rpl.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_URL(); ?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_URL(); ?>/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?= base_URL(); ?>/css/login.css">

	<title>Labkom | Login</title>
</head>
<body>

	<!-- navbar -->

	<section id="navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
			<div class="container">
				<a class="navbar-brand" href="#">
					<h4>Labkom<span>rpl</span></h4>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
					<div class="navbar-nav">
						<a class="nav-link nav-link2 slideToLogin" href="#"><p class="active" id="slideToLogin">Login</p></a>
						<a class="nav-link nav-link2 slideToRegist" href="#"><p class="" id="slideToRegist">Register</p></a>
					</div>
				</div>
			</div>
		</nav>
	</section>  	

	<!-- /navbar -->

	<!-- main content -->

	<div class="container">
		<div class="container" id="login" style="transition: .5s;">
			<div class="row" style="margin-top: 8rem;">

				<div class="col-md-6">
					<div class="row">
						<div class="col-md-10 theCard rounded py-3">
							<div class="container">
								<div class="row">
									<h3>- Masuk</h3>
								</div>
								<div class="row mt-2">
									<div class="col-md-11">
										<form method="post" action="<?= base_URL(); ?>/loginProses">
											<?= csrf_field(); ?>
											<?php if (session()->getFlashData("regist")): ?>
											<div class="row">
												<div class="alert alert-success" role="alert">
													<?= session()->getFlashData("regist"); ?>
												</div>			
											</div>	
										<?php endif ?>
										<?php if (session()->getFlashData("wrong")): ?>
										<div class="row">
											<span class="text-danger font-italic"><?= session()->getFlashData("wrong"); ?></span>
										</div>
										<?php endif; ?>
										<div class="row mb-3">
											<label for="logUsername">Username atau Nis</label>
											<input type="text" class="form-control rounded-pill" id="logUsername" autofocus autocomplete="off" name="logUsername">
											<small class="text-danger" id="validateLogUsername"></small>
										</div>
										<div class="row mb-3">
											<label for="logPass">Password</label>
											<input type="Password" class="form-control rounded-pill" id="logPass" name="logPass">
											<small class="text-danger" id="validateLogPass"></small>
										</div>
										<div class="row mb-3">
											<div class="col-12">
												<input class="form-check-input" type="checkbox" value="true" name="logCookie" id="logCookie">
												<label class="form-check-label" for="logCookie">
													Remember me
												</label>
											</div>
										</div>
										<div class="row mt-5 justify-content-end">
											<div class="col-6">
												<div class="row">
													<button class="btn labCol w-100 text-white rounded-pill" id="loginBtn" disabled>Masuk</button>
												</div>												
											</div>											
										</div>
									</form>
								</div>								
							</div>
						</div>						
					</div>
				</div>
			</div>

			<div class="col-md-6 none-in-md">
				<div class="row justify-content-end">
					<img src="<?= base_URL(); ?>/img/gambar-login2.png" height="402" class="user-select-none">
				</div>
			</div>

		</div>
	</div>


	<div class="container" id="regist">
		<div class="row" style="margin-top: 8rem;margin-bottom: 5rem;">

			<div class="col-md-6 none-in-md">
				<div class="row">
					<img src="<?= base_URL(); ?>/img/gambar-login2.png" height="402" class="user-select-none">
				</div>
			</div>

			<div class="col-md-6">
				<div class="row justify-content-end">
					<div class="col-md-10 theCard rounded py-3">
						<div class="container">
							<div class="row">
								<h3>- Daftar</h3>
							</div>
							<div class="row mt-2">
								<div class="col-md-11">
									<form action="<?= base_URL(); ?>/login/regist" method="post">
										<?= csrf_field(); ?>
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="namaDepan">Nama Depan</label>
													<input type="text" class="form-control rounded-pill" id="namaDepan" name="namaDepan" value="<?= old('namaDepan'); ?>">
													<small class="text-danger" id="validateNamaDepan"></small>
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="namaBelakang">Nama Belakang</label>
													<input type="text" class="form-control rounded-pill" id="namaBelakang" name="namaBelakang" value="<?= old('namaBelakang'); ?>">
													<small class="text-danger" id="validateNamaBelakang"></small>
												</div>
											</div>
										</div>	
										<div class="row">
											<div class="col-4">
												<div class="form-group">
													<label for="kelas">Kelas</label>
													<input type="text" class="form-control rounded-pill" id="kelas" name="kelas"  value="<?= old('kelas'); ?>">
													<small class="text-danger" id="validateKelas"></small>
												</div>
											</div>
											<div class="col-8">
												<div class="form-group">
													<label for="tglLahir">Tanggal Lahir</label>
													<input type="date" class="form-control rounded-pill" id="tglLahir" name="tglLahir"  value="<?= old('tglLahir'); ?>">
													<small class="text-danger" id="validateTglLahir"></small>
												</div>
											</div>
										</div>	
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="nis">Nis</label>
													<input type="text" class="form-control rounded-pill" id="nis" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="nis"  value="<?= old('nis'); ?>">
													<small class="text-danger" id="validateNis"><?= $validation->getError('nis'); ?></small>
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="nisn">Nisn</label>
													<input type="text" class="form-control rounded-pill" id="nisn" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="nisn" value="<?= old('nisn'); ?>">
													<small class="text-danger" id="validateNisn"></small>
												</div>
											</div>
										</div>	
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="username">Username</label>
													<input type="text" class="form-control rounded-pill" id="username" name="username" value="<?= old('username'); ?>">
													<small class="text-danger" id="validateUsername"><?= $validation->getError('username'); ?></small>
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="password">Password</label>
													<input type="password" class="form-control rounded-pill" id="password" name="password" value="<?= old('password'); ?>">
													<small class="text-danger" id="validatePassword"></small>
												</div>
											</div>
										</div>	
										<div class="row mt-3 justify-content-end">
											<div class="col-6">
												<div class="row">
													<button class="btn labCol w-100 text-white rounded-pill" disabled id="registBtn">Daftar</button>
												</div>												
											</div>											
										</div>
									</form>
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




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_URL(); ?>/js/jquery-3.1.1.min.js"></script>
<script src="<?= base_URL(); ?>/js/popper.min.js"></script>
<script src="<?= base_URL(); ?>/js/bootstrap.js"></script>
<script src="<?= base_URL(); ?>/js/easing.min.js"></script>
<script src="<?= base_URL(); ?>/fontawesome/js/all.js"></script>
<script src="<?= base_URL(); ?>/js/main.js"></script>

<?php if ($validation->hasError('username')): ?>
	<script type="text/JavaScript">
		$(document).ready(function(){
		// alert('ok')
		setTimeout(function(){
			toRegist()
		},300)		
		setTimeout(function(){
			$('#username').focus()
		}, 700)
	})		
</script>
<?php endif ?>

<?php if ($validation->hasError('nis')): ?>
	<script type="text/JavaScript">
		$(document).ready(function(){
		// alert('ok')
		setTimeout(function(){
			toRegist()
		},300)		
		setTimeout(function(){
			$('#nis').focus()
		}, 700)
	})		
</script>
<?php endif ?>
</body>
</html>