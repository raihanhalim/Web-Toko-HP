<div class="col-md-4">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Laporan Harian</h3>
    </div>
    <div class="card-body bg-dark">
      <?php echo form_open('admin/laporan_harian') ?>
        <div class="row text-warning">
          <div class="col-sm-4">
            <div class="form-group">
              <label>Tanggal</label>
              <select name="tanggal" class="form-control bg-dark">
                <?php
                  $mulai = 1;
                  for ($i = $mulai; $i < $mulai + 31; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Bulan</label>
              <select name="bulan" class="form-control bg-dark">
                <?php
                  $mulai = 1;
                  for ($i = $mulai; $i < $mulai + 12; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Tahun</label>
              <select name="tahun" class="form-control bg-dark">
                <?php
                  $mulai = date('Y') - 1;
                  for ($i = $mulai; $i < $mulai + 7; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-print"></i> Cetak Laporan</button>
            </div>
          </div>
        </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>

<div class="col-md-4">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Laporan Bulanan</h3>
    </div>
    <div class="card-body bg-dark">
      <?php echo form_open('admin/laporan_bulanan') ?>
        <div class="row text-warning">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Bulan</label>
              <select name="bulan" class="form-control bg-dark">
                <?php
                  $mulai = 1;
                  for ($i = $mulai; $i < $mulai + 12; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Tahun</label>
              <select name="tahun" class="form-control bg-dark">
                <?php
                  $mulai = date('Y') - 1;
                  for ($i = $mulai; $i < $mulai + 7; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-print"></i> Cetak Laporan</button>
            </div>
          </div>
        </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>

<div class="col-md-4">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Laporan Tahunan</h3>
    </div>
    <div class="card-body bg-dark">
      <?php echo form_open('admin/laporan_tahunan') ?>
        <div class="row text-warning">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Tahun</label>
              <select name="tahun" class="form-control bg-dark">
                <?php
                  $mulai = date('Y') - 1;
                  for ($i = $mulai; $i < $mulai + 7; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-print"></i> Cetak Laporan</button>
            </div>
          </div>
        </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>