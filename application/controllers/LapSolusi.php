<?php

	Class LapSolusi Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array("M_LapSolusi"));
		}
		
		Public Function Index()
		{
			$data = array();
			$this->template->load('default_layout', 'contents' , 'laporan/solusi/solusi-nav', $data);
		}
		
		Public Function Tampil()
		{
			$data['DataSolusi'] = $this -> M_LapSolusi -> DataSolusi();
			$this->load->view('laporan/solusi/solusi-show', $data);
		}
	}

?>