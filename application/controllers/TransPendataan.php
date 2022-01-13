<?php

	Class TransPendataan Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array("M_TransPendataan","M_MasterKlien","M_MasterPegawai"));
		}
		
		Public Function Index()
		{
			$data['DaftarPendataan'] = $this -> M_TransPendataan -> DaftarPendataan();
			$data['DaftarAda'] = $this -> M_TransPendataan -> DaftarAda();
			$this->template->load('default_layout', 'contents' , 'transaksi/pendataan/pendataan-list', $data);
		}
		
		Public Function TambahPendataan()
		{
			$data['IDProyek'] = $this -> M_TransPendataan -> Autonumber();
			$data['DaftarKlien'] = $this -> M_MasterKlien -> DaftarKlien();
			$data['DaftarPegawai'] = $this -> M_MasterPegawai -> DaftarPegawai();
			$data['DaftarJabatan'] = $this -> M_TransPendataan -> DaftarJabatan();
			$this->template->load('default_layout', 'contents' , 'transaksi/pendataan/pendataan-add', $data);
		}
		
		// Public Function Simpan()
		// {
			// $IDKlien = $this->input->post('id_klien');
			// $Proyek = array('IDProyek'	=> $this->input->post('id_proyek'));
			// $Data 	=  array(
								// 'IDProyek' => $this->input->post('id_proyek'),
								// 'NamaProyek' => $this->input->post('nama_proyek'),
								// 'LokasiProyek' => $this->input->post('lokasi_proyek'),
								// 'TglMulaiProyek' => $this->input->post('tgl_mulai'),
								// 'NoTelp' => $this->input->post('no_telp')
							// );
			// $Grid = array();
			
			// foreach($_POST as $index => $value){
				// if(preg_match("/^grid_/i", $index)) {
					// $index = preg_replace("/^grid_/i","",$index);
					// $arr = explode('_',$index);
					// $rnd = $arr[count($arr)-1];
					// array_pop($arr);
					// $idx = implode('_',$arr);
					
					// $Grid[$rnd][$idx] = $value;
					// if(!isset($Grid[$rnd]['id_proyek'])){
						// $Grid[$rnd]['id_proyek'] = $this->input->post('id_proyek');
					// }
				// }
			// }
			
			// foreach($IDKlien as $baris) {
				// $this->M_TransPendataan->Simpan($Data, $baris, $Proyek);
			// }
			
			// $this->M_TransPendataan->SimpanAda($Grid);
			
			// echo json_encode(array("status" => TRUE));
		// }
		
		Public Function Simpan()
		{
			$IDKlien = $this->input->post('id_klien');
			$Proyek = array('IDProyek'	=> $this->input->post('id_proyek'));
			$Data 	=  array(
				'IDProyek' => $this->input->post('id_proyek'),
				'NamaProyek' => $this->input->post('nama_proyek'),
				'LokasiProyek' => $this->input->post('lokasi_proyek'),
				'TglMulaiProyek' => $this->input->post('tgl_mulai'),
				'NoTelp' => $this->input->post('no_telp')
			);
			
			$Grid = array();
			
			foreach($_POST as $index => $value){
				if(preg_match("/^grid_/i", $index)) {
					$index = preg_replace("/^grid_/i","",$index);
					$arr = explode('_',$index);
					$rnd = $arr[count($arr)-1];
					array_pop($arr);
					$idx = implode('_',$arr);
					
					$Grid[$rnd][$idx] = $value;
					if(!isset($Grid[$rnd]['id_proyek'])){
						$Grid[$rnd]['id_proyek'] = $this->input->post('id_proyek');
					}
				}
			}
			
			foreach($IDKlien as $baris) {
				$this->M_TransPendataan->Simpan($Data, $baris, $Proyek);
			}
			
			$this->M_TransPendataan->SimpanAda($Grid);
			
			echo json_encode(array("status" => TRUE));
		}
	}

?>