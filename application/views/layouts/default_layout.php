<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Aseanindo Helpdesk System</title>
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>/assets/img/logo.png">
	
	<!-- Bootstrap core CSS-->
	<link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Custom styles for this template-->
	<link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
	
	<!-- TAMBAHAN -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/alertify/css/alertify.css">
	
	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url();?>assets/js/sb-admin.min.js"></script>
	<!-- TAMBAHAN -->
	<script src="<?php echo base_url();?>assets/vendor/alertify/alertify.min.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
		<a class="navbar-brand" href="<?php echo site_url('Home')?>"><img src="<?php echo base_url();?>assets/img/aseanindo.png" height="30"></a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
					<a class="nav-link" href="<?php echo site_url('Home')?>">
						<i class="fa fa-fw fa-home"></i>
						<span class="nav-link-text">Home</span>
					</a>
				</li>
				<!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
					<a class="nav-link" href="index.html">
						<i class="fa fa-fw fa-dashboard"></i>
						<span class="nav-link-text">Dashboard</span>
					</a>
				</li> -->
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#MasterData" data-parent="#exampleAccordion">
						<i class="fa fa-fw fa-folder-open"></i>
						<span class="nav-link-text">Master</span>
					</a>
					<ul class="sidenav-second-level collapse" id="MasterData">
						<li>
							<a href="<?php echo site_url('MasterDivisi')?>">Entry Data Divisi</a>
						</li>
						<li>
							<a href="<?php echo site_url('MasterPegawai')?>">Entry Data Pegawai</a>
						</li>
						<li>
							<a href="<?php echo site_url('MasterKlien')?>">Entry Data Klien</a>
						</li>
						<li>
							<a href="<?php echo site_url('MasterTingkat')?>">Entry Data Tingkat Masalah</a>
						</li>
					</ul>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Transaksi" data-parent="#exampleAccordion">
						<i class="fa fa-fw fa-cogs"></i>
						<span class="nav-link-text">Transaksi</span>
					</a>
					<ul class="sidenav-second-level collapse" id="Transaksi">
						<li>
							<a href="<?php echo site_url('TransPendataan')?>">Entry Pendataan Proyek</a>
						</li>
						<li>
							<a href="<?php echo site_url('TransMasalah')?>">Entry Masalah/Keluhan</a>
						</li>
						<li>
							<a href="<?php echo site_url('TransEskalasi')?>">Entry Eskalasi</a>
						</li>
						<li>
							<a href="<?php echo site_url('TransSolusi')?>">Entry Solusi</a>
						</li>
						<li>
							<a href="<?php echo site_url('TransKonfirmasi')?>">Konfirmasi Pekerjaan</a>
						</li>
					</ul>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Laporan" data-parent="#exampleAccordion">
						<i class="fa fa-fw fa-print"></i>
						<span class="nav-link-text">Laporan</span>
					</a>
					<ul class="sidenav-second-level collapse" id="Laporan">
						<li>
							<a href="<?php echo site_url('LapRekapitulasi')?>">Cetak Laporan Rekapitulasi Masalah/Keluhan</a>
						</li>
						<li>
							<a href="<?php echo site_url('LapMasalah')?>">Cetak Laporan Masalah/Keluhan Yang Diterima</a>
						</li>
						<li>
							<a href="<?php echo site_url('LapEskalasi')?>">Cetak Laporan Masalah/Keluhan Yang Dieskalasi</a>
						</li>
						<li>
							<a href="<?php echo site_url('LapSolusi')?>">Cetak Laporan Solusi Masalah/Keluhan</a>
						</li>
						<li>
							<a href="<?php echo site_url('LapTerlambat')?>">Cetak Laporan Masalah/Keluhan Terlambat Direspon</a>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" data-toggle="modal" data-target="#exampleModal">
					<i class="fa fa-fw fa-calendar"></i><?php echo date("l, d F Y"); ?></a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="content-wrapper">
		<?php echo $contents;?>
		<!-- /.container-fluid-->
		<!-- /.content-wrapper-->
		<footer class="sticky-footer">
		<div class="container">
			<div class="text-center">
				<small>Kurnain A. Ramadhan @ <?php echo date("Y"); ?></small>
			</div>
		</div>
		</footer>
		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
		</a>
	</div>
</body>
</html>