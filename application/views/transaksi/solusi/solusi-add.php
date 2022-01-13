<div class="modal fade" id="solusi-add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Entry Solusi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="cursor:pointer;">×</button>
			</div>
			<div class="modal-body">
				<form name="frm_frontend" id="add-solusi">
					<div class="form-group">
						<label>ID Solusi :</label>
						<input id="id_solusi" name="id_solusi" class="form-control" type="text" value="<?php echo $IDSolusi; ?>" readonly />
					</div>
					
					<div class="form-group">
						<label>ID Masalah/Keluhan :</label>
						<select class="form-control" id="id_keluhan" name="id_keluhan">
							<option value="">-- Pilih --</option>
							<?php foreach($DaftarKeluhan as $data => $rows) : ?>
							<option value="<?php echo $rows['IDKeluhan']; ?>"><?php echo $rows['IDKeluhan']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					
					<div class="form-group">
						<label>Deskripsi :</label>
						<textarea id="deskripsi" name="deskripsi" class="mandatory form-control" rows="4" maxlength="500" autofocus></textarea>
					</div>
					
					<div class="form-group">
						<label>Solusi :</label>
						<textarea id="solusi" name="solusi" class="mandatory form-control" rows="4" maxlength="500" autofocus></textarea>
					</div>
					
					<div class="form-group">
						<label>Tanggal Solusi :</label>
						<input id="tgl_solusi" name="tgl_solusi" class="form-control" type="date" />
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