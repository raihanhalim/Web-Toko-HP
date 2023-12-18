<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-dark">
  <div class="container">
    <a href="<?= base_url() ?>" class="navbar-brand">
      <i class="fas fa-store text-primary"></i>
      <span class="brand-text font-weight-light text-warning"><b> Toko HP</b></span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="<?= base_url() ?>" class="nav-link text-warning">Home</a>
        </li>

        <?php $kategori = $this->m_pelanggan->get_all_data_kategori(); ?>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-warning">Kategori</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow bg-secondary">
            <?php foreach ($kategori as $key => $value) { ?>
              <li><a href="<?= base_url('pelanggan/kategori/' . $value->id_kategori) ?>" class="dropdown-item bg-secondary"><span class="text-warning"><?= $value->nama_kategori ?></span></a></li>
            <?php } ?>
          </ul>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('pelanggan/contact') ?>" class="nav-link text-warning">Contact</a>
        </li>
      </ul>
    </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <?php if ($this->session->userdata('email') == "") { ?>
          <a class="nav-link" href="<?= base_url('auth/login_pelanggan') ?>">
            <span class="brand-text font-weight-light text-warning">Login/Register</span>
            <img src="<?= base_url() ?>template/dist/img/user1-128x128.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          </a>
        <?php } else { ?>
          <a class="nav-link" data-toggle="dropdown" href="#">
            <span class="brand-text font-weight-light text-warning"><?= $this->session->userdata('nama_pelanggan') ?></span>
            <img src="<?= base_url() ?>template/dist/img/user1-128x128.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          </a>

          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('pelanggan/akun_saya') ?>" class="dropdown-item bg-secondary">
              <i class="fas fa-user mr-2 text-warning"></i><span class="ml-2 text-warning">Akun Saya</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('pelanggan/pesanan_saya') ?>" class="dropdown-item bg-secondary">
              <i class="fas fa-shopping-cart mr-2 text-warning"></i><span class="text-warning">Pesanan Saya</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('auth/logout_pelanggan') ?>" class="dropdown-item dropdown-footer bg-secondary"><span class="text-warning">Log Out</span></a>
          </div>
        <?php } ?>
      </li>

      <?php
        $keranjang = $this->cart->contents();
        $jml_item = 0;
        foreach ($keranjang as $key => $value) {
          $jml_item = $jml_item + $value['qty'];
        }
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-shopping-cart text-primary"></i>
          <span class="badge badge-danger navbar-badge"><?= $jml_item ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php if (empty($keranjang)) { ?>
            <a href="#" class="dropdown-item bg-secondary">
              <p class="text-warning">Keranjang Belanja Kosong</p>
            </a>
          <?php } else {
            foreach ($keranjang as $key => $value) {
              $barang = $this->m_pelanggan->detail_barang($value['id']);
          ?>
              <!-- Barang Start -->
              <a href="#" class="dropdown-item bg-secondary">
                <div class="media">
                  <img src="<?= base_url('assets/barang/' . $barang->foto) ?>" alt="User Avatar" class="img-size-50 mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title text-warning"><?= $value['name'] ?></h3>
                    <p class="text-sm text-warning"><?= $value['qty'] ?> x Rp. <?= number_format($value['price'], 0) ?></p>
                    <p class="text-sm text-warning "><i class="fas fa-calculator text-success"></i> Rp. <?= $this->cart->format_number($value['subtotal']); ?></p>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
            <?php } ?>
            <!-- Barang End -->
            <a href="#" class="dropdown-item bg-secondary">
              <div class="media">
                <div class="media-body">
                  <tr>
                    <td colspan="2"></td>
                    <td><strong class="text-warning">Total :</strong></td>
                    <td><span class="text-warning">Rp. <?= $this->cart->format_number($this->cart->total()); ?></span></td>
                  </tr>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('pelanggan/view_cart') ?>" class="dropdown-item dropdown-footer bg-secondary"><span class="text-warning">View Cart</span></a>
            <a href="<?= base_url('pelanggan/check_out') ?>" class="dropdown-item dropdown-footer bg-secondary"><span class="text-warning">Check Out</span></a>
          <?php } ?>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
    </ul>
  </div>
</nav>
<!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper navbar-secondary">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-warning">Toko HP</a></li>
            <li class="text-info ml-2 mr-2">></li>
            <li class="breadcrumb-item active text-light"><?= $tittle ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">