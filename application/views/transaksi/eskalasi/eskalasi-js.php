<script>
$(document).ready(function(){
	$("#CariEskalasi").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#data-eskalasi tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
	
	$('button#btn_tambah').on('click',function(){
		$("#DivModal").load("<?php echo site_url('TransEskalasi/TambahEskalasi')?>",{
			
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#eskalasi-add').modal({backdrop: 'static', keyboard: false});
				$('#eskalasi-add').modal('show');
				$('#eskalasi-add').on('hidden.bs.modal', function () {
					$('#DivModal').html('');
				});
				
				$('#btn_save').on('click',function(){
					// $('#eskalasi-add').modal('hide');
					// alertify.success('Success message');
					
					var Keluhan		= document.getElementById("id_keluhan").value;
					var Keterangan	= document.getElementById("keterangan").value;
					var Divisi		= document.getElementById("id_divisi").value;
					var Pegawai		= document.getElementById("id_pegawai").value;
					
					if(Keluhan == "") {
						alertify.error('ID Keluhan Tidak Boleh Kosong');
						document.getElementById("id_keluhan").focus();
					} else if(Keterangan == "") {
						alertify.error('Keterangan Tidak Boleh Kosong');
						document.getElementById("keterangan").focus();
					} else if(Divisi == "") {
						alertify.error('Nama Divisi Tidak Boleh Kosong');
						document.getElementById("id_divisi").focus();
					} else if(Pegawai == "") {
						alertify.error('Nama Pegawai Tidak Boleh Kosong');
						document.getElementById("id_pegawai").focus();
					} else {
						alertify.confirm("Apakah Data Ingin Ditambah?", function(){
							$.ajax({
								url : "<?php echo site_url('TransEskalasi/Simpan')?>",
								type: "POST",
								data: $('#add-eskalasi').serialize(),
								dataType: "JSON",
								success: function(data)
								{
									alertify.success('Pendataan Proyek Berhasil Disimpan');
									$('#eskalasi-add').modal('hide');
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alertify.error('Pendataan Proyek Gagal Disimpan');
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