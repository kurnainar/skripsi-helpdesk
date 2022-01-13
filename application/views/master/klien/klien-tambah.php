<div class="modal fade" id="klien-add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Tambah Data Klien</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="cursor:pointer;">×</button>
			</div>
			<div class="modal-body">
				<form name="frm_frontend" id="add-klien">
					<div class="form-group">
						<label>ID Klien :</label>
						<input id="id_klien" name="id_klien" class="form-control" value="K001" type="text" disabled />
					</div>
					
					<div class="form-group">
						<label>Nama Klien :</label>
						<input id="nama_klien" name="nama_klien" class="mandatory form-control" type="text" placeholder="Nama Klien" maxlength="50" autofocus />
					</div>
					
					<div class="form-group">
						<label>Alamat :</label>
						<textarea id="alamat_klien" name="alamat_klien" class="mandatory form-control" rows="4" maxlength="150"></textarea>
					</div>
					
					<div class="form-group">
						<label>No. Telp :</label>
						<input id="no_telp" name="no_telp" class="mandatory form-control" type="number" placeholder="No. Telp" maxlength="13" />
					</div>
					
					<div class="form-group">
						<label>Proyek :</label>
						<select class="form-control" id="id_divisi" name="id_proyek">
							<option value="">-- Pilih --</option>
							<?php
								$year = date('Y');
								$newdate = strtotime ( '-18 year' , strtotime ( $year ) ) ;
								$newdate = date ( 'Y' , $newdate );
								
								for($thn=1945; $thn<=$newdate; $thn++) {
							?>
							<option value="<?php echo $thn; ?>"><?php echo $thn; ?></option>
							<?php
								}
							?>
						</select>
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