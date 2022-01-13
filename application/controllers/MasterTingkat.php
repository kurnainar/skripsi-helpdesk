<?php

	Class MasterTingkat Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array("M_MasterTingkat"));
		}
		
		Public Function Index()
		{
			$data['DaftarTingkat'] = $this -> M_MasterTingkat -> DaftarTingkat();
			$this->template->load('default_layout', 'contents' , 'master/tingkat/tingkat-list',$data);
		}
		
		Public Function TambahTingkat()
		{
			$data['IDTM'] = $this -> M_MasterTingkat -> Autonumber();
			$this->template->load('default_layout', 'contents' , 'master/tingkat/tingkat-add', $data);
		}
		
		Public Function EditTingkat()
		{
			// $data['IDDivisi'] = $this -> M_MasterDivisi -> Autonumber();
			$data['DaftarTingkat'] = $this -> M_MasterTingkat -> DaftarTingkat();
			$this->template->load('default_layout', 'contents' , 'master/tingkat/tingkat-edit',$data);
		}
		
		Public Function Simpan()
		{
			$Data = array(
							'IDTM'		=> $this->input->post('id_tm'),
							'NamaTM'	=> $this->input->post('nama_tm'),
							'Lama'		=> $this->input->post('waktu')
						);
			$insert = $this->M_MasterTingkat->Simpan($Data);
			echo json_encode(array("status" => TRUE));
		}
		
		Public Function AmbilById($id)
		{
			$Data = $this -> M_MasterTingkat -> AmbilById($id);
			echo json_encode($Data);
		}
		
		Public Function Ubah()
		{
			$Data = array(
							'NamaTM'	=> $this->input->post('nama_tm'),
							'Lama'		=> $this->input->post('waktu')
						);
			$insert = $this->M_MasterTingkat->Ubah(array('IDTM' => $this->input->post('id_tm')),$Data);
			echo json_encode(array("status" => TRUE));
		}
		
		Public Function Hapus($id)
		{
			$this -> M_MasterTingkat -> Hapus($id);
			echo json_encode(array("status" => TRUE));
		}
	}

?>