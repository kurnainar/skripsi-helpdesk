<div class="modal fade" id="dataproyek-add">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Tambah Pendataan Proyek</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="cursor:pointer;">×</button>
			</div>
			<div class="modal-body">
				<form id="add-dataproyek">
					<div class="row">
						<div class="col-sm-12">
							<div class="panel-group">
									<div class="panel panel-default">
										<div class="panel-heading">Data Proyek</div>
										<div class="panel-body">
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label>ID Proyek :</label>
														<input id="id_proyek" name="id_proyek" class="form-control" type="text" value="<?php echo $IDProyek; ?>" readonly />
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Nama Proyek :</label>
														<input id="nama_proyek" name="nama_proyek" class="form-control" type="text" />
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Lokasi Proyek :</label>
														<textarea id="lokasi_proyek" name="lokasi_proyek" class="mandatory form-control" rows="4" maxlength="150"></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label>Tanggal Mulai Proyek :</label>
														<input id="tgl_mulai" name="tgl_mulai" class="form-control" type="date" />
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>No Telp :</label>
														<input id="no_telp" name="no_telp" class="form-control" type="number" />
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="panel-group">
								<div class="panel panel-default">
									<div class="panel-heading">Data Klien</div>
									<div class="panel-body">
										<div class="form-group">
											<label>Nama Klien :</label>
											<select multiple class="form-control" id="id_klien" name="id_klien[]">
												<?php foreach($DaftarKlien as $data => $rows) : ?>
												<option value="<?php echo $rows['IDKlien']; ?>"><?php echo ($rows['IDKlien']?$rows['IDKlien']." - ".$rows['NamaKlien']:''); ?></option>
												<?php endforeach; ?>
											</select>
										</div>	
										<p class="small">**Catatan: tahan ctrl atau shift (atau seret dengan mouse) untuk memilih lebih dari satu</p>									
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="panel-group">
								<div class="panel panel-default">
									<div class="panel-heading">Data Pegawai</div>
									<div class="panel-body">
										<div class="form-group">
											<label>Nama Pegawai :</label>
											<select class="form-control data-pegawai" id="id_divisi" name="id_pegawai">
												<option value="">-- Pilih --</option>
												<?php foreach($DaftarPegawai as $data => $rows) : ?>
												<option value="<?php echo $rows['IDPegawai']; ?>"><?php echo ($rows['IDPegawai']?$rows['IDPegawai']." - ".$rows['NamaPegawai']:''); ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										
										<div class="form-group">
											<label>Jabatan :</label>
											<select class="form-control data-pegawai" id="id_divisi" name="jabatan">
												<option value="">-- Pilih --</option>
												<?php 
												print_r($data);
												foreach($DaftarJabatan as $data => $rows) : ?>
												<option value="<?php echo $data; ?>"><?php echo $rows; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										
										<div class="form-group">
											<label>Periode :</label>
											<div class="row">
												<div class="col-sm-6">
													<input type="date" class="form-control data-pegawai" id="periode_mulai" name="periode_mulai">
												</div>
												
												<div class="col-sm-6">
													<input type="date" class="form-control data-pegawai" id="periode_akhir" name="periode_akhir">
												</div>
											</div>
										</div>			
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<button id="btn_tambah" type="button" class="btn btn-primary btn-block" style="cursor:pointer;"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-12">
							<div class="panel-group">
								<div class="panel panel-default">
									<div class="panel-heading">List Penambahan Data Proyek</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered" width="100%" cellspacing="0">
												<thead>
													<tr align="center">
														<th>Nama Pegawai</th>
														<th>Jabatan</th>
														<th>Tgl Mulai</th>
														<th>Tgl Selesai</th>
														<th>&nbsp;</th>
													</tr>
												</thead>
												<tbody class="additional-content"></tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="btn_save" type="button" class="btn btn-primary" style="cursor:pointer;"><i class="fa fa-fw fa-save"></i>&nbsp;Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>