<script>
$(document).ready(function(){
	$("#CariKlien").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#data-klien tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
	
	$('button.btn-hapus').on('click',function(){
		var id = $(this).attr('data-id');
		id : id
		alertify.confirm("Apakah Data Ingin Dihapus?", function(){
			$.ajax({
				url : "<?php echo site_url('MasterKlien/Hapus')?>/" + id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					alertify.success('Data Klien Berhasil Dihapus');
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alertify.error('Data Klien Gagal Dihapus');
				}
			});
		}, function(){
			$('#klien-edit').modal('hide');
		});
	});
	
	$('button.btn-edit').on('click',function(){
		var id = $(this).attr('data-id');
		
		$("#DivModal").load("<?php echo site_url('MasterKlien/EditKlien')?>",{
			id : id
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#klien-edit').modal({backdrop: 'static', keyboard: false});
				$('#klien-edit').modal('show');
				$('#klien-edit').on('hidden.bs.modal', function () {
					$('#DivModal').html('');
				});
				
				$.ajax({
					url : "<?php echo site_url('MasterKlien/AmbilById/')?>/" + id,
					type: "GET",
					dataType: "JSON",
					success: function(data)
					{
						$('[name="id_klien"]').val(data.IDKlien);
						$('[name="nama_klien"]').val(data.NamaKlien);
						$('[name="alamat_klien"]').val(data.Alamat);
						$('[name="no_telp"]').val(data.NoTelp);
						$('[name="id_proyek"]').val(data.IDProyek);
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error get data from ajax');
					}
				});
				
				$('#btn_ubah').on('click',function(){
					
					var NamaKlien	= document.getElementById("nama_klien").value;
					var Alamat		= document.getElementById("alamat_klien").value;
					var NoTelp		= document.getElementById("no_telp").value;
					
					if(NamaKlien == "") {
						alertify.error('Nama Klien Tidak Boleh Kosong');
						document.getElementById("nama_klien").focus();
					} else if(Alamat == "") {
						alertify.error('Alamat Tidak Boleh Kosong');
						document.getElementById("alamat_klien").focus();
					} else if(NoTelp == "") {
						alertify.error('No Telp Tidak Boleh Kosong');
						document.getElementById("no_telp").focus();
					} else {
						alertify.confirm("Apakah Data Ingin Diubah?", function(){
							$.ajax({
								url : "<?php echo site_url('MasterKlien/Ubah')?>",
								type: "POST",
								data: $('#edit_klien').serialize(),
								dataType: "JSON",
								success: function(data)
								{
									alertify.success('Data Klien Berhasil Diubah');
									$('#klien-edit').modal('hide');
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alertify.error('Data Klien Gagal Diubah');
								}
							});
						}, function(){
							$('#klien-edit').modal('hide');
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
	
	$('button#btn_tambah').on('click',function(){
		$("#DivModal").load("<?php echo site_url('MasterKlien/TambahKlien')?>",{
			
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#klien-add').modal({backdrop: 'static', keyboard: false});
				$('#klien-add').modal('show');
				$('#klien-add').on('hidden.bs.modal', function () {
					$('#DivModal').html('');
				});
				
				$('#btn_save').on('click',function(){
					var NamaKlien	= document.getElementById("nama_klien").value;
					var Alamat		= document.getElementById("alamat_klien").value;
					var NoTelp		= document.getElementById("no_telp").value;
					
					if(NamaKlien == "") {
						alertify.error('Nama Klien Tidak Boleh Kosong');
						document.getElementById("nama_klien").focus();
					} else if(Alamat == "") {
						alertify.error('Alamat Tidak Boleh Kosong');
						document.getElementById("alamat_klien").focus();
					} else if(NoTelp == "") {
						alertify.error('No Telp Tidak Boleh Kosong');
						document.getElementById("no_telp").focus();
					} else {
						alertify.confirm("Apakah Data Ingin Ditambah?", function(){
							$.ajax({
								url : "<?php echo site_url('MasterKlien/Simpan')?>",
								type: "POST",
								data: $('#add-klien').serialize(),
								dataType: "JSON",
								success: function(data)
								{
									alertify.success('Data Klien Berhasil Disimpan');
									$('#klien-add').modal('hide');
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alertify.error('Data Klien Gagal Disimpan');
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