<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Kategori</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Add</button>
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
            <th>Nama Kategori</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <?php $no = 1;
          foreach ($kategori as $key => $value): ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $value->nama_kategori ?></td>
              <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?= $value->id_kategori ?>"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_kategori ?>"><i class="fas fa-trash"></i></button>
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

<!-- modal add -->
<div class="modal fade" id="add">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4 class="modal-title text-warning">Add Kategori</h4>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
          echo form_open('admin/add_kategori');
        ?>

        <div class="form-group">
          <label class="text-warning">Nama Kategori</label>
          <input type="text" name="nama_kategori" class="form-control bg-dark" placeholder="Nama Kategori" required>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      <?php
        echo form_close();
      ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal update -->
<?php foreach ($kategori as $key => $value) { ?>
  <div class="modal fade" id="update<?= $value->id_kategori ?>">
    <div class="modal-dialog modal-sm">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h4 class="modal-title text-warning">Update Kategori</h4>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
            echo form_open('admin/update_kategori/' . $value->id_kategori);
          ?>

          <div class="form-group">
            <label class="text-warning">Nama Kategori</label>
            <input type="text" name="nama_kategori" value="<?= $value->nama_kategori ?>" class="form-control bg-dark" placeholder="Nama Kategori" required>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        <?php
          echo form_close();
        ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>
<!-- /.modal -->

<!-- modal delete -->
<?php foreach ($kategori as $key => $value) { ?>
  <div class="modal fade" id="delete<?= $value->id_kategori ?>">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h4 class="modal-title text-warning">Delete Kategori <?= $value->nama_kategori ?></h4>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5 class="text-warning">Apakah Anda Yakin Ingin Menghapus Data Ini ... ?</h5>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
          <a href="<?= base_url('admin/delete_kategori/' . $value->id_kategori) ?>" class="btn btn-primary">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>
<!-- /.modal -->