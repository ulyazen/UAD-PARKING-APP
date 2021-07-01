<div class="container h-100">
	<div class="row justify-content-center align-items-center h-100">
		<div class="col-xl-7 col-lg-12 col-md-6 mx-auto ">
			<div class="card o-hidden border-0 shadow-sm ">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-12 ">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Login Parkir UAD!</h1>
								</div>
								<?= $this->session->flashdata('message'); ?>
								<form action="<?= base_url('auth') ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="username">Username</label>
										<input type="text" class="form-control" id="username" name="username" placeholder=" Masukkan username" value="<?= set_value('username'); ?>">
										<?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" class="form-control" id="password" name="password" placeholder=" Masukkan password" value="<?= set_value('password'); ?>">
										<?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
									<button type="submit" class="btn btn-warning btn-user btn-block">
										Login
									</button>
								</form>
								<hr>
								<div class="text-center">
									<a class="small text-dark" href="<?= base_url('auth/register') ?>">Belum memiliki akun? Daftar!</a>
									</br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>