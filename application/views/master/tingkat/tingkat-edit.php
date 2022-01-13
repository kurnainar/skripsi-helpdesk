<div class="modal fade" id="tingkat-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Ubah Data Tingkat Masalah</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="cursor:pointer;">×</button>
			</div>
			<div class="modal-body">
				<form name="frm_frontend" id="edit-tingkat">
					<div class="form-group">
						<label>ID Tingkat Masalah :</label>
						<input id="id_tm" name="id_tm" class="form-control" type="text" readonly />
					</div>
					
					<div class="form-group">
						<label>Nama Tingkat Masalah :</label>
						<input id="nama_tm" name="nama_tm" class="mandatory form-control" type="text" placeholder="Nama Tingkat Masalah" maxlength="8" autofocus />
					</div>
					
					<div class="form-group">
						<label>Lama Pengerjaan :</label>
						<input id="waktu" name="waktu" class="mandatory form-control" type="number" placeholder="Lama Pengerjaan" maxlength="3" />
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="btn_ubah" type="button" class="btn btn-primary" style="cursor:pointer;"><i class="fa fa-fw fa-save"></i>&nbsp;Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>