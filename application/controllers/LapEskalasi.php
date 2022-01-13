<?php

	Class LapEskalasi Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array("M_LapEskalasi"));
		}
		
		Public Function Index()
		{
			$data = array();
			$this->template->load('default_layout', 'contents' , 'laporan/eskalasi/eskalasi-nav', $data);
		}
		
		Public Function Tampil()
		{
			$data['DataEskalasi'] = $this -> M_LapEskalasi -> DataEskalasi();
			$this->load->view('laporan/eskalasi/eskalasi-show', $data);
		}
	}

?>