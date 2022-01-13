<script>
$(document).ready(function(){
	$("#CariPegawai").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#data-pegawai tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
	
	$('button.btn-hapus').on('click',function(){
		var id = $(this).attr('data-id');
		id : id
		alertify.confirm("Apakah Data Ingin Dihapus?", function(){
			$.ajax({
				url : "<?php echo site_url('MasterPegawai/Hapus')?>/" + id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					alertify.success('Data Pegawai Berhasil Dihapus');
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alertify.error('Data Pegawai Gagal Dihapus');
				}
			});
		}, function(){
			$('#divisi-edit').modal('hide');
		});
	});
	
	$('button.btn-edit').on('click',function(){
		var id = $(this).attr('data-id');
		
		$("#DivModal").load("<?php echo site_url('MasterPegawai/EditDivisi')?>",{
			id : id
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#pegawai-edit').modal({backdrop: 'static', keyboard: false});
				$('#pegawai-edit').modal('show');
				$('#pegawai-edit').on('hidden.bs.modal', function () {
					$('#DivModal').html('');
				});
				
				$.ajax({
					url : "<?php echo site_url('MasterPegawai/AmbilById/')?>/" + id,
					type: "GET",
					dataType: "JSON",
					success: function(data)
					{
						$('[name="id_pegawai"]').val(data.IDPegawai);
						$('[name="nama_pegawai"]').val(data.NamaPegawai);
						$('[name="tempat_lahir"]').val(data.TempatLahir);
						$('[name="tgl_lahir"]').val(data.TanggalLahir);
						$('[name="no_telp"]').val(data.NoTelp);
						$('[name="id_divisi"]').val(data.IDDivisi);
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error get data from ajax');
					}
				});
				
				$('#btn_ubah').on('click',function(){
					
					var NamaPegawai		= document.getElementById("nama_pegawai").value;
					var TempatLahir		= document.getElementById("tempat_lahir").value;
					var TanggalLahir	= document.getElementById("tgl_lahir").value;
					var NoTelp			= document.getElementById("no_telp").value;
					var NamaDivisi		= document.getElementById("id_divisi").value;
					
					if(NamaPegawai == "") {
						alertify.error('Nama Pegawai Tidak Boleh Kosong');
						document.getElementById("nama_pegawai").focus();
					} else if(TempatLahir == "") {
						alertify.error('Tempat Lahir Tidak Boleh Kosong');
						document.getElementById("tempat_lahir").focus();
					} else if(TanggalLahir == "") {
						alertify.error('Tanggal Lahir Tidak Boleh Kosong');
						document.getElementById("tgl_lahir").focus();
					} else if(NoTelp == "") {
						alertify.error('No Telp Tidak Boleh Kosong');
						document.getElementById("no_telp").focus();
					} else if(NamaDivisi == "") {
						alertify.error('Divisi Tidak Boleh Kosong');
						document.getElementById("id_divisi").focus();
					} else {
						alertify.confirm("Apakah Data Ingin Diubah?", function(){
							$.ajax({
								url : "<?php echo site_url('MasterPegawai/Ubah')?>",
								type: "POST",
								data: $('#edit_pegawai').serialize(),
								dataType: "JSON",
								success: function(data)
								{
									alertify.success('Data Pegawai Berhasil Diubah');
									$('#pegawai-edit').modal('hide');
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alertify.error('Data Pegawai Gagal Diubah');
								}
							});
						}, function(){
							$('#pegawai-edit').modal('hide');
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
		$("#DivModal").load("<?php echo site_url('MasterPegawai/TambahPegawai')?>",{
			
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#pegawai-add').modal({backdrop: 'static', keyboard: false});
				$('#pegawai-add').modal('show');
				$('#pegawai-add').on('hidden.bs.modal', function () {
					$('#DivModal').html('');
				});
				
				$('#btn_save').on('click',function(){
					var NamaPegawai		= document.getElementById("nama_pegawai").value;
					var TempatLahir		= document.getElementById("tempat_lahir").value;
					var TanggalLahir	= document.getElementById("tgl_lahir").value;
					var NoTelp			= document.getElementById("no_telp").value;
					var NamaDivisi		= document.getElementById("id_divisi").value;
					
					if(NamaPegawai == "") {
						alertify.error('Nama Pegawai Tidak Boleh Kosong');
						document.getElementById("nama_pegawai").focus();
					} else if(TempatLahir == "") {
						alertify.error('Tempat Lahir Tidak Boleh Kosong');
						document.getElementById("tempat_lahir").focus();
					} else if(TanggalLahir == "") {
						alertify.error('Tanggal Lahir Tidak Boleh Kosong');
						document.getElementById("tgl_lahir").focus();
					} else if(NoTelp == "") {
						alertify.error('No Telp Tidak Boleh Kosong');
						document.getElementById("no_telp").focus();
					} else if(NamaDivisi == "") {
						alertify.error('Divisi Tidak Boleh Kosong');
						document.getElementById("id_divisi").focus();
					} else {
						alertify.confirm("Apakah Data Ingin Ditambah?", function(){
							$.ajax({
								url : "<?php echo site_url('MasterPegawai/Simpan')?>",
								type: "POST",
								data: $('#add_pegawai').serialize(),
								dataType: "JSON",
								success: function(data)
								{
									alertify.success('Data Pegawai Berhasil Disimpan');
									$('#pegawai-add').modal('hide');
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alertify.error('Data Pegawai Gagal Disimpan');
								}
							});
						}, function(){
							$('#pegawai-add').modal('hide');
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