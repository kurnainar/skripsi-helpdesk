<script>
$(document).ready(function(){
	$("#CariTingkat").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#data-tingkat tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
	
	$('button.btn-hapus').on('click',function(){
		var id = $(this).attr('data-id');
		id : id
		alertify.confirm("Apakah Data Ingin Dihapus?", function(){
			$.ajax({
				url : "<?php echo site_url('MasterTingkat/Hapus')?>/" + id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					alertify.success('Data Tingkat Masalah Berhasil Dihapus');
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alertify.error('Data Tingkat Masalah Gagal Dihapus');
				}
			});
		}, function(){
			$('#klien-edit').modal('hide');
		});
	});
	
	$('button.btn-edit').on('click',function(){
		var id = $(this).attr('data-id');
		
		$("#DivModal").load("<?php echo site_url('MasterTingkat/EditTingkat')?>",{
			id : id
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#tingkat-edit').modal({backdrop: 'static', keyboard: false});
				$('#tingkat-edit').modal('show');
				$('#tingkat-edit').on('hidden.bs.modal', function () {
					$('#DivModal').html('');
				});
				
				$.ajax({
					url : "<?php echo site_url('MasterTingkat/AmbilById/')?>/" + id,
					type: "GET",
					dataType: "JSON",
					success: function(data)
					{
						$('[name="id_tm"]').val(data.IDTM);
						$('[name="nama_tm"]').val(data.NamaTM);
						$('[name="waktu"]').val(data.Lama);
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error get data from ajax');
					}
				});
				
				$('#btn_ubah').on('click',function(){
					
					var NamaTM	= document.getElementById("nama_tm").value;
					var Waktu	= document.getElementById("waktu").value;
					
					if(NamaTM == "") {
						alertify.error('Nama Tingkat Masalah Tidak Boleh Kosong');
						document.getElementById("nama_tm").focus();
					} else if(Waktu == "") {
						alertify.error('Lama Pengerjaan Tidak Boleh Kosong');
						document.getElementById("waktu").focus();
					} else {
						alertify.confirm("Apakah Data Ingin Diubah?", function(){
							$.ajax({
								url : "<?php echo site_url('MasterTingkat/Ubah')?>",
								type: "POST",
								data: $('#edit-tingkat').serialize(),
								dataType: "JSON",
								success: function(data)
								{
									alertify.success('Data Tingkat Masalah Berhasil Diubah');
									$('#tingkat-edit').modal('hide');
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alertify.error('Data Tingkat Masalah Gagal Diubah');
								}
							});
						}, function(){
							$('#tingkat-edit').modal('hide');
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
		$("#DivModal").load("<?php echo site_url('MasterTingkat/TambahTingkat')?>",{
			
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#tingkat-add').modal({backdrop: 'static', keyboard: false});
				$('#tingkat-add').modal('show');
				$('#tingkat-add').on('hidden.bs.modal', function () {
					$('#DivModal').html('');
				});
				
				$('#btn_save').on('click',function(){
					var NamaTM	= document.getElementById("nama_tm").value;
					var Waktu	= document.getElementById("waktu").value;
					
					if(NamaTM == "") {
						alertify.error('Nama Tingkat Masalah Tidak Boleh Kosong');
						document.getElementById("nama_tm").focus();
					} else if(Waktu == "") {
						alertify.error('Lama Pengerjaan Tidak Boleh Kosong');
						document.getElementById("waktu").focus();
					} else {
						alertify.confirm("Apakah Data Ingin Ditambah?", function(){
							$.ajax({
								url : "<?php echo site_url('MasterTingkat/Simpan')?>",
								type: "POST",
								data: $('#add-tingkat').serialize(),
								dataType: "JSON",
								success: function(data)
								{
									alertify.success('Data Tingkat Masalah Berhasil Disimpan');
									$('#tingkat-add').modal('hide');
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alertify.error('Data Tingkat Masalah Gagal Disimpan');
								}
							});
						}, function(){
							$('#tingkat-add').modal('hide');
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