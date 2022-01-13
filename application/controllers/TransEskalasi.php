<?php

	Class TransEskalasi Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array("M_TransMasalah","M_TransEskalasi","M_MasterPegawai","M_MasterDivisi"));
		}
		
		Public Function Index()
		{
			$data['DaftarEskalasi'] = $this -> M_TransEskalasi -> DaftarEskalasi();
			$this->template->load('default_layout', 'contents' , 'transaksi/eskalasi/eskalasi-list', $data);
		}
		
		Public Function TambahEskalasi()
		{
			$data = array();
			$data['IDEskalasi'] = $this -> M_TransEskalasi -> Autonumber();
			$data['DaftarKeluhan'] = $this -> M_TransMasalah -> DaftarKeluhanProses();
			$data['DaftarDivisi'] = $this -> M_MasterDivisi -> DaftarDivisi();
			$data['DaftarPegawai'] = $this -> M_MasterPegawai -> DaftarPegawai();
			$this->template->load('default_layout', 'contents' , 'transaksi/eskalasi/eskalasi-add', $data);
		}
		
		Public Function Simpan()
		{
			$Data 	=  array(
								'IDEskalasi'	=> $this->input->post('id_eskalasi'),
								'TglEskalasi'	=> date("Y-m-d h:i:s"),
								'Keterangan'	=> $this->input->post('keterangan'),
								'IDDivisi'		=> $this->input->post('id_divisi'),
								'IDPegawai'		=> $this->input->post('id_pegawai'),
								'IDKeluhan'		=> $this->input->post('id_keluhan')
							);
			$Keluhan =  array('StatusKeluhan'	=> 1);
			$this->M_TransEskalasi->Simpan($Data,$Keluhan);
			echo json_encode(array("status" => TRUE));
		}
	}

?>