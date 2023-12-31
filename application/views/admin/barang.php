<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Barang</h3>

      <div class="card-tools">
        <a href="<?= base_url('admin/add_barang') ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add</a>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body bg-dark">
      <?php
        if ($this->session->flashdata('pesan')) {
          echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>';
          echo $this->session->flashdata('pesan');
          echo '</div>';
        }
      ?>

      <table class="table table-bordered text-warning" id="example1">
        <thead class="text-center">
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Berat</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <?php $no = 1;
          foreach ($barang as $key => $value): ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $value->nama_barang ?></td>
              <td><?= $value->nama_kategori ?></td>
              <td><?= $value->berat ?> Gram</td>
              <td>Rp. <?= number_format($value->harga, 0) ?></td>
              <td><img src="<?= base_url('assets/barang/' . $value->foto) ?>" width="150px" height="150px"></td>
              <td>
                <a href="<?= base_url('admin/update_barang/' . $value->id_barang) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_barang ?>"><i class="fas fa-trash"></i></button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

<!-- modal delete -->
<?php foreach ($barang as $key => $value) { ?>
  <div class="modal fade" id="delete<?= $value->id_barang ?>">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h4 class="modal-title text-warning">Delete Barang <?= $value->nama_barang ?></h4>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5 class="text-warning">Apakah Anda Yakin Ingin Menghapus Data Ini ... ?</h5>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
          <a href="<?= base_url('admin/delete_barang/' . $value->id_barang) ?>" class="btn btn-primary">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>
<!-- /.modal -->