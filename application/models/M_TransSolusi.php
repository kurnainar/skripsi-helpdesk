<?php

	Class M_TransSolusi Extends CI_Model
	{
		var $table = 'solusi';
		var $keluhan = 'keluhan';
		
		Public Function Autonumber()
		{
			$this->db->select('Right(solusi.IDSolusi,3) as kode ',false);
            $this->db->order_by('IDSolusi', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('solusi');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $tanggal = date('ym');
            $kodejadi  = "S".$kodemax;
            return $kodejadi;
		}
		
		Public Function DaftarSolusi()
		{
			$user = array();
			$sql = "SELECT
						a.IDSolusi, a.IDKeluhan, b.Deskripsi, a.Deskripsi AS Solusi, a.TglSolusi
					FROM solusi a
						INNER JOIN keluhan b ON a.IDKeluhan = b.IDKeluhan";
			// echo $sql;
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