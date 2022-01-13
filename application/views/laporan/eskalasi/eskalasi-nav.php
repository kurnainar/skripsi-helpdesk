<div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Laporan</li>
		<li class="breadcrumb-item active">Cetak Laporan Eskalasi</li>
	</ol>
	<!-- Example DataTables Card-->
	<div class="card mb-3">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-2">
					<div class="form-group">
						<label>Dari :</label>
						<input type="date" class="form-control" id="start_date" name="start_date">
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<label>Sampai :</label>
						<input type="date" class="form-control" id="end_date" name="end_date">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-2">
					<button type="button" id="btn_cetak" class="btn" style="cursor:pointer;"><i class="fa fa-print"></i> Cetak</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this -> load -> view('laporan/eskalasi/eskalasi-js'); ?>