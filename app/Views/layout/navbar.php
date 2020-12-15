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
					<a class="nav-link nav-link2" href="<?= base_URL(); ?>"><p class="<?= ($active == 'home') ? 'active' : '' ?>">Home</p></a>
					<a class="nav-link nav-link2" href="<?= base_URL(); ?>/invent"><p class="<?= ($active == 'invent') ? 'active' : '' ?>">Inventory</p></a>
					<a class="nav-link nav-link2" href="<?= base_URL(); ?>/info"><p class="<?= ($active == 'info') ? 'active' : '' ?>">Info</p></a>
					<a class="nav-link nav-link2" href="<?= base_URL(); ?>/team"><p class="<?= ($active == 'team') ? 'active' : '' ?>">Our Team</p></a>
					<a class="nav-link nav-link2" href="<?= base_URL(); ?>/history"><p class="<?= ($active == 'history') ? 'active' : '' ?>">History</p></a>
					<a class="nav-link text-danger" id="logout" href="<?= base_URL(); ?>/logout">
						<p class="text-danger">logout</p>
					</a>
				</div>
			</div>
		</div>
	</nav>
</section>  	

	<!-- /navbar -->