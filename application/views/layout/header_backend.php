<body class="hold-transition sidebar-mini dark-mode layout-fixed layout-navbar-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-warning" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link disabled d-flex" href="#">
            <span class="brand-text text-warning mr-2"><?= $this->session->userdata('nama_admin') ?></span>
            <img src="<?= base_url() ?>template/dist/img/user8-128x128.jpg" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          </a>
          
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->