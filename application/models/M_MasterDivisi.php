<?php

	Class M_MasterDivisi Extends CI_Model
	{
		var $table = 'divisi';
		
		Public Function Autonumber()
		{
			$this->db->select('Right(divisi.IDDivisi,3) as kode ',false);
            $this->db->order_by('IDDivisi', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('divisi');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "D".$kodemax;
            return $kodejadi;
		}
		
		Public Function DaftarDivisi()
		{
			$user = array();
			$sql = "SELECT * FROM divisi ORDER BY IDDivisi";
			
			$qry = $this->db->query($sql);
			
			if($qry->num_rows() > 0)
			{
				foreach($qry->result_array() as $rows)
				{
					$user[$rows['IDDivisi']] = $rows;
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
			$this -> db -> where('IDDivisi',$id);
			$query = $this -> db -> get();

			return $query->row();
		}
		
		Public Function Ubah($where, $data)
		{
			$this -> db -> update($this->table, $data, $where);
			return $this -> db -> affected_rows();
		}
		
		Public Function Hapus($id)
		{
			$this->db->where('IDDivisi', $id);
			$this->db->delete($this->table);
			return $this -> db -> affected_rows();
		}
	}

?>