<div class="row">
  <div class="col-sm-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">No Rekening Toko</h3>
      </div>
      <div class="card-body bg-dark">
        <p class="text-warning">Silahkan Transfer Uang Ke No Rekening Di Bawah Ini Sebesar :</p>
        <h2 class="text-success">Rp. <?= number_format($transaksi->total_bayar, 0) ?>.-</h2><br>
        <table class="table text-warning">
          <tr>
            <th>Bank</th>
            <th>No Rekening</th>
            <th>Atas Nama</th>
          </tr>
          <?php foreach ($rekening as $key => $value) { ?>
            <tr>
              <td><?= $value->nama_bank ?></td>
              <td><?= $value->no_rek ?></td>
              <td><?= $value->atas_nama ?></td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Upload Bukti Pembayaran</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php
        echo form_open_multipart('pelanggan/bayar/' . $transaksi->id_transaksi);
      ?>
        <div class="card-body bg-dark">
          <div class="form-group text-warning">
            <label>Atas Nama</label>
            <input name="atas_nama" class="form-control bg-dark" placeholder="Atas Nama" required>
          </div>
          <div class="form-group text-warning">
            <label>Nama Bank</label>
            <input name="nama_bank" class="form-control bg-dark" placeholder="Nama Bank" required>
          </div>
          <div class="form-group text-warning">
            <label>No Rekening</label>
            <input name="no_rek" class="form-control bg-dark" placeholder="No Rekening" required>
          </div>
          <div class="form-group text-warning">
            <label for="exampleInputFile">Bukti Bayar</label>
            <input type="file" name="bukti_bayar" class="form-control bg-dark" required>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer bg-dark">
          <a href="<?= base_url('pelanggan/pesanan_saya') ?>" class="btn btn-success">Back</a>
          <button type="submit" class="btn btn-primary float-right">Bayar</button>
        </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>