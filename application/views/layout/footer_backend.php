          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer navbar-dark">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything You Want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2023 <a href="<?= base_url('admin') ?>">Toko HP</a>.</strong> All Rights Reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script>
    window.setTimeout(function () {
      $(".alert").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
      });
    }, 3000)
  </script>
</body>
</html>