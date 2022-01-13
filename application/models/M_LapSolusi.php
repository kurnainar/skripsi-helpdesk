<?php

	Class M_LapSolusi Extends CI_Model
	{
		Public Function DataSolusi()
		{
			$user = array();
			$sql = "SELECT
						a.IDSolusi, a.IDKeluhan, b.TglKeluhan, b.Deskripsi, 
						d.NamaProyek, c.NamaKlien, e.NamaTM, 
						a.TglSolusi, a.Deskripsi Solusi
					FROM solusi a
						INNER JOIN keluhan b ON a.IDKeluhan = b.IDKeluhan
						INNER JOIN klien c ON b.IDKlien = c.IDKlien
						INNER JOIN proyek d ON c.IDProyek = d.IDProyek
						INNER JOIN tingkatmasalah e ON b.IDTM = e.IDTM
					WHERE a.TglSolusi BETWEEN '".$_REQUEST['start']."' AND '".$_REQUEST['end']."' ";
			
			$qry = $this->db->query($sql);
			
			if($qry->num_rows() > 0)
			{
				foreach($qry->result_array() as $rows)
				{
					$user[$rows['IDSolusi']] = $rows;
				}
			}
			
			return $user;
		}
	}

?>