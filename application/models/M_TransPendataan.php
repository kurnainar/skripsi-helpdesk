<?php

	Class M_TransPendataan Extends CI_Model
	{
		var $proyek = 'proyek';
		var $klien = 'klien';
		var $ada = 'ada';
		
		Public Function Autonumber()
		{
			$this->db->select('Right(proyek.IDProyek,3) as kode ',false);
            $this->db->order_by('IDProyek', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('proyek');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $tanggal = date('ym');
            $kodejadi  = "PR".$tanggal.$kodemax;
            return $kodejadi;
		}
		
		Public Function DaftarPendataan()
		{
			$user = array();
			$sql = "SELECT a.* FROM proyek a";
			// echo $sql;
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
		
		Public Function DaftarAda()
		{
			$user = array();
			$sql = "SELECT
						a.ID, a.IDProyek, a.IDPegawai, b.NamaPegawai
					FROM ada a
						INNER JOIN pegawai b ON a.IDPegawai = b.IDPegawai";
			// echo $sql;
			$qry = $this->db->query($sql);
			
			if($qry->num_rows() > 0)
			{
				foreach($qry->result_array() as $rows)
				{
					$user[$rows['IDProyek']][$rows['ID']] = $rows;
				}
			}
			
			return $user;
		}
		
		Public Function Simpan($data, $klien, $proyek)
		{
			$this -> db -> where('IDKlien', $klien);
			$this -> db -> update($this->klien, $proyek);
			if($this -> db -> affected_rows() > 0) {
				$this -> db -> insert($this->proyek,$data);
				$this->db->insert_id();
			}
			return $this -> db -> affected_rows();
		}
		
		Public Function SimpanAda($data)
		{
			$conds = false;
			
			$cou=0;
			foreach($data as $rnd => $rows){
				$this->db->insert('ada',array(
					'IDPegawai' 	 => $rows['id_pegawai'],
					'IDProyek' 		 => $rows['id_proyek'],
					'Jabatan' 		 => $rows['jabatan'],
					'PeriodeMulai' 	 => $rows['periode_mulai'],
					'PeriodeSelesai' => $rows['periode_akhir'],
				));
				
				if($this->db->affected_rows()>0){
					$cou++;
				}
			}
			
			if($cou>0){
				$conds = true;
			}
			/* $this -> db -> where('IDKlien', $klien);
			$this -> db -> update($this->klien, $proyek);
			if($this -> db -> affected_rows() > 0) {
				$this -> db -> insert($this->proyek,$data);
				$this->db->insert_id();
			}
			
			return $this -> db -> affected_rows(); */
			return $conds;
		}
		
		Public Function DaftarKlien()
		{
			$user = array();
			$sql = "SELECT a.*, b.NamaProyek FROM klien a 
					LEFT JOIN proyek b on a.IDProyek = b.IDProyek
					ORDER BY IDKlien";
			// echo $sql;
			$qry = $this->db->query($sql);
			
			if($qry->num_rows() > 0)
			{
				foreach($qry->result_array() as $rows)
				{
					$user[$rows['IDKlien']] = $rows;
				}
			}
			
			return $user;
		}
		
		Public Function DaftarProyek()
		{
			$user = array();
			$sql = "SELECT * FROM proyek a ORDER BY a.IDProyek";
			// echo $sql;
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
		
		Public Function DaftarJabatan()
		{
			return array(
							1 => 'Staf',
							2 => 'Project Manager',
							3 => 'Supervisor',
							4 => 'General Manager'
						);
		}
	}

?>