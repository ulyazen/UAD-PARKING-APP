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
									<h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
								</div>
								<?= $this->session->flashdata('message'); ?>
								<?php echo validation_errors(); ?>
								<?php echo form_open('auth/register'); ?>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
									<?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class=" form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
										<?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="col-sm-6">
										<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
									</div>
								</div>
								<button type="submit" class="btn btn-warning btn-user btn-block">
									Daftar Akun
								</button>
								</form>
								<hr>
								<div class="text-center">
									<a class="small text-dark" href="<?= base_url('auth') ?>">Sudah memiliki akun? Masuk!</a>
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
</div>