<div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaksi</li>
		<li class="breadcrumb-item active">Entry Eskalasi</li>
	</ol>
	<!-- Example DataTables Card-->
	<div class="card mb-3">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-1">
					<button type="button" id="btn_tambah" class="btn btn-success" style="cursor:pointer;"><i class="fa fa-plus"></i> Tambah</button>
				</div>
				<div class="col-sm-5">
					<input class="form-control" id="CariEskalasi" type="text" placeholder="Cari" autofocus>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-lg-12">
					<table class="table table-bordered" width="100%" cellspacing="0">
						<thead>
							<tr align="center">
								<th>ID Eskalasi</th>
								<th>ID Masalah/Keluhan</th>
								<th>Deskripsi Masalah/Keluhan</th>
								<th>Tanggal Eskalasi</th>
								<th>Keterangan</th>
								<th>Nama Pegawai</th>
							</tr>
						</thead>
						<tbody id="data-eskalasi">
							<?php foreach($DaftarEskalasi as $data => $rows) : ?>
							<tr>
								<td style="text-align: center; font-weight: bold;"><?php echo $rows['IDEskalasi']; ?></td>
								<td><?php echo $rows['IDKeluhan']; ?></td>
								<td><?php echo $rows['IDKeluhan']." - ".$rows['Deskripsi']; ?></td>
								<td><?php echo $rows['TglEskalasi']; ?></td>
								<td><?php echo $rows['Keterangan']; ?></td>
								<td><?php echo $rows['NamaPegawai']; ?></td>
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
<?php $this -> load -> view('transaksi/eskalasi/eskalasi-js'); ?>