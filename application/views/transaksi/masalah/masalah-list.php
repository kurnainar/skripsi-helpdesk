<div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaksi</li>
		<li class="breadcrumb-item active">Entry Masalah/Keluhan</li>
	</ol>
	<!-- Example DataTables Card-->
	<div class="card mb-3">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-1">
					<button type="button" id="btn_tambah" class="btn btn-success" style="cursor:pointer;"><i class="fa fa-plus"></i> Tambah</button>
				</div>
				<div class="col-sm-5">
					<input class="form-control" id="CariMasalah" type="text" placeholder="Cari" autofocus>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-lg-12">
					<table class="table table-bordered" width="100%" cellspacing="0">
						<thead>
							<tr align="center">
								<th>ID Masalah/Keluhan</th>
								<th>Tanggal Masalah/Keluhan</th>
								<th>Status Keluhan</th>
								<th>Nama Proyek</th>
								<th>Nama Klien</th>
								<th>Deskripsi</th>
								<th>Nama Divisi</th>
								<th>Nama Pegawai</th>
								<th>Jenis Keluhan</th>
								<th>Tingkat Masalah</th>
								<!-- <th>Aksi</th> -->
							</tr>
						</thead>
						<tbody id="data-masalah">
							<?php foreach($DaftarKeluhan as $data => $rows) : ?>
							<tr>
								<td style="text-align: center; font-weight: bold;"><?php echo $rows['IDKeluhan']; ?></td>
								<td><?php echo $rows['TglKeluhan']; ?></td>
								<td><?php echo $rows['StatusKeluhan']; ?></td>
								<td><?php echo $rows['NamaProyek']; ?></td>
								<td><?php echo $rows['NamaKlien']; ?></td>
								<td><?php echo $rows['Deskripsi']; ?></td>
								<td><?php echo $rows['NamaDivisi']; ?></td>
								<td><?php echo $rows['NamaPegawai']; ?></td>
								<td><?php echo $rows['JenisKeluhan']; ?></td>
								<td><?php echo $rows['NamaTM']; ?></td>
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
<?php $this -> load -> view('transaksi/masalah/masalah-js'); ?>