<script>
$(document).ready(function(){
	$("#CariSolusi").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#data-solusi tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
	
	$('button#btn_tambah').on('click',function(){
		$("#DivModal").load("<?php echo site_url('TransSolusi/TambahSolusi')?>",{
			
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#solusi-add').modal({backdrop: 'static', keyboard: false});
				$('#solusi-add').modal('show');
				$('#solusi-add').on('hidden.bs.modal', function () {
					$('#DivModal').html('');
				});
				
				$('#btn_save').on('click',function(){
					// $('#solusi-add').modal('hide');
					// alertify.success('Success message');
					
					var Keluhan		= document.getElementById("id_keluhan").value;
					var Deskripsi	= document.getElementById("deskripsi").value;
					var Solusi		= document.getElementById("solusi").value;
					var TglSolusi	= document.getElementById("tgl_solusi").value;
					
					if(Keluhan == "") {
						alertify.error('ID Masalah/Keluhan Tidak Boleh Kosong');
						document.getElementById("id_keluhan").focus();
					} else if(Deskripsi == "") {
						alertify.error('Deskripsi Tidak Boleh Kosong');
						document.getElementById("deskripsi").focus();
					} else if(Solusi == "") {
						alertify.error('Solusi Tidak Boleh Kosong');
						document.getElementById("solusi").focus();
					} else if(TglSolusi == "") {
						alertify.error('Tgl Solusi Tidak Boleh Kosong');
						document.getElementById("tgl_solusi").focus();
					} else {
						alertify.confirm("Apakah Data Ingin Ditambah?", function(){
							$.ajax({
								url : "<?php echo site_url('TransSolusi/Simpan')?>",
								type: "POST",
								data: $('#add-solusi').serialize(),
								dataType: "JSON",
								success: function(data)
								{
									alertify.success('Solusi Berhasil Disimpan');
									$('#solusi-add').modal('hide');
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alertify.error('Solusi Gagal Disimpan');
								}
							});
						}, function(){
							$('#solusi-add').modal('hide');
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