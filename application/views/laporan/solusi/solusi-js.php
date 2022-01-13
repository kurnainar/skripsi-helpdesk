<script>
$(document).ready(function(){
	$('#btn_cetak').on('click',function(){
		var start	= document.getElementById("start_date").value;
		var end		= document.getElementById("end_date").value;
		
		if(start == "") {
			alertify.error('Interval Dari Tidak Boleh Kosong');
			document.getElementById("start_date").focus();
		} else if(end == "") {
			alertify.error('Interval Sampai Tidak Boleh Kosong');
			document.getElementById("end_date").focus();
		} else {
			$.ajax({
				// url : "<?php echo site_url('LapRekapitulasi/Tampil')?>",
				type: "GET",
				param: 	{
							start : document.getElementById("start_date").value,
							end : document.getElementById("end_date").value
						},
				success: function(){
					window.open('<?php echo site_url('LapSolusi/Tampil')?>/param?start='+start+'&end='+end);
				},
			});	
		}
	});
});
</script>