<div class="modal fade" id="masalah-add">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Entry Masalah/Keluhan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="cursor:pointer;">×</button>
			</div>
			<div class="modal-body">
				<form name="frm_frontend" id="add-masalah">
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label>ID Masalah/Keluhan :</label>
								<input id="id_keluhan" name="id_keluhan" class="form-control" type="text" value="<?php echo $IDKeluhan; ?>" readonly />
							</div>	
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Proyek :</label>
								<select class="form-control" id="id_proyek" name="id_proyek">
									<option value="">-- Pilih --</option>
									<?php foreach($DaftarProyek as $data => $rows) : ?>
									<option value="<?php echo $rows['IDProyek']; ?>"><?php echo $rows['IDProyek']." - ".$rows['NamaProyek']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>	
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Klien :</label>
								<select class="form-control" id="id_klien" name="id_klien">
									<option value="">-- Pilih --</option>
									<?php foreach($DaftarKlien as $data => $rows) : ?>
									<option value="<?php echo $rows['IDKlien']; ?>"><?php echo $rows['IDKlien']." - ".$rows['NamaKlien']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>	
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Deskripsi :</label>
								<textarea id="deskripsi" name="deskripsi" class="mandatory form-control" rows="4" maxlength="500" autofocus></textarea>
							</div>	
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label>Divisi :</label>
								<select class="form-control" id="id_divisi" name="id_divisi">
									<option value="">-- Pilih --</option>
									<?php foreach($DaftarDivisi as $data => $rows) : ?>
									<option value="<?php echo $rows['IDDivisi']; ?>"><?php echo $rows['IDDivisi']." - ".$rows['NamaDivisi']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>	
						</div>
						
						<div class="col-sm-3">
							<div class="form-group">
								<label>Pegawai :</label>
								<select class="form-control" id="id_pegawai" name="id_pegawai">
									<option value="">-- Pilih --</option>
									<?php foreach($DaftarPegawai as $data => $rows) : ?>
									<option value="<?php echo $rows['IDPegawai']; ?>"><?php echo $rows['IDPegawai']." - ".$rows['NamaPegawai']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="form-group">
								<label>Jenis Keluhan :</label>
								<select class="form-control" id="jenis_keluhan" name="jenis_keluhan">
									<option value="">-- Pilih --</option>
									<?php foreach($DaftarJenis as $data => $rows) : ?>
									<option value="<?php echo $data; ?>"><?php echo $rows; ?></option>
									<?php endforeach; ?>
								</select>
							</div>	
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Tingkat Masalah :</label>
								<select class="form-control" id="id_tm" name="id_tm">
									<option value="">-- Pilih --</option>
									<?php foreach($DaftarTingkat as $data => $rows) : ?>
									<option value="<?php echo $rows['IDTM']; ?>"><?php echo $rows['IDTM']." - ".$rows['NamaTM']; ?></option>
									<?php endforeach; ?>
								</select>
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