<?php

	Class MasterPegawai Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array("M_MasterPegawai","M_MasterDivisi"));
		}
		
		Public Function Index()
		{
			// header("Access-Control-Allow-Origin: *");
			$data = array();
			// $this->template->set('title', 'Entry Data Divisi');
			$data['DaftarPegawai'] = $this -> M_MasterPegawai -> DaftarPegawai();
			$this->template->load('default_layout', 'contents' , 'master/pegawai/pegawai-list', $data);
		}
		
		Public Function TambahPegawai()
		{
			$data['IDPegawai'] = $this -> M_MasterPegawai -> Autonumber();
			$data['Divisi'] = $this -> M_MasterDivisi -> DaftarDivisi();
			$this->template->load('default_layout', 'contents' , 'master/pegawai/pegawai-add', $data);
		}
		
		Public Function EditDivisi()
		{
			// $data['IDDivisi'] = $this -> M_MasterDivisi -> Autonumber();
			$data['Divisi'] = $this -> M_MasterDivisi -> DaftarDivisi();
			$this->template->load('default_layout', 'contents' , 'master/pegawai/pegawai-edit',$data);
		}
		
		Public Function Simpan()
		{
			$date = date_create($this->input->post('tgl_lahir'));
			$TTL = date_format($date,"Y/m/d");
			
			$Data = array(
							'IDDivisi'		=> $this->input->post('id_divisi'),
							'IDPegawai'		=> $this->input->post('id_pegawai'),
							'NamaPegawai'	=> $this->input->post('nama_pegawai'),
							'TempatLahir'	=> $this->input->post('tempat_lahir'),
							'TanggalLahir'	=> $TTL,
							'NoTelp'		=> $this->input->post('no_telp')
						);
			$insert = $this->M_MasterPegawai->Simpan($Data);
			echo json_encode(array("status" => TRUE));
		}
		
		Public Function AmbilById($id)
		{
			$Data = $this -> M_MasterPegawai -> AmbilById($id);
			echo json_encode($Data);
		}
		
		Public Function Ubah()
		{
			$date = date_create($this->input->post('tgl_lahir'));
			$TTL = date_format($date,"Y/m/d");
			
			$Data = array(
							'NamaPegawai'	=> $this->input->post('nama_pegawai'),
							'TempatLahir'	=> $this->input->post('tempat_lahir'),
							'TanggalLahir'	=> $TTL,
							'NoTelp'		=> $this->input->post('no_telp'),
							'IDDivisi'		=> $this->input->post('id_divisi')
						);
			$insert = $this->M_MasterPegawai->Ubah(array('IDPegawai' => $this->input->post('id_pegawai')),$Data);
			echo json_encode(array("status" => TRUE));
		}
		
		Public Function Hapus($id)
		{
			$this -> M_MasterPegawai -> Hapus($id);
			echo json_encode(array("status" => TRUE));
		}
	}

?>