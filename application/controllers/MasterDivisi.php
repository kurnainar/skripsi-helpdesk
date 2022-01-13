<?php

	Class MasterDivisi Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array("M_MasterDivisi"));
		}
		
		Public Function Index()
		{
			// header("Access-Control-Allow-Origin: *");
			$data['DaftarDivisi'] = $this -> M_MasterDivisi -> DaftarDivisi();
			$this->template->load('default_layout', 'contents' , 'master/divisi/divisi-list', $data);
		}
		
		Public Function TambahDivisi()
		{
			$data['IDDivisi'] = $this -> M_MasterDivisi -> Autonumber();
			$this->template->load('default_layout', 'contents' , 'master/divisi/divisi-add', $data);
		}
		
		Public Function EditDivisi()
		{
			// $data['IDDivisi'] = $this -> M_MasterDivisi -> Autonumber();
			$this->template->load('default_layout', 'contents' , 'master/divisi/divisi-edit');
		}
		
		Public Function Simpan()
		{
			$Data = array(
							'IDDivisi'		=> $this->input->post('id_divisi'),
							'NamaDivisi'	=> $this->input->post('nama_divisi')
						);
			$insert = $this->M_MasterDivisi->Simpan($Data);
			echo json_encode(array("status" => TRUE));
		}
		
		Public Function AmbilById($id)
		{
			$Data = $this -> M_MasterDivisi -> AmbilById($id);
			echo json_encode($Data);
		}
		
		Public Function Ubah()
		{
			$Data = array(
							'NamaDivisi'	=> $this->input->post('nama_divisi')
						);
			$insert = $this->M_MasterDivisi->Ubah(array('IDDivisi' => $this->input->post('id_divisi')),$Data);
			echo json_encode(array("status" => TRUE));
		}
		
		Public Function Hapus($id)
		{
			$this -> M_MasterDivisi -> Hapus($id);
			echo json_encode(array("status" => TRUE));
		}
	}

?>