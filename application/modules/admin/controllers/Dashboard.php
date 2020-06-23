<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends MX_Controller {

	public function __construct()

	{

		parent::__construct();

		$this->auth->check_session();
		$this->load->model('dashboard_model');
		
		$this->load->model('users_model');
		
	}

	function index() {
        
        $redirect	= $this->auth->is_logged_in(false, false);
		if(!$redirect)
		{
			redirect('admin/login');
		}

		$admin = $this->session->userdata('admin');
		
		$data['userdata'] = $admin;
		$data['page_title'] = 'Dashboard';
		
		$data['body'] = 'dashboard';

		$this->load->view('template/main', $data);	

	}

}