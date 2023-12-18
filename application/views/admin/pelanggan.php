<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Pelanggan</h3>
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
            <th>Nama Pelanggan</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <?php $no = 1;
          foreach ($pelanggan as $key => $value): ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $value->nama_pelanggan ?></td>
              <td><?= $value->email ?></td>
              <td><?= $value->password ?></td>
              <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?= $value->id_pelanggan ?>"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_pelanggan ?>"><i class="fas fa-trash"></i></button>
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
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h4 class="modal-title text-warning">Add Pelanggan</h4>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-warning">
        <?php
          echo form_open('admin/add_pelanggan');
        ?>

        <div class="form-group">
          <label>Nama Pelanggan</label>
          <input type="text" name="nama_pelanggan" class="form-control bg-dark" placeholder="Nama Pelanggan" required>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control bg-dark" placeholder="Email" required>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control bg-dark" placeholder="Password" required>
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

<!-- modal edit -->
<?php foreach ($pelanggan as $key => $value) { ?>
  <div class="modal fade" id="update<?= $value->id_pelanggan ?>">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h4 class="modal-title text-warning">Update Pelanggan</h4>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-warning">
          <?php
            echo form_open('admin/update_pelanggan/' . $value->id_pelanggan);
          ?>

          <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" value="<?= $value->nama_pelanggan ?>" class="form-control bg-dark" placeholder="Nama Pelanggan" required>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="<?= $value->email ?>" class="form-control bg-dark" placeholder="Email" required>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" value="<?= $value->password ?>" class="form-control bg-dark" placeholder="Password" required>
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
<?php foreach ($pelanggan as $key => $value) { ?>
  <div class="modal fade" id="delete<?= $value->id_pelanggan ?>">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h4 class="modal-title text-warning">Delete <?= $value->nama_pelanggan ?></h4>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-warning">
          <h5>Apakah Anda Yakin Ingin Menghapus Data Ini ... ?</h5>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
          <a href="<?= base_url('admin/delete_pelanggan/' . $value->id_pelanggan) ?>" class="btn btn-primary">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>
<!-- /.modal -->