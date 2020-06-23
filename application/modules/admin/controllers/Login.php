<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class login extends MX_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		
	}
	
	public function index()
	{
      
		$redirect	= $this->auth->is_logged_in(false, false);
		if($redirect)
		{
			redirect('admin/dashboard');
		}
		$this->load->helper('form');
		$submitted 			= $this->input->post('submitted');
		if ($submitted)
		{
			$username	= $this->input->post('username');
			$password	= $this->input->post('userpassword');
			$remember   = $this->input->post('remember');
			$redirect	= $this->input->post('redirect');

			$login		= $this->auth->login_admin($username, $password, $remember);

            $this->form_validation->set_rules("username", "username", "trim|required|xss_clean");
		    $this->form_validation->set_rules("userpassword", "userpassword", "trim|required|xss_clean");
			
			if ($this->form_validation->run() == FALSE)
	        {
				// validation fail
				
				$this->load->view('login/login');
				
			}else{
				
				if ($login)
				{
					if ($redirect == '')
					{
						$redirect = redirect('admin/dashboard');
					}
					$redirect = redirect('admin/dashboard');
				}
				else
				{
					//this adds the redirect back to flash data if they provide an incorrect credentials
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Username or Password!</div>');
					redirect('admin/login');
				}
			}
			
		}
		$this->load->view('login/login');
	}
	
	public function forget_password()
	{
      
		$redirect	= $this->auth->is_logged_in(false, false);
		if($redirect)
		{
			redirect('admin/dashboard');
		}
		$this->load->helper('form');
		
			
		
		$this->load->view('login/forget-password');
	}


	function login_admin(){
        $validator = array('success' => false, 'messages' => array());
		$username	= $this->input->post('username');
		$password	= $this->input->post('userpassword');
		$remember   = $this->input->post('remember');
		$redirect	= $this->input->post('redirect');
		$login		= $this->users_model->login_admin_byuser($username,$password);
		if ($login){
			
			 $validator['success'] = true;
            	$validator['redirectpage'] = 'pin';
            	$validator['usernameresponse'] = $username;
            	$validator['userpasswordresponse'] = $password;
				$validator['messages'] = 'Login success';
		}
		else
		{
			 $validator['success'] = false;
            	$validator['redirectpage'] = 'login';
				$validator['messages'] = 'Wrong Username or Password!';
		
		}
       echo json_encode($validator);
	}

	function check_pin_no(){
		 $validator = array('success' => false, 'messages' => array());
		$action_type	= $this->input->post('action_type');
		$pin_no	= $this->input->post('pin_no');
		$username	= $this->input->post('username');
		$password	= $this->input->post('userpassword');
		$remember   = $this->input->post('remember');
        if ($action_type=='pinvalidcheck') {
        	$pin_check_res = $this->users_model->login_admin_bypin($username,$pin_no);
        	if ($pin_check_res) {
        		$login		= $this->auth->login_admin($username, $password, $remember);
	        	if ($login) {
	        		$validator['success'] = true;
	            	$validator['redirectpage'] = 'login';
					$validator['messages'] = '';
	        	}else{
	        	 $validator['success'] = false;
	            	$validator['redirectpage'] = 'login';
					$validator['messages'] = 'Wrong Pin!';
	      		}
        	}else{
	        	 $validator['success'] = false;
	            	$validator['redirectpage'] = 'login';
					$validator['messages'] = 'Wrong Pin!';
	      		}
        	
        	
        }else{
        	 $validator['success'] = false;
            	$validator['redirectpage'] = 'login';
				$validator['messages'] = 'Wrong Pin!';
        }
		echo json_encode($validator);

	}

	function logout()
	{
		$this->auth->logout();
		
		//when someone logs out, automatically redirect them to the login page.
		$this->session->set_flashdata('message', 'Log Out');
		redirect('admin/login');
	}
}
