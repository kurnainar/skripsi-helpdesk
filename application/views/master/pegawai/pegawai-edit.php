<div class="modal fade" id="pegawai-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Ubah Data Pegawai</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="cursor:pointer;">×</button>
			</div>
			<div class="modal-body">
				<form name="frm_frontend" id="edit_pegawai">
					<div class="form-group">
						<label>ID Pegawai :</label>
						<input id="id_pegawai" name="id_pegawai" class="form-control" type="text" readonly />
					</div>
					
					<div class="form-group">
						<label>Nama Pegawai :</label>
						<input id="nama_pegawai" name="nama_pegawai" class="mandatory form-control" type="text" placeholder="Nama Pegawai" maxlength="50" autofocus />
					</div>
					
					<div class="form-group">
						<label>Tempat Lahir :</label>
						<input id="tempat_lahir" name="tempat_lahir" class="mandatory form-control" type="text" maxlength="30" placeholder="Tempat Lahir" />
					</div>
					
					<div class="form-group">
						<label>Tanggal Lahir :</label>
						<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
					</div>
					
					<div class="form-group">
						<label>No. Telp :</label>
						<input id="no_telp" name="no_telp" class="mandatory form-control" type="number" placeholder="No. Telp" maxlength="13" />
					</div>
					
					<div class="form-group">
						<label>Divisi :</label>
						<select class="form-control" id="id_divisi" name="id_divisi">
							<option value="">-- Pilih --</option>
							<?php
								foreach($Divisi as $data => $rows) :
							?>
							<option value="<?php echo $rows['IDDivisi']; ?>"><?php echo $rows['IDDivisi']." - ".$rows['NamaDivisi']; ?></option>
							<?php
								endforeach;
							?>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="btn_ubah" type="button" class="btn btn-primary" style="cursor:pointer;"><i class="fa fa-fw fa-save"></i>&nbsp;Ubah</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>