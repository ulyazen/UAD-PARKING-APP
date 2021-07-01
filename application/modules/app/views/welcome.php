<body class="text-center">
	<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
		<header class="masthead mb-auto">
			<div class="inner">
				<h3 class="masthead-brand">Parkir UAD</h3>
				<nav class="nav nav-masthead justify-content-center">
					<a class="nav-link text-white active" href=<?= base_url('app'); ?>>Home</a>
					<a class="nav-link text-white" href=<?= base_url('app/parkir'); ?>>Parkir</a>
					<a class="nav-link text-white" href=<?= base_url('app/log'); ?>>Log</a>
					<a class="nav-link text-white" href="<?= base_url('auth/logout'); ?>">Logout</a>
				</nav>
			</div>
		</header>

		<main role="main" class="inner cover">
			<h1 class="cover-heading">Aplikasi Parkir UAD</h1>
			<p class="lead">Selamat datang pada aplikasi parkir UAD.</p>
			<p class="lead">Klik tombol dibawah untuk parkirkan kendaraan.</p>
			<p class="lead">
				<a href="<?= base_url('app/parkir') ?>" class="btn  btn-lg btn-primary">PARKIR</a>
			</p>
		</main>

		<footer class="mastfoot mt-auto">
			<div class="inner text-white">
				<p>Copyright <a href="https://getbootstrap.com/">Aplikasi Parkir UAD</a>, 2021.</p>
			</div>
		</footer>
	</div>
</body>