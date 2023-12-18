<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin') ?>" class="brand-link">
    <span class="brand-text d-flex justify-content-center text-warning">Admin Panel</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="<?= base_url('admin') ?>" class="nav-link <?php if ($this->uri->uri_string(1) == 'admin') {
            echo "active";
          } ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p> Dashboard </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('admin/kategori') ?>" class="nav-link <?php if ($this->uri->uri_string(1) == 'admin/kategori') {
            echo "active";
          } ?>">
            <i class="nav-icon fas fa-list"></i>
            <p> Kategori </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('admin/barang') ?>" class="nav-link <?php if ($this->uri->uri_string(1) == 'admin/barang') {
            echo "active";
          } ?>">
            <i class="nav-icon fas fa-cubes"></i>
            <p> Barang </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('admin/pesanan_masuk') ?>" class="nav-link <?php if ($this->uri->uri_string(1) == 'admin/pesanan_masuk') {
            echo "active";
          } ?>">
            <i class="nav-icon fas fa-download"></i>
            <p> Pesanan Masuk </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('admin/pelanggan') ?>" class="nav-link <?php if ($this->uri->uri_string(1) == 'admin/pelanggan') {
            echo "active";
          } ?>">
            <i class="nav-icon fas fa-users"></i>
            <p> Pelanggan </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('admin/laporan') ?>" class="nav-link <?php if ($this->uri->uri_string(1) == 'admin/laporan') {
            echo "active";
          } ?>">
            <i class="nav-icon fas fa-file"></i>
            <p> Laporan </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('admin/setting') ?>" class="nav-link <?php if ($this->uri->uri_string(1) == 'admin/setting') {
            echo "active";
          } ?>">
            <i class="nav-icon fas fa-asterisk"></i>
            <p> Setting </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('auth/logout_admin') ?>" class="nav-link">
            <i class="nav-icon fas fa-sign"></i>
            <p> Log Out </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper navbar-secondary">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>" class="text-warning">Home</a></li>
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
    <div class="container-fluid">
      <div class="row">