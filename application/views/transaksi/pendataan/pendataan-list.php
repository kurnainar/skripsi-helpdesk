<div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaksi</li>
		<li class="breadcrumb-item active">Entry Pendataan Proyek</li>
	</ol>
	<!-- Example DataTables Card-->
	<div class="card mb-3">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-1">
					<button type="button" id="btn_tambah" class="btn btn-success" style="cursor:pointer;"><i class="fa fa-plus"></i> Tambah</button>
				</div>
				<div class="col-sm-5">
					<input class="form-control" id="CariProyek" type="text" placeholder="Cari" autofocus>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-lg-12">
					<table class="table table-bordered" width="100%" cellspacing="0">
						<thead>
							<tr align="center">
								<th>ID Proyek</th>
								<th>Nama Proyek</th>
								<th>Lokasi Proyek</th>
								<th>Tanggal Mulai Proyek</th>
								<th>No. Telp</th>
								<th>Pegawai</th>
								<th>Klien</th>
							</tr>
						</thead>
						<tbody id="data-proyek">
						<?php 
							foreach($DaftarPendataan as $data => $rows) : 
							echo "<pre>";
							print_r($DaftarAda[$data]);
							echo "</pre>";
						?>
							<tr>
								<td style="text-align: center; font-weight: bold;"><?php echo $rows['IDProyek']; ?></td>
								<td><?php echo $rows['NamaProyek']; ?></td>
								<td><?php echo $rows['LokasiProyek']; ?></td>
								<td><?php echo $rows['TglMulaiProyek']; ?></td>
								<td><?php echo $rows['NoTelp']; ?></td>
								<td><?php echo $rows['IDProyek']; ?></td>
								<td><?php echo $rows['IDProyek']; ?></td>
							</tr>
						<?php endforeach; ?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="DivModal"></div>
<?php $this -> load -> view('transaksi/pendataan/pendataan-js'); ?>