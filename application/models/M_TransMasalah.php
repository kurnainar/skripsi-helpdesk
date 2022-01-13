<?php

	Class M_TransMasalah Extends CI_Model
	{
		var $table = 'keluhan';
		
		Public Function Autonumber()
		{
			$this->db->select('Right(keluhan.IDKeluhan,3) as kode ',false);
            $this->db->order_by('IDKeluhan', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('keluhan');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $tanggal = date('ym');
            $kodejadi  = "KL".$tanggal.$kodemax;
            return $kodejadi;
		}
		
		Public Function DaftarJenis()
		{
			return array(
							1 => 'IT Operasional',
							2 => 'Sistem Bermasalah',
							3 => 'Umum'
						);
		}
		
		Public Function DaftarKeluhan()
		{
			$user = array();
			$sql = "SELECT
						a.IDKeluhan, a.TglKeluhan,
						case  
						   when a.StatusKeluhan = 1 then 'Eskalasi'
						   when a.StatusKeluhan = 2 then 'Sedang Dikerjakan'
						   when a.StatusKeluhan = 3 then 'Selesai'
						end as StatusKeluhan,
						 b.NamaKlien, c.NamaProyek, a.Deskripsi,
						 d.NamaDivisi, e.NamaPegawai,
						 case  
						   when a.StatusKeluhan = 1 then 'IT Operasional'
						   when a.StatusKeluhan = 2 then 'Sistem Bermasalah'
						   when a.StatusKeluhan = 3 then 'Umum'
						end as JenisKeluhan,
						f.NamaTM
					FROM keluhan a
						INNER JOIN klien b on a.IDKlien = b.IDKlien
						INNER JOIN proyek c on b.IDProyek = c.IDProyek
						INNER JOIN divisi d on a.IDDivisi = d.IDDivisi
						INNER JOIN pegawai e on a.IDPegawai = e.IDPegawai
						INNER JOIN tingkatmasalah f on a.IDTM = f.IDTM";
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
		
		Public Function DaftarKeluhanProses()
		{
			$user = array();
			$sql = "SELECT
						a.IDKeluhan, a.Deskripsi
					FROM keluhan a
					WHERE a.StatusKeluhan != 3 ";
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
		
		Public Function DaftarKeluhanSelesai()
		{
			$user = array();
			$sql = "SELECT
						a.IDKeluhan, a.Deskripsi
					FROM keluhan a
					WHERE a.StatusKeluhan = 3 ";
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
		
		Public Function Simpan($data)
		{
			$this -> db -> insert($this->table,$data);
			Return $this->db->insert_id();
		}
	}

?>