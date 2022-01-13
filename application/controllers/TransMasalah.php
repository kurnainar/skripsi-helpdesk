<?php

	Class TransMasalah Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array("M_TransMasalah","M_MasterKlien","M_MasterPegawai","M_TransPendataan","M_MasterDivisi","M_MasterTingkat"));
		}
		
		Public Function Index()
		{
			$data['DaftarKeluhan'] = $this -> M_TransMasalah -> DaftarKeluhan();
			$this->template->load('default_layout', 'contents' , 'transaksi/masalah/masalah-list', $data);
		}
		
		Public Function TambahMasalah()
		{
			$data = array();
			$data['IDKeluhan'] = $this -> M_TransMasalah -> Autonumber();
			$data['DaftarProyek'] = $this -> M_TransPendataan -> DaftarProyek();
			$data['DaftarKlien'] = $this -> M_MasterKlien -> DaftarKlien();
			$data['DaftarDivisi'] = $this -> M_MasterDivisi -> DaftarDivisi();
			$data['DaftarPegawai'] = $this -> M_MasterPegawai -> DaftarPegawai();
			$data['DaftarJenis'] = $this -> M_TransMasalah -> DaftarJenis();
			$data['DaftarTingkat'] = $this -> M_MasterTingkat -> DaftarTingkat();
			$this->template->load('default_layout', 'contents' , 'transaksi/masalah/masalah-add', $data);
		}
		
		Public Function Simpan()
		{
			$Data 	=  array(
								'IDKeluhan' => $this->input->post('id_keluhan'),
								'TglKeluhan' => date("Y-m-d h:i:s"),
								'Deskripsi' => $this->input->post('deskripsi'),
								'StatusKeluhan' => 2,
								'JenisKeluhan' => $this->input->post('jenis_keluhan'),
								'IDDivisi' => $this->input->post('id_divisi'),
								'IDTM' => $this->input->post('id_tm'),
								'IDPegawai' => $this->input->post('id_pegawai'),
								'IDKlien' => $this->input->post('id_klien')
							);
			$this->M_TransMasalah->Simpan($Data);
			echo json_encode(array("status" => TRUE));
		}
	}

?>