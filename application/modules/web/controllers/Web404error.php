<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class web404error extends MX_Controller {


	public function __construct()

	{

		parent::__construct();

	
	}

	public function index()

	{

      $data = array();
        $data['page_title'] = 'Page Not Found';
		$this->output->set_status_header('404'); 
    	
    	$this->load->view('error404',$data);

	}


}
