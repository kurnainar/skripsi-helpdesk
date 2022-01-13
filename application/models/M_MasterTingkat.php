<?php

	Class M_MasterTingkat Extends CI_Model
	{
		var $table = 'tingkatmasalah';
		
		Public Function Autonumber()
		{
			$this->db->select('Right(tingkatmasalah.IDTM,3) as kode ',false);
            $this->db->order_by('IDTM', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('tingkatmasalah');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "T".$kodemax;
            return $kodejadi;
		}
		
		Public Function DaftarTingkat()
		{
			$user = array();
			$sql = "SELECT * FROM tingkatmasalah a ORDER BY a.IDTM";
			// echo $sql;
			$qry = $this->db->query($sql);
			
			if($qry->num_rows() > 0)
			{
				foreach($qry->result_array() as $rows)
				{
					$user[$rows['IDTM']] = $rows;
				}
			}
			
			return $user;
		}
		
		Public Function Simpan($data)
		{
			$this -> db -> insert($this->table,$data);
			Return $this->db->insert_id();
		}
		
		Public Function AmbilById($id)
		{
			$this -> db -> from($this->table);
			$this -> db -> where('IDTM',$id);
			$query = $this -> db -> get();

			return $query->row();
		}
		
		Public Function Ubah($where, $data)
		{
			$this -> db -> update($this->table, $data, $where);
			// return $this->output->enable_profiler(true);
			return $this -> db -> affected_rows();
		}
		
		Public Function Hapus($id)
		{
			$this->db->where('IDTM', $id);
			$this->db->delete($this->table);
			return $this -> db -> affected_rows();
		}
	}

?>