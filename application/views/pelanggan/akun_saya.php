<div class="row">
	<div class="col-md-3">
		<div class="card card-primary card-outline">
			<div class="card-body box-profile bg-dark">
				<div class="text-center">
					<img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>template/dist/img/user1-128x128.jpg" alt="User profile picture">
				</div>
				<h3 class="profile-username text-center"><?= $this->session->userdata('nama_pelanggan') ?></h3>
				<p class="text-muted text-center"><?= $this->session->userdata('email') ?></p>
			</div>
		</div>
	</div>

	<div class="col-md-9">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Akun Saya</h3>
			</div>
			<div class="card-body bg-dark">
				<?php
					echo validation_errors('<div class="alert alert-warning alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <i class="icon fas fa-exclamation-triangle"></i>', '</div>');

					if ($this->session->flashdata('pesan')) {
					  echo '<div class="alert alert-success alert-dismissible">
					    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					  echo $this->session->flashdata('pesan');
					  echo '</div>';
					}

					echo form_open('pelanggan/update_akun_saya/' . $this->session->userdata('id_pelanggan'))
				?>
					<div class="input-group mb-3">
						<input type="text" name="nama_pelanggan" value="<?= set_value('nama_pelanggan') ?>" class="form-control bg-dark" placeholder="Nama Pelanggan Baru" required>
						<div class="input-group-append">
							<div class="input-group-text bg-dark">
								<span class="fas fa-user text-warning"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="email" name="email" value="<?= set_value('email') ?>" class="form-control bg-dark" placeholder="Email Baru" required>
						<div class="input-group-append">
							<div class="input-group-text bg-dark">
								<span class="fas fa-envelope text-warning"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="password" value="<?= set_value('password') ?>" class="form-control bg-dark" placeholder="Password Baru" required>
						<div class="input-group-append">
							<div class="input-group-text bg-dark">
								<span class="fas fa-lock text-warning"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="retype_password" value="<?= set_value('retype_password') ?>" class="form-control bg-dark" placeholder="Retype Password Baru" required>
						<div class="input-group-append">
							<div class="input-group-text bg-dark">
								<span class="fas fa-lock text-warning"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block">Save</button>
						</div>
					</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
</div>