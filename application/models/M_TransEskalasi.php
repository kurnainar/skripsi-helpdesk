<?php

	Class M_TransEskalasi Extends CI_Model
	{
		var $table = 'eskalasi';
		var $keluhan = 'keluhan';
		
		Public Function Autonumber()
		{
			$this->db->select('Right(eskalasi.IDEskalasi,3) as kode ',false);
            $this->db->order_by('IDEskalasi', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('eskalasi');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $tanggal = date('ym');
            $kodejadi  = "E".$kodemax;
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
		
		Public Function DaftarEskalasi()
		{
			$user = array();
			$sql = "SELECT
						a.IDEskalasi, a.TglEskalasi, a.Keterangan,
						b.NamaPegawai, c.IDKeluhan, c.Deskripsi
					FROM eskalasi a
						INNER JOIN pegawai b on a.IDPegawai = b.IDPegawai
						INNER JOIN keluhan c on a.IDKeluhan = c.IDKeluhan";
			// echo $sql;
			$qry = $this->db->query($sql);
			
			if($qry->num_rows() > 0)
			{
				foreach($qry->result_array() as $rows)
				{
					$user[$rows['IDEskalasi']] = $rows;
				}
			}
			
			return $user;
		}
		
		Public Function Simpan($data, $keluhan)
		{
			$this -> db -> where('IDKeluhan', $data['IDKeluhan']);
			$this -> db -> update($this->keluhan, $keluhan);
			if($this -> db -> affected_rows() > 0) {
				$this -> db -> insert($this->table,$data);
				$this->db->insert_id();
				
			}
			return $this -> db -> affected_rows();
		}
	}

?>