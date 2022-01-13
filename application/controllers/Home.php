<?php

	Class Home Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
		}
		
		Public Function Index()
		{
			$this->template->load('default_layout', 'contents' , 'home');
		}
	}

?>