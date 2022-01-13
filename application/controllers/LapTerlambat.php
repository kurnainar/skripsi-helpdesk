<?php

	Class LapTerlambat Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array("M_LapTerlambat"));
		}
		
		Public Function Index()
		{
			$data = array();
			$this->template->load('default_layout', 'contents' , 'laporan/terlambat/terlambat-nav', $data);
		}
		
		Public Function Tampil()
		{
			$data['DataTerlambat'] = $this -> M_LapTerlambat -> DataTerlambat();
			$this->load->view('laporan/terlambat/terlambat-show', $data);
		}
	}

?>