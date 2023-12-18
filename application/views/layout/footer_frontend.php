      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer navbar-dark">
      <div class="container">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Anything You Want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2023 <a href="<?= base_url() ?>">Toko HP</a>.</strong> All Rights Reserved.
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <script>
    window.setTimeout(function () {
      $(".alert").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
      });
    }, 3000)
  </script>
</body>
</html>