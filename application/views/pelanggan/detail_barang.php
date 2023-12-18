<!-- Default box -->
<div class="card card-solid">
  <div class="card-body bg-dark">
    <div class="row text-warning">
      <div class="col-12 col-sm-6">
        <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
        <div class="col-12 text-center">
          <img src="<?= base_url('assets/barang/' . $barang->foto) ?>" class="product-image" alt="Product Image" style="width: 350px; height: 380px;">
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <h3 class="my-3"><?= $barang->nama_barang ?></h3>
        <hr class="bg-light">
        <h5><?= $barang->nama_kategori ?></h5>
        <hr class="bg-light">
        <p><?= $barang->deskripsi ?></p>
        <hr class="bg-light">
        <div class="bg-success py-2 px-3 mt-4">
          <h2 class="mb-0">
            Rp. <?= number_format($barang->harga, 0) ?>
          </h2>
        </div>
        <hr class="bg-light">
        <?php
          echo form_open('pelanggan/add_cart');
          echo form_hidden('id', $barang->id_barang);
          echo form_hidden('price', $barang->harga);
          echo form_hidden('name', $barang->nama_barang);
          echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
        ?>
          <div class="mt-4">
            <div class="row">
              <div class="col-sm-2">
                <input type="number" name="qty" class="form-control bg-dark" value="1" min="1">
              </div>
              <div class="col-sm-8">
                <button type="submit" class="btn btn-primary btn-flat swalDefaultSuccess">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                  Add to Cart
                </button>
              </div>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>template/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Barang Berhasil Ditambahkan Ke Keranjang !!!'
      })
    });
  });
</script>