<script>
$(document).ready(function(){
	$("#CariDivisi").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#data-divisi tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
	
	$('button.btn-hapus').on('click',function(){
		var id = $(this).attr('data-id');
		id : id
		alertify.confirm("Apakah Data Ingin Dihapus?", function(){
			$.ajax({
				url : "<?php echo site_url('MasterDivisi/Hapus')?>/" + id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					alertify.success('Data Divisi Berhasil Dihapus');
					$('#divisi-edit').modal('hide');
					window.setTimeout(function(){location.reload()},1000)
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alertify.error('Data Divisi Gagal Dihapus');
				}
			});
		}, function(){
			$('#divisi-edit').modal('hide');
		});
	});
	
	$('button.btn-edit').on('click',function(){
		var id = $(this).attr('data-id');
		
		$("#DivModal").load("<?php echo site_url('MasterDivisi/EditDivisi')?>",{
			id : id
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#divisi-edit').modal({backdrop: 'static', keyboard: false});
				$('#divisi-edit').modal('show');
				$('#divisi-edit').on('hidden.bs.modal', function () {
					$('#DivModal').html('');
				});
				
				$.ajax({
					url : "<?php echo site_url('MasterDivisi/AmbilById/')?>/" + id,
					type: "GET",
					dataType: "JSON",
					success: function(data)
					{
						$('[name="id_divisi"]').val(data.IDDivisi);
						$('[name="nama_divisi"]').val(data.NamaDivisi);
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error get data from ajax');
					}
				});
				
				$('#btn_ubah').on('click',function(){
					
					var NamaDivisi	= document.getElementById("nama_divisi").value;
					
					if(NamaDivisi == "") {
						alertify.error('Nama Divisi Tidak Boleh Kosong');
						document.getElementById("nama_divisi").focus();
					} 
					else {
						alertify.confirm("Apakah Data Ingin Diubah?", function(){
							$.ajax({
								url : "<?php echo site_url('MasterDivisi/Ubah')?>",
								type: "POST",
								data: $('#edit_divisi').serialize(),
								dataType: "JSON",
								success: function(data)
								{
									alertify.success('Data Divisi Berhasil Diubah');
									$('#divisi-edit').modal('hide');
									window.setTimeout(function(){location.reload()},1000)
									
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alertify.error('Data Divisi Gagal Diubah');
								}
							});
						}, function(){
							$('#divisi-edit').modal('hide');
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
		$("#DivModal").load("<?php echo site_url('MasterDivisi/TambahDivisi')?>",{
			
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#divisi-add').modal({backdrop: 'static', keyboard: false});
				$('#divisi-add').modal('show');
				$('#divisi-add').on('hidden.bs.modal', function () {
					$('#DivModal').html('');
				});
				
				$('#btn_save').on('click',function(){
					var NamaDivisi	= document.getElementById("nama_divisi").value;
					
					if(NamaDivisi == "") {
						alertify.error('Nama Divisi Tidak Boleh Kosong');
						document.getElementById("nama_divisi").focus();
					} 
					else {
						alertify.confirm("Apakah Data Ingin Ditambah?", function(){
							$.ajax({
								url : "<?php echo site_url('MasterDivisi/Simpan')?>",
								type: "POST",
								data: $('#add_divisi').serialize(),
								dataType: "JSON",
								success: function(data)
								{
									alertify.success('Data Divisi Berhasil Disimpan');
									$('#divisi-add').modal('hide');
									window.setTimeout(function(){location.reload()},1000)
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alertify.error('Data Divisi Gagal Disimpan');
								}
							});
						}, function(){
							$('#divisi-add').modal('hide');
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