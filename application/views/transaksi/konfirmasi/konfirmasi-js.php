<script>
$(document).ready(function(){
	$("#CariKonfirmasi").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#data-konfirmasi tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
	
	$('button#btn_tambah').on('click',function(){
		$("#DivModal").load("<?php echo site_url('TransKonfirmasi/TambahKonfirmasi')?>",{
			
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#konfirmasi-add').modal({backdrop: 'static', keyboard: false});
				$('#konfirmasi-add').modal('show');
				$('#konfirmasi-add').on('hidden.bs.modal', function () {
					$('#DivModal').html('');
				});
				
				$('#btn_save').on('click',function(){
					var IDKeluhan	= document.getElementById("id_keluhan").value;
					var Deskripsi	= document.getElementById("deskripsi").value;
					var konfirmasi	= document.getElementById("konfirmasi").checked;
					
					if(IDKeluhan == "") {
						alertify.error('ID Masalah/Keluhan Tidak Boleh Kosong');
						document.getElementById("id_keluhan").focus();
					} else if(Deskripsi == "") {
						alertify.error('Deskripsi Tidak Boleh Kosong');
						document.getElementById("deskripsi").focus();
					} else if(konfirmasi == false) {
						alertify.error('Konfirmasi Tidak Boleh Kosong');
						document.getElementById("konfirmasi").focus();
					} else {
						alertify.confirm("Apakah Data Ingin Ditambah?", function(){
							$.ajax({
								url : "<?php echo site_url('TransKonfirmasi/Simpan')?>",
								type: "POST",
								data: $('#add-konfirmasi').serialize(),
								dataType: "JSON",
								success: function(data)
								{
									alertify.success('Konfirmasi Pekerjaan Berhasil Disimpan');
									$('#konfirmasi-add').modal('hide');
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alertify.error('Konfirmasi Pekerjaan Gagal Disimpan');
								}
							});
						}, function(){
							$('#konfirmasi-add').modal('hide');
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