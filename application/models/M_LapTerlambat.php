<?php

	Class M_LapTerlambat Extends CI_Model
	{
		Public Function DataTerlambat()
		{
			$user = array();
			$sql = "SELECT
						a.IDKeluhan, a.TglKeluhan, a.Deskripsi, 
						b.NamaTM, b.LamaPengerjaan, c.TglSolusi,
						(c.TglSolusi) - (date(a.TglKeluhan)) as Hasil,
						IF( (c.TglSolusi) - (date(a.TglKeluhan)) > b.LamaPengerjaan, 1, 0 ) keterangan
					FROM keluhan a
						INNER JOIN tingkatmasalah b ON a.IDTM = b.IDTM
						INNER JOIN solusi c ON a.IDKeluhan = c.IDKeluhan
					WHERE DATE(a.TglKeluhan) BETWEEN '".$_REQUEST['start']."' AND '".$_REQUEST['end']."'
					GROUP BY a.IDKeluhan
					HAVING keterangan = 1 ";
			
			$qry = $this->db->query($sql);
			
			if($qry->num_rows() > 0)
			{
				foreach($qry->result_array() as $rows)
				{
					$user[$rows['IDKeluhan']] = $rows;
				}
			}
			
			return $user;
		}
	}

?>