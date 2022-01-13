<!DOCTYPE html>
<html>
	<head>
		<title>Laporan Masalah/Keluhan Yang Dieskalasi</title>
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assets/img/logo.png">
		<link href="<?php echo base_url();?>assets/css/laporan.css" rel="stylesheet">
		<style>
			.float-div {
				float: left;
				height: 88px;
			}
		</style>
	</head>
	<body onload="window.print()">
		<div class="float-div">
			<img src="<?php echo base_url();?>assets/img/logo.png" height="85">
		</div>
		<div>
			<h1>Laporan Masalah/Keluhan Yang Dieskalasi</h1>
			<h3>Interval : dari - sampai</h3>
			<h3>Tanggal Cetak : <?php echo date('d F Y'); ?></h3>
		</div>
		
		<p></p>
		<table>
			<thead align="center">
				<tr>
					<td>No.</td>
					<td>ID Masalah/Keluhan</td>
					<td>Deskripsi Masalah/Keluhan</td>
					<td>Nama Proyek</td>
					<td>Nama Divisi</td>
					<td>Nama Pegawai</td>
					<td>Tanggal Eskalasi</td>
					<td>Keterangan</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach($DataEskalasi as $data => $rows) :
				?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td align="center"><?php echo $rows['IDKeluhan']; ?></td>
					<td><?php echo $rows['Deskripsi']; ?></td>
					<td><?php echo $rows['NamaProyek']; ?></td>
					<td><?php echo $rows['NamaDivisi']; ?></td>
					<td><?php echo $rows['NamaPegawai']; ?></td>
					<td><?php echo $rows['TglEskalasi']; ?></td>
					<td><?php echo $rows['Keterangan']; ?></td>
				</tr>
				<?php
					$no++;
					endforeach;
				?>
			</tbody>
		</table>
		<div style="position: absolute; left: 0px; width: 300px; padding: 10px; margin-top: 3%; text-align: center;">
			<div>Mengetahui</div>
			<div style="margin-top: 30%;">( Syahbandri )</div>
		</div>
	</body>
</html>