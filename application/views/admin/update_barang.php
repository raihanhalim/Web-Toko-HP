<div class="col-md-12">
  <!-- general form elements disabled -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Form Update Barang</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body bg-dark">
      <?php
        // notifikasi form kosong
        echo validation_errors('<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-info"></i>', '</div>');

        // notifikasi gagal upload gambar
        if (isset($error_upload)) {
          echo '<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="icon fas fa-info"></i>' . $error_upload . '</div>';
        }
        echo form_open_multipart('admin/update_barang/' . $barang->id_barang)
      ?>
        <div class="form-group text-warning">
          <label>Nama Barang</label>
          <input name="nama_barang" class="form-control bg-dark" placeholder="Nama Barang" value="<?= $barang->nama_barang ?>">
        </div>
        <div class="row text-warning">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Kategori</label>
              <select name="id_kategori" class="form-control bg-dark">
                <option value="<?= $barang->id_kategori ?>"><?= $barang->nama_kategori ?></option>
                <?php foreach ($kategori as $key => $value) { ?>
                  <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Berat (Gram)</label>
              <input type="number" name="berat" min="0" class="form-control bg-dark" placeholder="Berat Dalam Satuan Gram" value="<?= $barang->berat ?>">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Harga</label>
              <input name="harga" class="form-control bg-dark" placeholder="Harga Barang" value="<?= $barang->harga ?>">
            </div>
          </div>
        </div>
        <div class="form-group text-warning">
          <label>Deskripsi</label>
          <textarea name="deskripsi" class="form-control bg-dark" rows="5" placeholder="Deskripsi Barang"><?= $barang->deskripsi ?></textarea>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group text-warning">
              <label>Foto</label>
              <input type="file" name="foto" class="form-control bg-dark" id="preview_foto">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <img src="<?= base_url('assets/barang/' . $barang->foto) ?>" id="foto_load" width="200px" height="200px">
            </div>
          </div>
        </div>
        <div class="form-group">
          <a href="<?= base_url('admin/barang') ?>" class="btn btn-success btn-sm">Back</a>
          <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>

<script>
  function read_foto(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#foto_load').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#preview_foto").change(function () {
    read_foto(this);
  });
</script>