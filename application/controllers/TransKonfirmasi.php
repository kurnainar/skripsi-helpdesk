<?php

	Class TransKonfirmasi Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array("M_TransMasalah","M_TransKonfirmasi"));
		}
		
		Public Function Index()
		{
			$data['DaftarKonfirmasi'] = $this -> M_TransKonfirmasi -> DaftarKonfirmasi();
			$this->template->load('default_layout', 'contents' , 'transaksi/konfirmasi/konfirmasi-list', $data);
		}
		
		Public Function TambahKonfirmasi()
		{
			$data['DaftarKeluhan'] = $this -> M_TransMasalah -> DaftarKeluhanSelesai();
			$this->template->load('default_layout', 'contents' , 'transaksi/konfirmasi/konfirmasi-add', $data);
		}
		
		Public Function Simpan()
		{
			$Data =  	array(
								'TglKonfirmasi'	=> $this->input->post('tgl_konfirmasi')
							);
			$this->M_TransKonfirmasi->Simpan($this->input->post('id_keluhan'),$Data,array('StatusKonfirmasi' => 1));
			echo json_encode(array("status" => TRUE));
		}
	}

?>