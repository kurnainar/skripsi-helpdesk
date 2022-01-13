<div class="modal fade" id="eskalasi-add">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Entry Eskalasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="cursor:pointer;">×</button>
			</div>
			<div class="modal-body">
				<form name="frm_frontend" id="add-eskalasi">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>ID Eskalasi :</label>
								<input id="id_eskalasi" name="id_eskalasi" class="form-control" type="text" value="<?php echo $IDEskalasi; ?>" readonly />
							</div>
						</div>
						
						<div class="col-sm-4">
							<div class="form-group">
								<label>ID Masalah/Keluhan :</label>
								<select class="form-control" id="id_keluhan" name="id_keluhan">
									<option value="">-- Pilih --</option>
									<?php foreach($DaftarKeluhan as $data => $rows) : ?>
									<option value="<?php echo $rows['IDKeluhan']; ?>"><?php echo $rows['IDKeluhan']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>	
						</div>
						
						<div class="col-sm-4">
							<div class="form-group">
								<label>Deskripsi Masalah/Keluhan :</label>
								<textarea id="deskripsi" name="deskripsi" class="mandatory form-control" rows="4" maxlength="500" autofocus></textarea>
							</div>	
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Keterangan :</label>
								<textarea id="keterangan" name="keterangan" class="mandatory form-control" rows="4" maxlength="500" autofocus></textarea>
							</div>	
						</div>
						
						<div class="col-sm-4">
							<div class="form-group">
								<label>Divisi :</label>
								<select class="form-control" id="id_divisi" name="id_divisi">
									<option value="">-- Pilih --</option>
									<?php foreach($DaftarDivisi as $data => $rows) : ?>
									<option value="<?php echo $rows['IDDivisi']; ?>"><?php echo $rows['NamaDivisi']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>	
						</div>
						
						<div class="col-sm-4">
							<div class="form-group">
								<label>Pegawai :</label>
								<select class="form-control" id="id_pegawai" name="id_pegawai">
									<option value="">-- Pilih --</option>
									<?php foreach($DaftarPegawai as $data => $rows) : ?>
									<option value="<?php echo $rows['IDPegawai']; ?>"><?php echo $rows['NamaPegawai']; ?></option>
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