<div class="row">
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
								<th>Action</th>
							</tr>
							<?php foreach ($order as $key => $value) { ?>
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
										<?php if ($value->status_bayar == 0) { ?>
											<a href="<?= base_url('pelanggan/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Bayar</a>
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
							</tr>
							<?php foreach ($proses as $key => $value) { ?>
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
										<span class="badge badge-success">Terverifikasi</span><br>
										<span class="badge badge-primary">Sedang Diproses</span>
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
							<?php foreach ($kirim as $key => $value) { ?>
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
										<span class="badge badge-success">Dalam Perjalanan</span><br>
									</td>
									<td>
										<h5><?= $value->no_resi ?><br>
											<button data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>" class="btn btn-primary btn-xs">Diterima</button>
										</h5>
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
							<?php foreach ($selesai as $key => $value) { ?>
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
										<span class="badge badge-success">Selesai</span><br>
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
</div>

<?php foreach ($kirim as $key => $value) { ?>
	<div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
		<div class="modal-dialog">
			<div class="modal-content bg-dark">
				<div class="modal-header text-warning">
					<h4 class="modal-title">Pesanan Diterima</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-warning">
					Apakah Anda Yakin Pesanan Sudah Diterima...?
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-success" data-dismiss="modal">Belum</button>
					<a href="<?= base_url('pelanggan/selesai/' . $value->id_transaksi) ?>" class="btn btn-primary">Sudah</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>