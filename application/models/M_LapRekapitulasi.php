<?php

	Class M_LapRekapitulasi Extends CI_Model
	{
		Public Function DataProyek()
		{
			$user = array();
			$sql = "SELECT
						c.IDProyek, c.NamaProyek, count(a.IDKeluhan) total
					FROM keluhan a
						INNER JOIN klien b ON a.IDKlien = b.IDKlien
						INNER JOIN proyek c ON b.IDProyek = c.IDProyek
					WHERE DATE(a.TglKeluhan) BETWEEN '".$_REQUEST['start']."' AND '".$_REQUEST['end']."'
					GROUP BY c.IDProyek
					ORDER BY total DESC";
			
			$qry = $this->db->query($sql);
			
			if($qry->num_rows() > 0)
			{
				foreach($qry->result_array() as $rows)
				{
					$user[$rows['IDProyek']] = $rows;
				}
			}
			
			return $user;
		}
		
		Public Function DataRekap()
		{
			$user = array();
			$sql = "SELECT
						c.IDProyek, date(a.TglKeluhan) AS TGL,
						
						/* IT Operasional */
						SUM(IF(a.JenisKeluhan = 1 AND a.IDTM = 'T001' AND a.StatusKeluhan = 1, 1, 0)) OPERASIONAL_STANDAR_ESKALASI,
						SUM(IF(a.JenisKeluhan = 1 AND a.IDTM = 'T001' AND a.StatusKeluhan = 2, 1, 0)) OPERASIONAL_STANDAR_PROGRESS,
						SUM(IF(a.JenisKeluhan = 1 AND a.IDTM = 'T001' AND a.StatusKeluhan = 3, 1, 0)) OPERASIONAL_STANDAR_SELESAI,
						
						SUM(IF(a.JenisKeluhan = 1 AND a.IDTM = 'T002' AND a.StatusKeluhan = 1, 1, 0)) OPERASIONAL_SEDANG_ESKALASI,
						SUM(IF(a.JenisKeluhan = 1 AND a.IDTM = 'T002' AND a.StatusKeluhan = 2, 1, 0)) OPERASIONAL_SEDANG_PROGRESS,
						SUM(IF(a.JenisKeluhan = 1 AND a.IDTM = 'T002' AND a.StatusKeluhan = 3, 1, 0)) OPERASIONAL_SEDANG_SELESAI,
						
						SUM(IF(a.JenisKeluhan = 1 AND a.IDTM = 'T003' AND a.StatusKeluhan = 1, 1, 0)) OPERASIONAL_TINGGI_ESKALASI,
						SUM(IF(a.JenisKeluhan = 1 AND a.IDTM = 'T003' AND a.StatusKeluhan = 2, 1, 0)) OPERASIONAL_TINGGI_PROGRESS,
						SUM(IF(a.JenisKeluhan = 1 AND a.IDTM = 'T003' AND a.StatusKeluhan = 3, 1, 0)) OPERASIONAL_TINGGI_SELESAI,
						
						/* Sistem Bermasalah */
						SUM(IF(a.JenisKeluhan = 2 AND a.IDTM = 'T001' AND a.StatusKeluhan = 1, 1, 0)) SISTEM_STANDAR_ESKALASI,
						SUM(IF(a.JenisKeluhan = 2 AND a.IDTM = 'T001' AND a.StatusKeluhan = 2, 1, 0)) SISTEM_STANDAR_PROGRESS,
						SUM(IF(a.JenisKeluhan = 2 AND a.IDTM = 'T001' AND a.StatusKeluhan = 3, 1, 0)) SISTEM_STANDAR_SELESAI,
						
						SUM(IF(a.JenisKeluhan = 2 AND a.IDTM = 'T002' AND a.StatusKeluhan = 1, 1, 0)) SISTEM_SEDANG_ESKALASI,
						SUM(IF(a.JenisKeluhan = 2 AND a.IDTM = 'T002' AND a.StatusKeluhan = 2, 1, 0)) SISTEM_SEDANG_PROGRESS,
						SUM(IF(a.JenisKeluhan = 2 AND a.IDTM = 'T002' AND a.StatusKeluhan = 3, 1, 0)) SISTEM_SEDANG_SELESAI,
						
						SUM(IF(a.JenisKeluhan = 2 AND a.IDTM = 'T003' AND a.StatusKeluhan = 1, 1, 0)) SISTEM_TINGGI_ESKALASI,
						SUM(IF(a.JenisKeluhan = 2 AND a.IDTM = 'T003' AND a.StatusKeluhan = 2, 1, 0)) SISTEM_TINGGI_PROGRESS,
						SUM(IF(a.JenisKeluhan = 2 AND a.IDTM = 'T003' AND a.StatusKeluhan = 3, 1, 0)) SISTEM_TINGGI_SELESAI,
						
						/* Umum */
						SUM(IF(a.JenisKeluhan = 3 AND a.IDTM = 'T001' AND a.StatusKeluhan = 1, 1, 0)) UMUM_STANDAR_ESKALASI,
						SUM(IF(a.JenisKeluhan = 3 AND a.IDTM = 'T001' AND a.StatusKeluhan = 2, 1, 0)) UMUM_STANDAR_PROGRESS,
						SUM(IF(a.JenisKeluhan = 3 AND a.IDTM = 'T001' AND a.StatusKeluhan = 3, 1, 0)) UMUM_STANDAR_SELESAI,
						
						SUM(IF(a.JenisKeluhan = 3 AND a.IDTM = 'T002' AND a.StatusKeluhan = 1, 1, 0)) UMUM_SEDANG_ESKALASI,
						SUM(IF(a.JenisKeluhan = 3 AND a.IDTM = 'T002' AND a.StatusKeluhan = 2, 1, 0)) UMUM_SEDANG_PROGRESS,
						SUM(IF(a.JenisKeluhan = 3 AND a.IDTM = 'T002' AND a.StatusKeluhan = 3, 1, 0)) UMUM_SEDANG_SELESAI,
						
						SUM(IF(a.JenisKeluhan = 3 AND a.IDTM = 'T003' AND a.StatusKeluhan = 1, 1, 0)) UMUM_TINGGI_ESKALASI,
						SUM(IF(a.JenisKeluhan = 3 AND a.IDTM = 'T003' AND a.StatusKeluhan = 2, 1, 0)) UMUM_TINGGI_PROGRESS,
						SUM(IF(a.JenisKeluhan = 3 AND a.IDTM = 'T003' AND a.StatusKeluhan = 3, 1, 0)) UMUM_TINGGI_SELESAI
					FROM keluhan a
						INNER JOIN klien b ON a.IDKlien = b.IDKlien
						INNER JOIN proyek c ON b.IDProyek = c.IDProyek
					WHERE DATE(a.TglKeluhan) BETWEEN '".$_REQUEST['start']."' AND '".$_REQUEST['end']."'
					GROUP BY c.IDProyek, TGL";
			
			$qry = $this->db->query($sql);
			
			if($qry->num_rows() > 0)
			{
				foreach($qry->result_array() as $rows)
				{
					$user[$rows['IDProyek']][$rows['TGL']] = $rows;
				}
			}
			
			return $user;
		}
	}

?>