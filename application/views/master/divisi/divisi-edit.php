<div class="modal fade" id="divisi-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Ubah Data Divisi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="cursor:pointer;">×</button>
			</div>
			<div class="modal-body">
				<form name="frm_frontend" id="edit_divisi">
					<div class="form-group">
						<label>ID Divisi :</label>
						<input id="id_divisi" name="id_divisi" class="form-control" value="" type="text" readonly />
					</div>
					<div class="form-group">
						<label>Nama Divisi :</label>
						<input id="nama_divisi" name="nama_divisi" class="mandatory form-control" type="text" placeholder="Nama Divisi" maxlength="15" autofocus />
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
<?php $this -> load -> view('master/divisi/divisi-js'); ?>