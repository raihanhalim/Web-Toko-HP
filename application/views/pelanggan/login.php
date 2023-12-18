<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <div class="register-box">
      <div class="register-logo">
        <a href="<?= base_url() ?>" class="text-warning"><b>Toko</b>HP</a>
      </div>

      <div class="card">
        <div class="card-body register-card-body bg-dark">
          <p class="login-box-msg text-warning">Login Pelanggan</p>

          <?php
            echo validation_errors('<div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="icon fas fa-exclamation-triangle"></i>', '</div>');

            if ($this->session->flashdata('error')) {
              echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
              echo $this->session->flashdata('error');
              echo '</div>';
            }

            if ($this->session->flashdata('pesan')) {
              echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
              echo $this->session->flashdata('pesan');
              echo '</div>';
            }

            echo form_open('auth/login_pelanggan');
          ?>
            <div class="input-group mb-3">
              <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control bg-dark" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope text-warning"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control bg-dark" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock text-warning"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <a href="<?= base_url('auth/register_pelanggan') ?>" class="btn btn-success btn-block">Register</a>
              </div>
              <div class="col-6">
                <button type="submit" class="btn btn-primary btn-block">Log In</button>
              </div>
            </div>
          <?php echo form_close() ?>
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
  </div>
  <div class="col-sm-4"></div>
</div>