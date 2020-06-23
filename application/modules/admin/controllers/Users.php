<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends MX_Controller {

	public function __construct()

	{

		parent::__construct();

		$this->auth->check_session();
		$this->load->model('users_model');	
		$this->load->helper('vs_function');
	}


	

	function index() {
        
        $redirect	= $this->auth->is_logged_in(false, false);
		if($redirect)
		{
			redirect('admin/login');
		}

		
	}

	function ngo() {
        
        $redirect	= $this->auth->is_logged_in(false, false);
		if(!$redirect)
		{
			redirect('admin/login');
		}

		$admin = $this->session->userdata('admin');
		$data['userdata'] = $admin;
		$data['allcustomer'] = $this->users_model->get_all_user_by_type('NGO');
		$data['all_active_customer'] = $this->users_model->get_all_active_user_by_type('NGO');
		$data['all_inactive_customer'] = $this->users_model->get_all_inactive_user_by_type('NGO');
		$data['page_title'] = 'Social heroes ngo';
		$data['body'] = 'ngo-list';
		/*$data['iconstyleclass'] = 'sidebar-icon-only';*/
		$this->load->view('template/main', $data);	
	}
	
	function voluntariado() {
        
        $redirect	= $this->auth->is_logged_in(false, false);
		if(!$redirect)
		{
			redirect('admin/login');
		}

		$admin = $this->session->userdata('admin');
		$data['userdata'] = $admin;
		$data['allcustomer'] = $this->users_model->get_all_user_by_type('Voluntaria');
		$data['all_active_customer'] = $this->users_model->get_all_active_user_by_type('Voluntaria');
		$data['all_inactive_customer'] = $this->users_model->get_all_inactive_user_by_type('Voluntaria');
		$data['page_title'] = 'Social heroes voluntariado ';
		$data['body'] = 'voluntariado-list';
		/*$data['iconstyleclass'] = 'sidebar-icon-only';*/
		$this->load->view('template/main', $data);	
	}

	function edit_user($uid) {
        $redirect	= $this->auth->is_logged_in(false, false);
		if(!$redirect)
		{
			redirect('admin/login');
		}
		$admin = $this->session->userdata('admin');
		
		$data['uid'] = $uid;
		$data['customerdata'] = $this->users_model->get_detail_uid($uid);
		$data['customerddata'] = $this->users_model->check_cust_profile_data($uid);
		
		$data['userdata'] = $admin;
		$data['page_title'] = 'Social heroes List';
		$data['body'] = 'edit-user';
		$this->load->view('template/main', $data);	
	}
	

     
	function user_status_update(){
    	$action_type = $this->input->post('action_type');
		$catstatusid = $this->input->post('catstatusid');
		$catstatus = $this->input->post('catstatus');
		
		$admin = $this->session->userdata('admin');
	
		if($action_type=='update'){
			if($catstatus == '1')
		        {
		             $update_catdata = array('status'=>0);
		        }
		        else
		        {
		            $update_catdata = array('status'=>1);
		        }
          
           $query = $this->users_model->update_user_status($update_catdata,$catstatusid);
           if(true) {
				echo 'true';
			} else {
				echo 'false';
			}
		}else {
				echo 'false';
			}
    }
	
	
	function verifyid($userid){
		
    	$action_type = 'update';
		$catstatusid = $userid;
		$catstatus = '0';
		
		$admin = $this->session->userdata('admin');
	
		if($action_type=='update'){
			if($catstatus == '1')
		        {
		             $update_catdata = array('status'=>0);
		        }
		        else
		        {
		            $update_catdata = array('status'=>1);
		        }
          
           $query = $this->users_model->update_user_status($update_catdata,$catstatusid);
           if(true) {
				echo 'true';
					redirect('admin/users/ngo');
			} else {
				echo 'false';
			}
		}else {
				echo 'false';
			}
    }
	
	
	
	public function change_password()
	{
		$redirect	= $this->auth->is_logged_in(false, false);
		if(!$redirect)
		{
			redirect('admin/login');
		}
		
			$data['page_title'] = 'Social Hero';
			$data['body_setting'] = '';
			$data['body'] = 'change-password';
		
		
			$this->load->view('template/main', $data);			
		//$this->load->view("ong/change-password");
	}
	
	public function update_user_password()
	{
		$redirect	= $this->auth->is_logged_in(false, false);
		if(!$redirect)
		{
			redirect('admin/login');
		}

		$admin = $this->session->userdata('admin');
	
			       $pwd=$this->input->post("pwd"); 
			       $npwd=$this->input->post("newpwd"); 
				  //$adminuser=$this->input->post("adminuser"); 
			 
				  $checkpwd =sha1($pwd);
				  
					$results = $this->users_model->check_user_password($checkpwd,$admin['id']);
					//echo count($results);
					
					 if(count($results) >0 ){
						
						$updatepwd=array(
								 "password"=>sha1($npwd), 
								 //"opwd"=>$npwd, 
								 );
								$user = $this->users_model->update_user_password($updatepwd,$admin['id']);
								
						echo '1';
					}
					else {
						echo '0';
					} 
	}			
	
	public function manage_settings()
	{
		$redirect	= $this->auth->is_logged_in(false, false);
		if(!$redirect)
		{
			redirect('admin/login');
		}
		
			$data['page_title'] = 'Social Hero';
			$data['body_setting'] = '';
			$data['body'] = 'manage-settings';
			$data['data'] = $this->users_model->get_all_blog();
			$data['viewdata'] = $this->users_model->get_all($id);
		
			$this->load->view('template/main', $data);			
		//$this->load->view("ong/change-password");
	}
		

function update_blog()
{
	// var_dump($this->input->post());
	 $config['upload_path']   = FCPATH.'assets/site/images'; 
$config['allowed_types'] = 'gif|jpg|png|jpeg';
$this->load->library('upload', $config);
$this->upload->initialize($config);

if(!$this->upload->do_upload('img'))  
{  

		$this->session->set_flashdata("alert", strip_tags($this->upload->display_errors()." ".$config['upload_path'])); 
            $this->load->library("user_agent");
}  
else  
{  
$data = $this->upload->data();  
$image = $data["file_name"];  
} 	

		$company_name = $this->input->post('company_name');
		$email_id = $this->input->post('email_id');
		$phone_number = $this->input->post('phone_number');
		$id = $this->input->post('blog_id');
		$address = $this->input->post('address');
	

if($image == NULL)
{
	$save = array (

          'company_name' => $company_name, 
          'Email_id' => $email_id, 
          'phone_number' =>$phone_number , 
          'address' => $address
         
         
		);
}
else
{
		$save = array (

          'company_name' => $company_name, 
          'Email_id' => $email_id, 
          'phone_number' =>$phone_number , 
          'address' => $address,
          'company_logo' => $image, 
          
		);
		// var_dump($resume_file);
		
}
		
		

     $query = $this->users_model->updateproduct($save);
// var_dump($this->db->last_query());
          
           if($query) {
			$this->session->set_flashdata('success' , 'Data  Successfully Updated');
            redirect(base_url() . 'admin/users/manage-settings', 'refresh');
			} else {
				$this->session->set_flashdata('success' , 'Data  Successfully Updated');
            redirect(base_url() . 'admin/users/manage-settings', 'refresh');
			}	

		}
	
	function update_base()
	{
	

		$base_point1 = $this->input->post('base_point1');
		$base_point2 = $this->input->post('base_point2');
		
		$id = $this->input->post('blog_id');
		
	


	$save = array (

          'base_point1' => $base_point1, 
          'base_point2' => $base_point2, 
          
         
         
		);

		
		

     $query = $this->users_model->updateproduct($save);
// var_dump($this->db->last_query());
          
           if($query) {
			$this->session->set_flashdata('success' , 'Data  Successfully Updated');
            redirect(base_url() . 'admin/users/manage-settings', 'refresh');
			} else {
				$this->session->set_flashdata('success' , 'Data  Successfully Updated');
            redirect(base_url() . 'admin/users/manage-settings', 'refresh');
			}	

	}
	
	
}