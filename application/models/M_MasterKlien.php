<?php

	Class M_MasterKlien Extends CI_Model
	{
		var $table = 'klien';
		
		Public Function Autonumber()
		{
			$this->db->select('Right(klien.IDKlien,3) as kode ',false);
            $this->db->order_by('IDKlien', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('klien');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "K".$kodemax;
            return $kodejadi;
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
		
		Public Function Simpan($data)
		{
			$this -> db -> insert($this->table,$data);
			Return $this->db->insert_id();
		}
		
		Public Function AmbilById($id)
		{
			$this -> db -> from($this->table);
			$this -> db -> where('IDKlien',$id);
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
			$this->db->where('IDKlien', $id);
			$this->db->delete($this->table);
			return $this -> db -> affected_rows();
		}
	}

?>