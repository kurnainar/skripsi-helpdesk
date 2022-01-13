<?php

	Class LapMasalah Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array("M_LapMasalah"));
		}
		
		Public Function Index()
		{
			$data = array();
			$this->template->load('default_layout', 'contents' , 'laporan/masalah/masalah-nav', $data);
		}
		
		Public Function Tampil()
		{
			$data =array(
							'DataMasalah'	=> $this -> M_LapMasalah -> DataMasalah()
						);
			$this->load->view('laporan/masalah/masalah-show', $data);
		}
	}

?>