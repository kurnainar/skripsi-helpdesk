<?php

	Class LapRekapitulasi Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array("M_LapRekapitulasi"));
		}
		
		Public Function Index()
		{
			$data = array();
			$this->template->load('default_layout', 'contents' , 'laporan/rekapitulasi/rekapitulasi-nav', $data);
		}
		
		Public Function Tampil()
		{
			$data =array(
							'DataProyek'	=> $this -> M_LapRekapitulasi -> DataProyek(),
							'DataRekap'		=> $this -> M_LapRekapitulasi -> DataRekap()
						);
			$this->load->view('laporan/rekapitulasi/rekapitulasi-show', $data);
		}
	}

?>