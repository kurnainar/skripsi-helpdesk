<div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaksi</li>
		<li class="breadcrumb-item active">Entry Solusi</li>
	</ol>
	<!-- Example DataTables Card-->
	<div class="card mb-3">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-1">
					<button type="button" id="btn_tambah" class="btn btn-success" style="cursor:pointer;"><i class="fa fa-plus"></i> Tambah</button>
				</div>
				<div class="col-sm-5">
					<input class="form-control" id="CariSolusi" type="text" placeholder="Cari" autofocus>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-lg-12">
					<table class="table table-bordered" width="100%" cellspacing="0">
						<thead>
							<tr align="center">
								<th>ID Solusi</th>
								<th>ID Masalah/Keluhan</th>
								<th>Deskripsi Masalah/Keluhan</th>
								<th>Solusi</th>
								<th>Tanggal Solusi</th>
							</tr>
						</thead>
						<tbody id="data-solusi">
							<?php foreach($DaftarSolusi as $data => $rows) : ?>
							<tr>
								<td style="text-align: center; font-weight: bold;"><?php echo $rows['IDSolusi']; ?></td>
								<td style="text-align: center; font-weight: bold;"><?php echo $rows['IDKeluhan']; ?></td>
								<td><?php echo $rows['Deskripsi']; ?></td>
								<td><?php echo $rows['Solusi']; ?></td>
								<td><?php echo $rows['TglSolusi']; ?></td>
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
<?php $this -> load -> view('transaksi/solusi/solusi-js'); ?>