<?php

	Class MasterKlien Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array("M_MasterKlien"));
		}
		
		Public Function Index()
		{
			$data['DaftarKlien'] = $this -> M_MasterKlien -> DaftarKlien();
			$this->template->load('default_layout', 'contents' , 'master/klien/klien-list', $data);
		}
		
		Public Function TambahKlien()
		{
			$data['IDKlien'] = $this -> M_MasterKlien -> Autonumber();
			$this->template->load('default_layout', 'contents' , 'master/klien/klien-add', $data);
		}
		
		Public Function EditKlien()
		{
			// $data['IDDivisi'] = $this -> M_MasterDivisi -> Autonumber();
			$data['Klien'] = $this -> M_MasterKlien -> DaftarKlien();
			$this->template->load('default_layout', 'contents' , 'master/klien/klien-edit',$data);
		}
		
		Public Function Simpan()
		{
			$Data = array(
							'IDKlien'		=> $this->input->post('id_klien'),
							'NamaKlien'		=> $this->input->post('nama_klien'),
							'Alamat'		=> $this->input->post('alamat_klien'),
							'NoTelp'		=> $this->input->post('no_telp')
						);
			$insert = $this->M_MasterKlien->Simpan($Data);
			echo json_encode(array("status" => TRUE));
		}
		
		Public Function AmbilById($id)
		{
			$Data = $this -> M_MasterKlien -> AmbilById($id);
			echo json_encode($Data);
		}
		
		Public Function Ubah()
		{
			$Data = array(
							'NamaKlien'	=> $this->input->post('nama_klien'),
							'Alamat'	=> $this->input->post('alamat_klien'),
							'NoTelp'	=> $this->input->post('no_telp'),
							'IDProyek'	=> ($this->input->post('id_proyek')?$this->input->post('id_proyek'):null)
						);
			$insert = $this->M_MasterKlien->Ubah(array('IDKlien' => $this->input->post('id_klien')),$Data);
			echo json_encode(array("status" => TRUE));
		}
		
		Public Function Hapus($id)
		{
			$this -> M_MasterKlien -> Hapus($id);
			echo json_encode(array("status" => TRUE));
		}
	}

?>