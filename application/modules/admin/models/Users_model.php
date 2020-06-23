<?php 
if( ! defined('BASEPATH')) exit('No direct script access allowed');


class users_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	

	function login_admin_byuser($username,$password){
         $this->db->where('user_name',$username);
         $this->db->where('password',sha1($password));
		$query = $this->db->get('admin');
		return $query->row();
	}

	function login_admin_bypin($username,$pin){
         $this->db->where('user_name',$username);
         $this->db->where('pin_no',$pin);
		$query = $this->db->get('admin');
		return $query->row();
	}
	
	function get_all_user_by_type($type)
	{
			   $this->db->select('*');
		$this->db->order_by('id','desc');
				$this->db->Where('user_type',$type);
				$query = $this->db->get('social_hero_user');

				return $query->result_array();
	}
	
	function get_all_active_user_by_type($type)
	{
			    $this->db->select('*');
				$this->db->Where('user_type',$type);
				$this->db->where('status','1');	 
				$query = $this->db->get('social_hero_user');

				return $query->result_array();
	}
	
	function get_all_inactive_user_by_type($type)
	{
			    $this->db->select('*');
				$this->db->Where('user_type',$type);
				$this->db->where('status','0');	 
				$query = $this->db->get('social_hero_user');

				return $query->result_array();
	}
	
	function get_detail_uid($id)
	{
			    $this->db->select('*');
				$this->db->Where('id',$id);
				$query = $this->db->get('social_hero_user');

				return $query->result_array();
	}
	
	function check_cust_profile_data($uid)
	{
		
			$this->db->select('*');
		    $this->db->where('id',$uid);
		    $this->db->from('social_hero_user');
		   
		    $query = $this->db->get(); 
		    return $query->result_array();
	}

	function update_user_status($save,$id)
	{
			   $this->db->where('id',$id);
		       $this->db->update('social_hero_user',$save);
	}
	
	function count_apply_activity_by_uid($uid)
	{
		
			$this->db->select('*');
		    $this->db->where('uid',$uid);
		    $this->db->where('status','1');
		    $this->db->from('social_hero_apply_activity');
		   
		    $query = $this->db->get(); 
		    return $query->result_array();
	}
	
	function get_activity_info($id)
	{
		$this->db->select('*');	   
		 $this->db->where('id',$id); 
		$query = $this->db->get('social_hero_add_activity');
		return $query->result_array();

	}

function get_category_by_id($id)
	{
		$this->db->select('*');	   
		 $this->db->where('id',$id);   
		 $this->db->where('status','1');
		$query = $this->db->get('social_hero_category');
		return $query->result_array();

	}
	
	function get_statesbyid($id)
	{
		$this->db->select('*');	  
		$this->db->Where('id',$id);
		$query = $this->db->get('states');
		return $query->result_array();
	}
	
		
	function get_user_apply_activity_list($uid)
	{
		$this->db->select('*');	   
		$this->db->Where('uid',$uid); 
		$query = $this->db->get('social_hero_apply_activity');
		return $query->result_array();
	}
	
	
	function get_ngo_user_apply_activity_list($uid)
	{
		$this->db->select('*');	   
		$this->db->Where('activity_uid',$uid); 
		$query = $this->db->get('social_hero_apply_activity');
		return $query->result_array();
	}

	
	function check_user_password($userpassword,$id)
	{
			    $this->db->select('*');
				$this->db->Where('id',$id);
				$this->db->Where('password',$userpassword);
				$query = $this->db->get('admin');

				return $query->result_array();
	}
	
	function update_user_password($save,$id)
	{
			   $this->db->where('id',$id);
		       $this->db->update('admin',$save);
	}
	
	function get_all_blog()
	{

		$this->db->select('*');	  
		 $this->db->order_by('id','DESC');
		$query = $this->db->get('company_info');
		return $query->result_array();

	}
	function get_all()
	{

		$fethc_qu = $this->db->query("SELECT * FROM company_info");
		$erer =  $fethc_qu ->row_array();

		return $erer;
	}
	
	function updateproduct($save)
	{
			   //$this->db->where('id',$id);
		       $this->db->update('company_info',$save);
	}
	
}