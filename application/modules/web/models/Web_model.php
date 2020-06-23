<?php 
if( ! defined('BASEPATH')) exit('No direct script access allowed');


class web_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->proTable = 'products';
		$this->custTable = 'customers';
		$this->ordTable = 'orders';
		$this->ordItemsTable = 'order_items';
        $this->primaryKey = 'id';
	}
	public function getRows($id='')
	{
		$this->db->select('*');
		$this->db->from($this->proTable);
		$this->db->where('status','1');
		if($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get();
			$result = $query->row_array(); 
			//echo "<pre>";
			//print_r($result);          //debugging
		}
		else
		{
			$this->db->order_by('name','asc');
			$query = $this->db->get();
			$result = $query->result_array(); 	
		}
		// return fetch data
		return !empty($result)?$result:false;	
	}
	
	public function getOrder($id)
	{
		$this->db->select('o.*,c.name,c.email,c.phone,c.address');
		$this->db->from($this->ordTable.' as o');
		$this->db->join($this->custTable.' as c','c.id=o.customer_id','left');
		$this->db->where('o.id',$id);
		
		$query = $this->db->get();
		$result = $query->row_array();
		
		//Get order item
		$this->db->select('i.*,p.image,p.name,p.price');
		$this->db->from($this->ordItemsTable.' as i');
		$this->db->join($this->proTable.' as p','p.id = i.product_id','left');
		$this->db->where('i.order_id',$id);
		$query2 = $this->db->get();
		$result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
		// return fetch data
		return !empty($result)?$result:false;	
	}
	
	public function insertCustomer($data)
	{
		//Add created and modified date if not included
		if(!array_key_exists("created",$data))
		{
			$data['created'] = date("Y-m-d H:i:s");
		}
		if(!array_key_exists("modified",$data))
		{
			$data['modified'] = date("Y-m-d H:i:s");
		}
		
		//Inser customers data
		$insert = $this->db->insert($this->custTable,$data);
		
		//Return the status
		return $insert?$this->db->insert_id():false;
	}
	
	public function insertOrder($data)
	{
		//Add created and modified date if not included
		if(!array_key_exists("created",$data))
		{
			$data['created'] = date("Y-m-d H:i:s");
		}
		if(!array_key_exists("modified",$data))
		{
			$data['modified'] = date("Y-m-d H:i:s");
		}
		
		//Inser customers data
		$insert = $this->db->insert($this->ordTable,$data);
		
		//Return the status
		return $insert?$this->db->insert_id():false;
	}
	
	public function insertOrderItems($data = array())
	{
		//Inser order items
		$insert = $this->db->insert_batch($this->ordItemsTable,$data);
		
		//Return the status
		return $insert?true:false;
	}
	
	function brand()
	{
		$this->db->select('*');
		$this->db->from($this->proTable);
		$this->db->where('status','1');
		$this->db->group_by('brand');
		$query = $this->db->get();
		$result = $query->result_array(); 
			
		// return fetch data
		return !empty($result)?$result:false;
	} 
	function ram()
	{
		$this->db->select('*');
		$this->db->from($this->proTable);
		$this->db->where('status','1');
		$this->db->group_by('ram');
		$query = $this->db->get();
		$result = $query->result_array(); 
			
		// return fetch data
		return !empty($result)?$result:false;
	} 
	function storage()
	{
		$this->db->select('*');
		$this->db->from($this->proTable);
		$this->db->where('status','1');
		$this->db->group_by('storage');
		$query = $this->db->get();
		$result = $query->result_array(); 
			
		// return fetch data
		return !empty($result)?$result:false;
	}

	function get_total_rows()
	{
		$this->db->select('*');
		$this->db->from('tbl_poll');
		$query = $this->db->get();
		$result = $query->result_array(); 
		return COUNT($result);
	}
	
	/* function total_row()
	{
		$query = "select * from tbl_poll where php_framework = '".$row."'";
		$statement =$this->db->query($query);
		$result = $statement->result_array();
		return COUNT($result);
	} */
	
	public function insertPoll($data)
	{	
		//Inser customers data
		//$this->db->set($data);
		$this->db->insert('tbl_poll',$data);
		
		//Return the status
		
	}
}