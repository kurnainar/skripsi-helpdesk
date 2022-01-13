<!DOCTYPE html>
<html>
	<head>
		<title>Laporan Solusi Masalah/Keluhan</title>
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
			<h1>Laporan Solusi Masalah/Keluhan</h1>
			<h3>Interval : dari - sampai</h3>
			<h3>Tanggal Cetak : <?php echo date('d F Y'); ?></h3>
		</div>
		
		<p></p>
		<table>
			<thead align="center">
				<tr>
					<td>No.</td>
					<td>ID Masalah/Keluhan</td>
					<td>Tanggal Masalah/Keluhan</td>
					<td>Deskripsi Masalah/Keluhan</td>
					<td>Nama Proyek</td>
					<td>Nama Klien</td>
					<td>Tingkat Masalah</td>
					<td>Tanggal Solusi</td>
					<td>Solusi</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach($DataSolusi as $data => $rows) {
				?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td align="center"><?php echo $rows['IDKeluhan']; ?></td>
					<td align="center"><?php echo $rows['TglKeluhan']; ?></td>
					<td><?php echo $rows['Deskripsi']; ?></td>
					<td><?php echo $rows['NamaProyek']; ?></td>
					<td><?php echo $rows['NamaKlien']; ?></td>
					<td><?php echo $rows['NamaTM']; ?></td>
					<td><?php echo $rows['TglSolusi']; ?></td>
					<td><?php echo $rows['Solusi']; ?></td>
				</tr>
				<?php
						$no++;
					}
				?>
			</tbody>
		</table>
		<div style="position: absolute; left: 0px; width: 300px; padding: 10px; margin-top: 3%; text-align: center;">
			<div>Mengetahui</div>
			<div style="margin-top: 30%;">( Syahbandri )</div>
		</div>
	</body>
</html>