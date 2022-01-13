<!DOCTYPE html>
<html>
	<head>
		<title>Laporan Rekapitulasi Masalah/Keluhan</title>
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
			<h1>Laporan Rekapitulasi Masalah/Keluhan</h1>
			<h3>Interval : <?php echo $_REQUEST['start']." s/d ".$_REQUEST['end']; ?></h3>
			<h3>Tanggal Cetak : <?php echo date('d F Y'); ?></h3>
		</div>
		
		<?php 
			
			
			
			foreach($DataProyek as $data => $proyek) :
			
				/* Operasioanl */
				$sumOPERASIONAL_STANDAR_ESKALASI = 0;
				$sumOPERASIONAL_STANDAR_PROGRESS = 0;
				$sumOPERASIONAL_STANDAR_SELESAI = 0;
				
				$sumOPERASIONAL_SEDANG_ESKALASI = 0;
				$sumOPERASIONAL_SEDANG_PROGRESS = 0;
				$sumOPERASIONAL_SEDANG_SELESAI = 0;
				
				$sumOPERASIONAL_TINGGI_ESKALASI = 0;
				$sumOPERASIONAL_TINGGI_PROGRESS = 0;
				$sumOPERASIONAL_TINGGI_SELESAI = 0;
				
				/* Sistem */
				$sumSISTEM_STANDAR_ESKALASI = 0;
				$sumSISTEM_STANDAR_PROGRESS = 0;
				$sumSISTEM_STANDAR_SELESAI = 0;
				
				$sumSISTEM_SEDANG_ESKALASI = 0;
				$sumSISTEM_SEDANG_PROGRESS = 0;
				$sumSISTEM_SEDANG_SELESAI = 0;
				
				$sumSISTEM_TINGGI_ESKALASI = 0;
				$sumSISTEM_TINGGI_PROGRESS = 0;
				$sumSISTEM_TINGGI_SELESAI = 0;
				
				/* Umum */
				$sumUMUM_STANDAR_ESKALASI = 0;
				$sumUMUM_STANDAR_PROGRESS = 0;
				$sumUMUM_STANDAR_SELESAI = 0;
				
				$sumUMUM_SEDANG_ESKALASI = 0;
				$sumUMUM_SEDANG_PROGRESS = 0;
				$sumUMUM_SEDANG_SELESAI = 0;
				
				$sumUMUM_TINGGI_ESKALASI = 0;
				$sumUMUM_TINGGI_PROGRESS = 0;
				$sumUMUM_TINGGI_SELESAI = 0;
			
		?>
		<p>Nama Proyek: <?php echo $proyek['NamaProyek']; ?></p>
		<table>
			<thead align="center">
				<tr>
					<td rowspan = 3>Tanggal</td>
					<td colspan = 9>IT Operasional</td>
					<td colspan = 9>Sistem Bermasalah</td>
					<td colspan = 9>Umum</td>
				</tr>
				<tr>
					<td colspan = 3>Standar</td>
					<td colspan = 3>Sedang</td>
					<td colspan = 3>Tinggi</td>
					<td colspan = 3>Standar</td>
					<td colspan = 3>Sedang</td>
					<td colspan = 3>Tinggi</td>
					<td colspan = 3>Standar</td>
					<td colspan = 3>Sedang</td>
					<td colspan = 3>Tinggi</td>
				</tr>
				<tr>
					<td>Eskalasi</td>
					<td>Sedang Dikerjakan</td>
					<td>Selesai</td>
					<td>Eskalasi</td>
					<td>Sedang Dikerjakan</td>
					<td>Selesai</td>
					<td>Eskalasi</td>
					<td>Sedang Dikerjakan</td>
					<td>Selesai</td>
					<td>Eskalasi</td>
					<td>Sedang Dikerjakan</td>
					<td>Selesai</td>
					<td>Eskalasi</td>
					<td>Sedang Dikerjakan</td>
					<td>Selesai</td>
					<td>Eskalasi</td>
					<td>Sedang Dikerjakan</td>
					<td>Selesai</td>
					<td>Eskalasi</td>
					<td>Sedang Dikerjakan</td>
					<td>Selesai</td>
					<td>Eskalasi</td>
					<td>Sedang Dikerjakan</td>
					<td>Selesai</td>
					<td>Eskalasi</td>
					<td>Sedang Dikerjakan</td>
					<td>Selesai</td>
				</tr>
			</thead>
			<tbody>
				<?php
					// echo "<pre>";
					// print_r($DataRekap['PR1801001']['2018-01-03']['OPERASIONAL_STANDAR_ESKALASI']);
					// echo "</pre>";
					
					$date = $_REQUEST['start'];
					$end_date = $_REQUEST['end'];

					// while (strtotime($date) <= strtotime($end_date)) {
					foreach($DataRekap[$data] as $baris => $rows) {
						
						/* Operasioanl */
						$OPERASIONAL_STANDAR_ESKALASI = ($rows['OPERASIONAL_STANDAR_ESKALASI']?$rows['OPERASIONAL_STANDAR_ESKALASI']:0);
						$OPERASIONAL_STANDAR_PROGRESS = ($rows['OPERASIONAL_STANDAR_PROGRESS']?$rows['OPERASIONAL_STANDAR_PROGRESS']:0);
						$OPERASIONAL_STANDAR_SELESAI = ($rows['OPERASIONAL_STANDAR_SELESAI']?$rows['OPERASIONAL_STANDAR_SELESAI']:0);
						
						$OPERASIONAL_SEDANG_ESKALASI = ($rows['OPERASIONAL_SEDANG_ESKALASI']?$rows['OPERASIONAL_SEDANG_ESKALASI']:0);
						$OPERASIONAL_SEDANG_PROGRESS = ($rows['OPERASIONAL_SEDANG_PROGRESS']?$rows['OPERASIONAL_SEDANG_PROGRESS']:0);
						$OPERASIONAL_SEDANG_SELESAI = ($rows['OPERASIONAL_SEDANG_SELESAI']?$rows['OPERASIONAL_SEDANG_SELESAI']:0);
						
						$OPERASIONAL_TINGGI_ESKALASI = ($rows['OPERASIONAL_TINGGI_ESKALASI']?$rows['OPERASIONAL_TINGGI_ESKALASI']:0);
						$OPERASIONAL_TINGGI_PROGRESS = ($rows['OPERASIONAL_TINGGI_PROGRESS']?$rows['OPERASIONAL_TINGGI_PROGRESS']:0);
						$OPERASIONAL_TINGGI_SELESAI = ($rows['OPERASIONAL_TINGGI_SELESAI']?$rows['OPERASIONAL_TINGGI_SELESAI']:0);
						
						/* Sistem */
						$SISTEM_STANDAR_ESKALASI = ($rows['SISTEM_STANDAR_ESKALASI']?$rows['SISTEM_STANDAR_ESKALASI']:0);
						$SISTEM_STANDAR_PROGRESS = ($rows['SISTEM_STANDAR_PROGRESS']?$rows['SISTEM_STANDAR_PROGRESS']:0);
						$SISTEM_STANDAR_SELESAI = ($rows['SISTEM_STANDAR_SELESAI']?$rows['SISTEM_STANDAR_SELESAI']:0);
						
						$SISTEM_SEDANG_ESKALASI = ($rows['SISTEM_SEDANG_ESKALASI']?$rows['SISTEM_SEDANG_ESKALASI']:0);
						$SISTEM_SEDANG_PROGRESS = ($rows['SISTEM_SEDANG_PROGRESS']?$rows['SISTEM_SEDANG_PROGRESS']:0);
						$SISTEM_SEDANG_SELESAI = ($rows['SISTEM_SEDANG_SELESAI']?$rows['SISTEM_SEDANG_SELESAI']:0);
						
						$SISTEM_TINGGI_ESKALASI = ($rows['SISTEM_TINGGI_ESKALASI']?$rows['SISTEM_TINGGI_ESKALASI']:0);
						$SISTEM_TINGGI_PROGRESS = ($rows['SISTEM_TINGGI_PROGRESS']?$rows['SISTEM_TINGGI_PROGRESS']:0);
						$SISTEM_TINGGI_SELESAI = ($rows['SISTEM_TINGGI_SELESAI']?$rows['SISTEM_TINGGI_SELESAI']:0);
						
						/* Umum */
						$UMUM_STANDAR_ESKALASI = ($rows['UMUM_STANDAR_ESKALASI']?$rows['UMUM_STANDAR_ESKALASI']:0);
						$UMUM_STANDAR_PROGRESS = ($rows['UMUM_STANDAR_PROGRESS']?$rows['UMUM_STANDAR_PROGRESS']:0);
						$UMUM_STANDAR_SELESAI = ($rows['UMUM_STANDAR_SELESAI']?$rows['UMUM_STANDAR_SELESAI']:0);
						
						$UMUM_SEDANG_ESKALASI = ($rows['UMUM_SEDANG_ESKALASI']?$rows['UMUM_SEDANG_ESKALASI']:0);
						$UMUM_SEDANG_PROGRESS = ($rows['UMUM_SEDANG_PROGRESS']?$rows['UMUM_SEDANG_PROGRESS']:0);
						$UMUM_SEDANG_SELESAI = ($rows['UMUM_SEDANG_SELESAI']?$rows['UMUM_SEDANG_SELESAI']:0);
						
						$UMUM_TINGGI_ESKALASI = ($rows['UMUM_TINGGI_ESKALASI']?$rows['UMUM_TINGGI_ESKALASI']:0);
						$UMUM_TINGGI_PROGRESS = ($rows['UMUM_TINGGI_PROGRESS']?$rows['UMUM_TINGGI_PROGRESS']:0);
						$UMUM_TINGGI_SELESAI = ($rows['UMUM_TINGGI_SELESAI']?$rows['UMUM_TINGGI_SELESAI']:0);
						
				?>
				<tr>
					<td><?php echo $rows['TGL']; ?></td>
					<td align="center"><?php echo $OPERASIONAL_STANDAR_ESKALASI; ?></td>
					<td align="center"><?php echo $OPERASIONAL_STANDAR_PROGRESS; ?></td>
					<td align="center"><?php echo $OPERASIONAL_STANDAR_SELESAI; ?></td>
					
					<td align="center"><?php echo $OPERASIONAL_SEDANG_ESKALASI; ?></td>
					<td align="center"><?php echo $OPERASIONAL_SEDANG_PROGRESS; ?></td>
					<td align="center"><?php echo $OPERASIONAL_SEDANG_SELESAI; ?></td>
					
					<td align="center"><?php echo $OPERASIONAL_TINGGI_ESKALASI; ?></td>
					<td align="center"><?php echo $OPERASIONAL_TINGGI_PROGRESS; ?></td>
					<td align="center"><?php echo $OPERASIONAL_TINGGI_SELESAI; ?></td>
					
					<td align="center"><?php echo $SISTEM_STANDAR_ESKALASI; ?></td>
					<td align="center"><?php echo $SISTEM_STANDAR_PROGRESS; ?></td>
					<td align="center"><?php echo $SISTEM_STANDAR_SELESAI; ?></td>
					
					<td align="center"><?php echo $SISTEM_SEDANG_ESKALASI; ?></td>
					<td align="center"><?php echo $SISTEM_SEDANG_PROGRESS; ?></td>
					<td align="center"><?php echo $SISTEM_SEDANG_SELESAI; ?></td>
					
					<td align="center"><?php echo $SISTEM_TINGGI_ESKALASI; ?></td>
					<td align="center"><?php echo $SISTEM_TINGGI_PROGRESS; ?></td>
					<td align="center"><?php echo $SISTEM_TINGGI_SELESAI; ?></td>
					
					<td align="center"><?php echo $UMUM_STANDAR_ESKALASI; ?></td>
					<td align="center"><?php echo $UMUM_STANDAR_PROGRESS; ?></td>
					<td align="center"><?php echo $UMUM_STANDAR_SELESAI; ?></td>
					
					<td align="center"><?php echo $UMUM_SEDANG_ESKALASI; ?></td>
					<td align="center"><?php echo $UMUM_SEDANG_PROGRESS; ?></td>
					<td align="center"><?php echo $UMUM_SEDANG_SELESAI; ?></td>
					
					<td align="center"><?php echo $UMUM_TINGGI_ESKALASI; ?></td>
					<td align="center"><?php echo $UMUM_TINGGI_PROGRESS; ?></td>
					<td align="center"><?php echo $UMUM_TINGGI_SELESAI; ?></td>
				</tr>
				<?php
						/* Operasioanl */
						$sumOPERASIONAL_STANDAR_ESKALASI += $OPERASIONAL_STANDAR_ESKALASI;
						$sumOPERASIONAL_STANDAR_PROGRESS += $OPERASIONAL_STANDAR_PROGRESS;
						$sumOPERASIONAL_STANDAR_SELESAI += $OPERASIONAL_STANDAR_SELESAI;
						
						$sumOPERASIONAL_SEDANG_ESKALASI += $OPERASIONAL_SEDANG_ESKALASI;
						$sumOPERASIONAL_SEDANG_PROGRESS += $OPERASIONAL_SEDANG_PROGRESS;
						$sumOPERASIONAL_SEDANG_SELESAI += $OPERASIONAL_SEDANG_SELESAI;
						
						$sumOPERASIONAL_TINGGI_ESKALASI += $OPERASIONAL_TINGGI_ESKALASI;
						$sumOPERASIONAL_TINGGI_PROGRESS += $OPERASIONAL_TINGGI_PROGRESS;
						$sumOPERASIONAL_TINGGI_SELESAI += $OPERASIONAL_TINGGI_SELESAI;
						
						/* Sistem */
						$sumSISTEM_STANDAR_ESKALASI += $SISTEM_STANDAR_ESKALASI;
						$sumSISTEM_STANDAR_PROGRESS += $SISTEM_STANDAR_PROGRESS;
						$sumSISTEM_STANDAR_SELESAI += $SISTEM_STANDAR_SELESAI;
						
						$sumSISTEM_SEDANG_ESKALASI += $SISTEM_SEDANG_ESKALASI;
						$sumSISTEM_SEDANG_PROGRESS += $SISTEM_SEDANG_PROGRESS;
						$sumSISTEM_SEDANG_SELESAI += $SISTEM_SEDANG_SELESAI;
						
						$sumSISTEM_TINGGI_ESKALASI += $SISTEM_TINGGI_ESKALASI;
						$sumSISTEM_TINGGI_PROGRESS += $SISTEM_TINGGI_PROGRESS;
						$sumSISTEM_TINGGI_SELESAI += $SISTEM_TINGGI_SELESAI;
						
						/* Umum */
						$sumUMUM_STANDAR_ESKALASI += $UMUM_STANDAR_ESKALASI;
						$sumUMUM_STANDAR_PROGRESS += $UMUM_STANDAR_PROGRESS;
						$sumUMUM_STANDAR_SELESAI += $UMUM_STANDAR_SELESAI;
						
						$sumUMUM_SEDANG_ESKALASI += $UMUM_SEDANG_ESKALASI;
						$sumUMUM_SEDANG_PROGRESS += $UMUM_SEDANG_PROGRESS;
						$sumUMUM_SEDANG_SELESAI += $UMUM_SEDANG_SELESAI;
						
						$sumUMUM_TINGGI_ESKALASI += $UMUM_TINGGI_ESKALASI;
						$sumUMUM_TINGGI_PROGRESS += $UMUM_TINGGI_PROGRESS;
						$sumUMUM_TINGGI_SELESAI += $UMUM_TINGGI_SELESAI;
					}
				?>
			</tbody>
			<tfoot>
				<tr>
					<td align="center">Jumlah<br>(<?php echo $proyek['total']; ?>)</td>
					<td align="center"><?php echo $sumOPERASIONAL_STANDAR_ESKALASI; ?></td>
					<td align="center"><?php echo $sumOPERASIONAL_STANDAR_PROGRESS; ?></td>
					<td align="center"><?php echo $sumOPERASIONAL_STANDAR_SELESAI; ?></td>
					
					<td align="center"><?php echo $sumOPERASIONAL_SEDANG_ESKALASI; ?></td>
					<td align="center"><?php echo $sumOPERASIONAL_SEDANG_PROGRESS; ?></td>
					<td align="center"><?php echo $sumOPERASIONAL_SEDANG_SELESAI; ?></td>
					
					<td align="center"><?php echo $sumOPERASIONAL_TINGGI_ESKALASI; ?></td>
					<td align="center"><?php echo $sumOPERASIONAL_TINGGI_PROGRESS; ?></td>
					<td align="center"><?php echo $sumOPERASIONAL_TINGGI_SELESAI; ?></td>
					
					<td align="center"><?php echo $sumSISTEM_STANDAR_ESKALASI; ?></td>
					<td align="center"><?php echo $sumSISTEM_STANDAR_PROGRESS; ?></td>
					<td align="center"><?php echo $sumSISTEM_STANDAR_SELESAI; ?></td>
					
					<td align="center"><?php echo $sumSISTEM_SEDANG_ESKALASI; ?></td>
					<td align="center"><?php echo $sumSISTEM_SEDANG_PROGRESS; ?></td>
					<td align="center"><?php echo $sumSISTEM_SEDANG_SELESAI; ?></td>
					
					<td align="center"><?php echo $sumSISTEM_TINGGI_ESKALASI; ?></td>
					<td align="center"><?php echo $sumSISTEM_TINGGI_PROGRESS; ?></td>
					<td align="center"><?php echo $sumSISTEM_TINGGI_SELESAI; ?></td>
					
					<td align="center"><?php echo $sumUMUM_STANDAR_ESKALASI; ?></td>
					<td align="center"><?php echo $sumUMUM_STANDAR_PROGRESS; ?></td>
					<td align="center"><?php echo $sumUMUM_STANDAR_SELESAI; ?></td>
					
					<td align="center"><?php echo $sumUMUM_SEDANG_ESKALASI; ?></td>
					<td align="center"><?php echo $sumUMUM_SEDANG_PROGRESS; ?></td>
					<td align="center"><?php echo $sumUMUM_SEDANG_SELESAI; ?></td>
					
					<td align="center"><?php echo $sumUMUM_TINGGI_ESKALASI; ?></td>
					<td align="center"><?php echo $sumUMUM_TINGGI_PROGRESS; ?></td>
					<td align="center"><?php echo $sumUMUM_TINGGI_SELESAI; ?></td>
				</tr>
			</tfoot>
		</table>
		<?php endforeach; ?>
		<div style="position: absolute; left: 0px; width: 300px; padding: 10px; margin-top: 3%; text-align: center;">
			<div>Mengetahui</div>
			<div style="margin-top: 30%;">( Syahbandri )</div>
		</div>
	</body>
</html>