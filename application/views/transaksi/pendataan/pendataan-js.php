<script>
$(document).ready(function(){
	$("#CariProyek").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#data-proyek tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
	
	$('button#btn_tambah').on('click',function(){
		$("#DivModal").load("<?php echo site_url('TransPendataan/TambahPendataan')?>",{
			
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#dataproyek-add').modal({backdrop: 'static', keyboard: false});
				$('#dataproyek-add').modal('show');
				$('#dataproyek-add').on('hidden.bs.modal', function () {
					$('#DivModal').html('');
				});
				
				$('button#btn_tambah').on('click',function(){
					var rnd = Math.floor((Math.random() * 10000) + 1);
					
					$('tbody.additional-content').append(
						'<tr data-id="'+rnd+'">'+
							'<td>'+
								'<input type="hidden" id="grid_id_pegawai_'+rnd+'" name="grid_id_pegawai_'+rnd+'" value="'+$('select.data-pegawai[name="id_pegawai"]').val()+'" />'+
								'<input type="text" class="form-control" value="'+$('select.data-pegawai[name="id_pegawai"] option:selected').text()+'" style="background-color:#ffffff;" readonly />'+
							'</td>'+
							'<td>'+
								'<input type="hidden" id="grid_jabatan_'+rnd+'" name="grid_jabatan_'+rnd+'" value="'+$('select.data-pegawai[name="jabatan"]').val()+'" />'+
								'<input type="text" class="form-control" value="'+$('select.data-pegawai[name="jabatan"] option:selected').text()+'" style="background-color:#ffffff;" readonly />'+
							'</td>'+
							'<td><input type="text" class="form-control" id="grid_periode_mulai_'+rnd+'" name="grid_periode_mulai_'+rnd+'" value="'+$('input.data-pegawai[name="periode_mulai"]').val()+'" style="background-color:#ffffff;" readonly /></td>'+
							'<td><input type="text" class="form-control" id="grid_periode_akhir_'+rnd+'" name="grid_periode_akhir_'+rnd+'" value="'+$('input.data-pegawai[name="periode_akhir"]').val()+'" style="background-color:#ffffff;" readonly /></td>'+
							'<td>'+
								'<button type="button" class="btn btn-danger btn-flat btn-remove" style="cursor:pointer;" data-row="'+rnd+'"><i class="fa fa-fw fa-trash-o"></i></button>'+
							'</td>'+
						'</tr>'
					);
					
					$('.data-pegawai').val('');
					
					$('button.btn-remove').off('click').on('click',function(){
						var id = $(this).attr('data-row');
						$("tr[data-id="+id+"]").remove();
					});
				});
				
				$('#btn_save').on('click',function(){
					
					var NamaProyek		= document.getElementById("nama_proyek").value;
					var LokasiProyek	= document.getElementById("lokasi_proyek").value;
					var TglMulai		= document.getElementById("tgl_mulai").value;
					var NoTelp			= document.getElementById("no_telp").value;
					var NamaKlien 		= $('#id_klien').val();
					
					if(NamaProyek == "") {
						alertify.error('Nama Proyek Tidak Boleh Kosong');
						document.getElementById("nama_proyek").focus();
					} else if(LokasiProyek == "") {
						alertify.error('Lokasi Proyek Tidak Boleh Kosong');
						document.getElementById("lokasi_proyek").focus();
					} else if(TglMulai == "") {
						alertify.error('Tanggal Mulai Proyek Tidak Boleh Kosong');
						document.getElementById("tgl_mulai").focus();
					} else if(NoTelp == "") {
						alertify.error('No Telp Tidak Boleh Kosong');
						document.getElementById("no_telp").focus();
					} else if(NamaKlien == "") {
						alertify.error('Nama Klien Tidak Boleh Kosong');
						document.getElementById("id_klien").focus();
					} else {
						alertify.confirm("Apakah Data Ingin Ditambah?", function(){
							$.ajax({
								url : "<?php echo site_url('TransPendataan/Simpan')?>",
								type: "POST",
								data: $('#add-dataproyek').serialize(),
								dataType: "JSON",
								success: function(data)
								{
									alertify.success('Pendataan Proyek Berhasil Disimpan');
									$('#dataproyek-add').modal('hide');
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alertify.error('Pendataan Proyek Gagal Disimpan');
								}
							});
						}, function(){
							$('#klien-add').modal('hide');
						});
					}
				});
			}
			
			if(statusTxt == "error"){
				console.log("Error: " + xhr.status + ": " + xhr.statusText);
				return false;
			}
		});
	});
});
</script>