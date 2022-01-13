<?php

	Class M_LapMasalah Extends CI_Model
	{
		Public Function DataMasalah()
		{
			$user = array();
			$sql = "SELECT
						a.IDKeluhan, a.TglKeluhan, a.Deskripsi, c.NamaProyek, b.NamaKlien, d.NamaTM
					FROM keluhan a
						INNER JOIN klien b ON a.IDKlien = b.IDKlien
						INNER JOIN proyek c ON b.IDProyek = c.IDProyek
						INNER JOIN tingkatmasalah d ON a.IDTM = d.IDTM
					WHERE DATE(a.TglKeluhan) BETWEEN '".$_REQUEST['start']."' AND '".$_REQUEST['end']."'
					ORDER BY a.IDKeluhan";
			
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