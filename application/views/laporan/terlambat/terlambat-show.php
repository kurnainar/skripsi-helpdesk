<!DOCTYPE html>
<html>
	<head>
		<title>Laporan Masalah/Keluhan Terlambat Direspon</title>
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
			<h1>Laporan Masalah/Keluhan Terlambat Direspon</h1>
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
					<td>Tanggal Masalah/Keluhan</td>
					<td>Tingkat Masalah</td>
					<td>Tanggal Selesai</td>
					<td>Lama Terlambat</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach($DataTerlambat as $data => $rows) {
				?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td align="center"><?php echo $rows['IDKeluhan']; ?></td>
					<td><?php echo $rows['Deskripsi']; ?></td>
					<td align="center"><?php echo $rows['TglKeluhan']; ?></td>
					<td><?php echo $rows['NamaTM']; ?></td>
					<td align="center"><?php echo $rows['TglSolusi']; ?></td>
					<td align="right"><?php echo $rows['Hasil']; ?> Hari</td>
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