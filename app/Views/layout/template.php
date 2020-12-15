<?php if (!session()->get('username')) {
	header('location:' . base_URL() . '/login');
	die;
} else {
	if (session()->get("level") == "admin") {
		header('location:' . base_URL('/admin'));
		die;
	}
} ?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="/img/rpl.png" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_URL(); ?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_URL(); ?>/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?= base_URL(); ?>/css/style2.css">

	<!-- datatables -->
	<link rel="stylesheet" href="<?= base_URL(); ?>/css/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" href="<?= base_URL(); ?>/css/responsive.bootstrap4.min.css" />

	<title><?= $title; ?></title>
</head>

<body>

	<?= $this->include('layout/navbar'); ?>

	<?= $this->include('layout/upper'); ?>

	<?= $this->renderSection('content'); ?>

	<?= $this->include('layout/footer');; ?>

	<div class="back-to-top">
		<i class="fa fa-chevron-up"></i>
	</div>



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?= base_URL(); ?>/js/jquery.min.js"></script>
	<script src="<?= base_URL(); ?>/js/popper.min.js"></script>
	<script src="<?= base_URL(); ?>/js/bootstrap.min.js"></script>
	<script src="<?= base_URL(); ?>/js/easing.min.js"></script>
	<script src="<?= base_URL(); ?>/fontawesome/js/all.js"></script>
	<!-- sweetalert -->
	<script src="<?= base_URL(); ?>/js/sweetalert2.all.js"></script>
	<!-- DataTables -->
	<script src="<?= base_URL(); ?>/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_URL(); ?>/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_URL(); ?>/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_URL(); ?>/js/responsive.bootstrap4.min.js"></script>
	<!-- my script -->
	<script src="<?= base_URL(); ?>/js/script.js"></script>
	<?php if ($active == "history") : ?>
		<script src="<?= base_URL(); ?>/js/classes.js"></script>
		<script>
			const formatter = new FormatMoney();
			const total = Array.from(document.querySelectorAll(".total_beli"));
			if (total) {
				total.forEach(t => {
					const total_val = t.textContent;
					const format = formatter.toRupiah(total_val);
					t.innerHTML = format;
				});
			}
		</script>
	<?php elseif ($active == "invent") : ?>
		<script src="<?= base_URL(); ?>/js/Chart.min.js"></script>
		<script src="<?= base_URL(); ?>/js/invent.js"></script>
	<?php elseif ($active == "info") : ?>
		<script src="/js/info.js"></script>
	<?php endif ?>
</body>

</html>