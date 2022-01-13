<script>
$(document).ready(function(){
	$("#CariMasalah").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#data-masalah tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
	
	$('button#btn_tambah').on('click',function(){
		$("#DivModal").load("<?php echo site_url('TransMasalah/TambahMasalah')?>",{
			
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#masalah-add').modal({backdrop: 'static', keyboard: false});
				$('#masalah-add').modal('show');
				$('#masalah-add').on('hidden.bs.modal', function () {
					$('#DivModal').html('');
				});
				
				$('#btn_save').on('click',function(){
					// $('#masalah-add').modal('hide');
					// alertify.success('Success message');
					
					var NamaProyek		= document.getElementById("id_proyek").value;
					var NamaKlien		= document.getElementById("id_klien").value;
					var Deskripsi		= document.getElementById("deskripsi").value;
					var Divisi			= document.getElementById("id_divisi").value;
					var Pegawai 		= document.getElementById("id_pegawai").value;
					var JenisKeluhan 	= document.getElementById("jenis_keluhan").value;
					var Tingkat 		= document.getElementById("id_tm").value;
					
					if(NamaProyek == "") {
						alertify.error('Nama Proyek Tidak Boleh Kosong');
						document.getElementById("id_proyek").focus();
					} else if(NamaKlien == "") {
						alertify.error('Nama Klien Tidak Boleh Kosong');
						document.getElementById("id_klien").focus();
					} else if(Deskripsi == "") {
						alertify.error('Deskripsi Tidak Boleh Kosong');
						document.getElementById("deskripsi").focus();
					} else if(Divisi == "") {
						alertify.error('Nama Divisi Tidak Boleh Kosong');
						document.getElementById("id_divisi").focus();
					} else if(Pegawai == "") {
						alertify.error('Nama Pegawai Tidak Boleh Kosong');
						document.getElementById("id_pegawai").focus();
					} else if(JenisKeluhan == "") {
						alertify.error('Jenis Keluhan Tidak Boleh Kosong');
						document.getElementById("jenis_keluhan").focus();
					} else if(Tingkat == "") {
						alertify.error('Tingkat Masalah Tidak Boleh Kosong');
						document.getElementById("id_tm").focus();
					} else {
						alertify.confirm("Apakah Data Ingin Ditambah?", function(){
							$.ajax({
								url : "<?php echo site_url('TransMasalah/Simpan')?>",
								type: "POST",
								data: $('#add-masalah').serialize(),
								dataType: "JSON",
								success: function(data)
								{
									alertify.success('Masalah/Keluhan Berhasil Disimpan');
									$('#masalah-add').modal('hide');
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alertify.error('Masalah/Keluhan Gagal Disimpan');
								}
							});
						}, function(){
							$('#masalah-add').modal('hide');
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