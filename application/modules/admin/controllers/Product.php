		<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class product extends MX_Controller {
	public function __construct()
	{
		parent::__construct();
		 $this->auth->check_session();
		$this->load->library(array('session', 'form_validation'));
		$this->load->model("product_model");  
		//$this->load->library('upload'); 
		$this->load->helper('url');
	}
	
	function index() 
	{
        $redirect	= $this->auth->is_logged_in(false, false);
		if(!$redirect)
		{
			redirect('admin/login');
		}
		$admin = $this->session->userdata('admin');
		
		$data['userdata'] = $admin;
		//$data['statesdata'] = $this->product_model->get_statesbycid('205');
		//$data['categorydata'] = $this->product_model->get_all_category();
		//$data['get_all_ngo'] = $this->product_model->get_all_ngo();
		$data['page_title'] = 'product';
		$data['body'] = 'product-list';
		$data['data'] = $this->product_model->get_all_product();
		$this->load->view('template/main', $data);	
	}

	function edit_product($param='',$param1='') {
		
        $redirect	= $this->auth->is_logged_in(false, false);
		if(!$redirect)
		{
			redirect('admin/login');
		}
		$admin = $this->session->userdata('admin');
		
		$data['userdata'] = $admin;
		
		$data['productdata'] = $this->product_model->get_product_info_by_id($param);
		$data['page_title'] = 'product';
		$data['body'] = 'edit-product';
		$data['data'] = $this->product_model->get_all_product();
		$this->load->view('template/main', $data);	
	}


	function product_status_update(){
		
		$redirect	= $this->auth->is_logged_in(false, false);
		if(!$redirect)
		{
			redirect('admin/login');
		}
		else{
    	$action_type = $this->input->post('action_type');
		$catstatusid = $this->input->post('catstatusid');
		$catstatus = $this->input->post('catstatus');
		 
		if($action_type=='update'){
			if($catstatus == '1')
		        {
		             $update_product = array('status'=>0);
		        }
		        else
		        {
		            $update_product = array('status'=>1);
		        }
          
           $query = $this->product_model->update_product($update_product,$catstatusid);
           if(true) {
				echo 'true';
			} else {
				echo 'false';
			}
		}
		else {
				echo 'false';
			}
		}
    }


	function add_product()
	{
      
		$data = array();
        $userData = array();
        $data = array();
		date_default_timezone_set('Asia/Calcutta');
		$reg_date = date('Y-m-d h:i A');
         
		$redirect	= $this->auth->is_logged_in(false, false);
		if(!$redirect)
		{
			redirect('admin/login');
		}
		else{
			
        $product_name = $this->input->post('product_name'); 
		$camera = $this->input->post('camera'); 
		$brand = $this->input->post('brand'); 
		$ram = $this->input->post('ram'); 
		$storage = $this->input->post('storage'); 
		$price =  $this->input->post('price'); 
			
		
		
						$config['upload_path'] = 'uploads/product_images/';
				        $config['allowed_types'] = 'jpg|gif|png|jpeg|JPEG|JPG|PNG'; 
				        $config['max_size'] = 1024 * 8;
				        //$config['encrypt_name'] = TRUE;
				 
				        $this->load->library('upload', $config);
						if ( ! $this->upload->do_upload('thumbnail')) {
				          $emp_in_image=$this->upload->display_errors();
						  $imagename='logo.png';
				         }else { 
				            $data = array('upload_data' => $this->upload->data());
							
							$this->_create_thumbs_product($data['upload_data']['file_name']);
							
	                         $imagename = $data['upload_data']['file_name']; 
							 						 
				        }
						
        			
			$updateuserData = array(
						'image'  => $imagename,
						'name' => $product_name,
						'camera' => $camera,
						'brand' => $brand,
						'ram' => $ram,
						'storage' => $storage,
						'price' => $price, 
						'created' => $reg_date,
						'modified' => $reg_date,
						'status' => '1', 
                    );
			$update = $this->product_model->save_product($updateuserData);	
        	 
					 
			   
				
										
			$validator['success'] = true;
			$validator['messages'] = 'Successfully';			
			
			echo json_encode($validator);    
		}
}
function update_product()
	{
		
		$redirect	= $this->auth->is_logged_in(false, false);
		if(!$redirect)
		{
			redirect('admin/login');
		}
		else{
			
				$data = array();
				$userData = array();
				$data = array();
				date_default_timezone_set('Asia/Calcutta');
				$reg_date = date('Y-m-d h:i A');
				 
				 
				$product_name = $this->input->post('product_name'); 
				$camera = $this->input->post('camera'); 
				$brand = $this->input->post('brand'); 
				$ram = $this->input->post('ram'); 
				$storage = $this->input->post('storage');  
				$price =  $this->input->post('price'); 
				
				$productid =  $this->input->post('productid'); 
				$productimg =  $this->input->post('productimg'); 
				
				
				
					
					
						$config['upload_path'] = 'uploads/product_images/';
				        $config['allowed_types'] = 'jpg|gif|png|jpeg|JPEG|JPG|PNG'; 
				        $config['max_size'] = 1024 * 8;
				        //$config['encrypt_name'] = TRUE;
				 
				        $this->load->library('upload', $config);
						if ( ! $this->upload->do_upload('thumbnail')) {
				          $emp_in_image=$this->upload->display_errors();
						 // $imagename='logo.png';
				         }else 
						 { 
				            $data = array('upload_data' => $this->upload->data());
							
							$this->_create_thumbs_product($data['upload_data']['file_name']);
							
	                         $imagename = $data['upload_data']['file_name']; 
							 						 
				        }
				 	
				if($imagename == null)
				{
					$updateproductData = array( 
								'name' => $product_name,
								'camera' => $camera,
								'brand' => $brand,
								'ram' => $ram,
								'storage' => $storage,
								'price' => $price,  
								'modified' => $reg_date,
								'status' => '1', 
							);
				}
				else
				{
				 $updateproductData = array(
								'image'  => $imagename,
								'name' => $product_name,
								'camera' => $camera,
								'brand' => $brand,
								'ram' => $ram,
								'storage' => $storage,
								'price' => $price,  
								'modified' => $reg_date,
								'status' => '1', 
								  );
				}  	
				 $update = $this->product_model->update_product($updateproductData,$productid);	
				 
											
				$validator['success'] = true;
				$validator['messages'] = 'Successfully';			
				
				echo json_encode($validator);    
		}
}

function _create_thumbs_product($file_name)
	{
        // Image resizing config
        $config = array(
            // Large Image
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/site/images/productimage/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 780,
                'height'        => 500,
                'new_image'     => './assets/site/images/productimage/large/'.$file_name
                ),
            // Medium Image
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/site/images/productimage/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 480,
                'height'        => 230,
                'new_image'     => './assets/site/images/productimage/medium/'.$file_name
                ),
            // Small Image
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/site/images/productimage/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 240,
                'height'        => 230,
                'new_image'     => './assets/site/images/productimage/small/'.$file_name
            ));

        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item){
            $this->image_lib->initialize($item);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        }
}
  

 function remove_productid(){

    	$action_type = $this->input->post('action_type');
		$catid = $this->input->post('catid');
		if ($action_type =='remove') {
			 
				 
               $query = $this->product_model->delete_product_('products',$catid);
		           if($query) {

						echo "Deactive";
					} else {
						echo 'false';
					}
			 
			
			
		} else {
			echo 'false';
		}

    }

	
}