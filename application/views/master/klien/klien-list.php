<div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Master</li>
		<li class="breadcrumb-item active">Entry Data Klien</li>
	</ol>
	<!-- Example DataTables Card-->
	<div class="card mb-3">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-1">
					<button type="button" id="btn_tambah" class="btn btn-success" style="cursor:pointer;"><i class="fa fa-plus"></i> Tambah</button>
				</div>
				<div class="col-sm-5">
					<input class="form-control" id="CariKlien" type="text" placeholder="Cari" autofocus>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-lg-12">
					<table class="table table-bordered" width="100%" cellspacing="0">
						<thead>
							<tr align="center">
								<th>ID Klien</th>
								<th>Nama Klien</th>
								<th>Alamat</th>
								<th>No. Telp</th>
								<th>Nama Proyek</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody id="data-klien">
							<?php foreach($DaftarKlien as $data => $rows) : ?>
							<tr>
								<td style="text-align: center; font-weight: bold;"><?php echo $rows['IDKlien']; ?></td>
								<td><?php echo $rows['NamaKlien']; ?></td>
								<td><?php echo $rows['Alamat']; ?></td>
								<td><?php echo $rows['NoTelp']; ?></td>
								<td><?php echo ($rows['IDProyek']?$rows['NamaProyek']:'-'); ?></td>
								<td style="text-align: center;">
									<button type="button" data-id="<?php echo $rows['IDKlien']; ?>" class="btn btn-success btn-edit" style="cursor:pointer;"><i class="fa fa-pencil-square-o"></i> Ubah</button>
									<button type="button" data-id="<?php echo $rows['IDKlien']; ?>" class="btn btn-danger btn-hapus" style="cursor:pointer;"><i class="fa fa-trash-o"></i> Hapus</button>
								</td>
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
<?php $this -> load -> view('master/klien/klien-js'); ?>