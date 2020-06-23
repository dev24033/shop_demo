<?php 
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function save($save)
	{
		$this->db->insert('products',$save);
		 return $this->db->insert_id();

	}

	 
	
	function get_all_product()
	{
		$this->db->select('*');	   
		 $this->db->order_by('id','DESC');
		$query = $this->db->get('products');
		return $query->result_array();

	}

	
	function save_product($data = array()) 
	{
        
        $insert = $this->db->insert('products', $data);
        
        //return the status
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }
	
	function get_product_info_by_id($id)
	{
		$this->db->select('*');	   
		 $this->db->where('id',$id); 
		$query = $this->db->get('products');
		return $query->result_array();

	}
	function update_product($save,$id)
	{
			   $this->db->where('id',$id);
		       $this->db->update('products',$save);
	}
	public function multiple_images($image = array())
	{	
		$query =$this->db->insert('products',$image);
	
	}
	function delete_product_($tablename,$id)
	{
			   $this->db->where('id',$id);
		       $this->db->delete($tablename);
	}
}