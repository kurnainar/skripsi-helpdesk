<?php

	Class M_TransKonfirmasi Extends CI_Model
	{
		var $keluhan = 'keluhan';
		var $solusi = 'solusi';
		
		Public Function DaftarKonfirmasi()
		{
			$user = array();
			$sql = "SELECT
						a.IDKeluhan, a.Deskripsi, a.TglKeluhan, a.TglKonfirmasi,
						IF(b.StatusKonfirmasi = 1, 'Sudah Diinformasikan Kepada Klien','') StatusKonfirmasi
					FROM keluhan a
						INNER JOIN solusi b ON a.IDKeluhan = b.IDKeluhan";
			// echo $sql;
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
		
		Public Function Simpan($where, $set, $konfirmasi)
		{
			$this -> db -> where('IDKeluhan', $where);
			$this -> db -> update($this->keluhan, $set);
			if($this -> db -> affected_rows() > 0) {
				$this -> db -> where('IDKeluhan', $where);
				$this -> db -> update($this->solusi, $konfirmasi);
			}
			return $this -> db -> affected_rows();
		}
	}

?>