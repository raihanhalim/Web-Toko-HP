<div class="col-sm-12">
	<?php
	  if ($this->session->flashdata('pesan')) {
	    echo '<div class="alert alert-success alert-dismissible">
	      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	      <i class="icon fas fa-check"></i>';
	    echo $this->session->flashdata('pesan');
	    echo '</div>';
	  }
	?>

	<div class="card card-primary card-tabs">
		<div class="card-header p-0 pt-1 pl-1">
			<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link bg-dark active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><span class="text-warning">Order</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link bg-dark" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false"><span class="text-warning">Proses</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link bg-dark" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false"><span class="text-warning">Kirim</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link bg-dark" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false"><span class="text-warning">Selesai</span></a>
				</li>
			</ul>
		</div>
		<div class="card-body bg-dark">
			<div class="tab-content text-warning" id="custom-tabs-one-tabContent">
				<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
					<table class="table">
						<tr>
							<th>No Order</th>
							<th>Penerima</th>
							<th>Tanggal</th>
							<th>Expedisi</th>
							<th>Total Bayar</th>
							<th></th>
						</tr>
						<?php foreach ($pesanan_order as $key => $value) { ?>
							<tr>
								<td><?= $value->no_order ?></td>
								<td>
									<b><?= $value->nama_penerima ?></b><br>
									<?= $value->hp_penerima ?><br>
									<?= $value->alamat ?>
								</td>
								<td><?= date("d-m-Y", strtotime($value->tgl_order)) ?></td>
								<td>
									<b><?= $value->expedisi ?></b><br>
									Paket : <?= $value->paket ?><br>
									Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
								</td>
								<td>
									<b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
									<?php if ($value->status_bayar == 0) { ?>
										<span class="badge badge-danger">Belum Bayar</span>
									<?php } else { ?>
										<span class="badge badge-success">Sudah Bayar</span><br>
										<span class="badge badge-primary">Menunggu Verifikasi</span>
									<?php } ?>
								</td>
								<td>
									<?php if ($value->status_bayar == 1) { ?>
										<button class="btn btn-sm btn-success btn-flat" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Cek Bukti Bayar</button>
										<a href="<?= base_url('admin/pesanan_proses/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Proses</a>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
				<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
					<table class="table">
						<tr>
							<th>No Order</th>
							<th>Penerima</th>
							<th>Tanggal</th>
							<th>Expedisi</th>
							<th>Total Bayar</th>
							<th></th>
						</tr>
						<?php foreach ($pesanan_proses as $key => $value) { ?>
							<tr>
								<td><?= $value->no_order ?></td>
								<td>
									<b><?= $value->nama_penerima ?></b><br>
									<?= $value->hp_penerima ?><br>
									<?= $value->alamat ?>
								</td>
								<td><?= date("d-m-Y", strtotime($value->tgl_order)) ?></td>
								<td>
									<b><?= $value->expedisi ?></b><br>
									Paket : <?= $value->paket ?><br>
									Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
								</td>
								<td>
									<b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
									<span class="badge badge-primary">Sedang Diroses</span>
								</td>
								<td>
									<?php if ($value->status_bayar == 1) { ?>
										<button class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>"><i class="fas fa-paper-plane"></i> Kirim</button>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
				<div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
					<table class="table">
						<tr>
							<th>No Order</th>
							<th>Penerima</th>
							<th>Tanggal</th>
							<th>Expedisi</th>
							<th>Total Bayar</th>
							<th>No Resi</th>
						</tr>
						<?php foreach ($pesanan_kirim as $key => $value) { ?>
							<tr>
								<td><?= $value->no_order ?></td>
								<td>
									<b><?= $value->nama_penerima ?></b><br>
									<?= $value->hp_penerima ?><br>
									<?= $value->alamat ?>
								</td>
								<td><?= date("d-m-Y", strtotime($value->tgl_order)) ?></td>
								<td>
									<b><?= $value->expedisi ?></b><br>
									Paket : <?= $value->paket ?><br>
									Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
								</td>
								<td>
									<b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
									<span class="badge badge-success">Dalam Perjalanan</span>
								</td>
								<td>
									<h5><?= $value->no_resi ?></h5>
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
				<div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
					<table class="table">
						<tr>
							<th>No Order</th>
							<th>Penerima</th>
							<th>Tanggal</th>
							<th>Expedisi</th>
							<th>Total Bayar</th>
							<th>No Resi</th>
						</tr>
						<?php foreach ($pesanan_selesai as $key => $value) { ?>
							<tr>
								<td><?= $value->no_order ?></td>
								<td>
									<b><?= $value->nama_penerima ?></b><br>
									<?= $value->hp_penerima ?><br>
									<?= $value->alamat ?>
								</td>
								<td><?= date("d-m-Y", strtotime($value->tgl_order)) ?></td>
								<td>
									<b><?= $value->expedisi ?></b><br>
									Paket : <?= $value->paket ?><br>
									Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
								</td>
								<td>
									<b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
									<span class="badge badge-success">Selesai</span>
								</td>
								<td>
									<h5><?= $value->no_resi ?></h5>
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<!-- /.card -->
	</div>
</div>

<?php foreach ($pesanan_order as $key => $value) { ?>
	<div class="modal fade" id="cek<?= $value->id_transaksi ?>">
		<div class="modal-dialog">
			<div class="modal-content bg-dark">
				<div class="modal-header text-warning">
					<h4 class="modal-title"><?= $value->no_order ?></h4>
					<button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-warning">
					<table class="table">
						<tr>
							<th>Nama Bank</th>
							<th>:</th>
							<td><?= $value->nama_bank ?></td>
						</tr>
						<tr>
							<th>No Rekening</th>
							<th>:</th>
							<td><?= $value->no_rek ?></td>
						</tr>
						<tr>
							<th>Atas Nama</th>
							<th>:</th>
							<td><?= $value->atas_nama ?></td>
						</tr>
						<tr>
							<th>Total Bayar</th>
							<th>:</th>
							<td>Rp. <?= number_format($value->total_bayar, 0) ?></td>
						</tr>
					</table>
					<img class="img-fluid pad" src="<?= base_url('assets/bukti_bayar/' . $value->bukti_bayar) ?>">
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>

<?php foreach ($pesanan_proses as $key => $value) { ?>
	<div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
		<div class="modal-dialog">
			<div class="modal-content bg-dark">
				<div class="modal-header text-warning">
					<h4 class="modal-title"><?= $value->no_order ?></h4>
					<button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-warning">
					<?php echo form_open('admin/pesanan_kirim/' . $value->id_transaksi) ?>
						<table class="table mb-0"><br>
							<tr>
								<th>Expedisi</th>
								<th>:</th>
								<th><?= $value->expedisi ?></th>
							</tr>
							<tr>
								<th>Paket</th>
								<th>:</th>
								<th><?= $value->paket ?></th>
							</tr>
							<tr>
								<th>Ongkir</th>
								<th>:</th>
								<th>Rp. <?= number_format($value->ongkir, 0) ?></th>
							</tr>
							<tr>
								<th>No Resi</th>
								<th>:</th>
								<th><input name="no_resi" class="form-control bg-dark" placeholder="No Resi" required></th>
							</tr>
							<th></th><th></th><th></th>
						</table>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Kirim</button>
				</div>
				<?php echo form_close() ?>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>