<?php

	Class TransSolusi Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array("M_TransMasalah","M_TransSolusi"));
		}
		
		Public Function Index()
		{
			$data['DaftarSolusi'] = $this -> M_TransSolusi -> DaftarSolusi();
			$this->template->load('default_layout', 'contents' , 'transaksi/solusi/solusi-list', $data);
		}
		
		Public Function TambahSolusi()
		{
			$data['IDSolusi'] = $this -> M_TransSolusi -> Autonumber();
			$data['DaftarKeluhan'] = $this -> M_TransMasalah -> DaftarKeluhanProses();
			$this->template->load('default_layout', 'contents' , 'transaksi/solusi/solusi-add', $data);
		}
		
		Public Function Simpan()
		{
			$Data 	=  array(
								'IDSolusi' => $this->input->post('id_solusi'),
								'Deskripsi' => $this->input->post('solusi'),
								'TglSolusi' => $this->input->post('tgl_solusi'),
								'IDKeluhan' => $this->input->post('id_keluhan')
							);
			$Keluhan =  array('StatusKeluhan'	=> 3);
			$this->M_TransSolusi->Simpan($Data, $Keluhan);
			echo json_encode(array("status" => TRUE));
		}
	}

?>