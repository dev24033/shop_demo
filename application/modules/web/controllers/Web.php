<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class web extends MX_Controller {
    
	public function __construct()
	{
		parent::__construct();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$this->load->library(array('session', 'form_validation','cart'));
		$this->load->helper('cookie');
		$this->load->library('session');
		$this->load->model('web_model');
		
		$this->load->helper(array('captcha', 'string'));
		$this->load->library('email');
		$this->load->helper('cookie');
		
		$config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_crypto' => 'ssl', # Add this
                'smtp_port' => 465,
                'smtpdebug' => 4, 
                'smtp_user' => 'support@digimonk.in',
                'smtp_pass' => 'digimonk@123', 
                'mailtype'  => 'html',
                'charset'   => 'utf-8'
            );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

	}
    
    
    function getRandomWord($len = 8) {
			$word = array_merge(range('0', '9'), range('A', 'Z'));
			shuffle($word);
			return substr(implode($word), 0, $len);
	}
	
	function custom_captcha(){
		
		 $ranStr = $this->getRandomWord();
        $this->session->set_userdata( array('valuecaptchaCode' => $ranStr));
		$height = 35; 
		$width = 150; 
		$font_size = 24; 
		$image_p = imagecreate($width, $height);
		$graybg = imagecolorallocate($image_p, 245, 245, 245);
		$textcolor = imagecolorallocate($image_p, 34, 34, 34);

		imagefttext($image_p, $font_size, -2, 15, 26, $textcolor, 'fonts/mono.ttf', $ranStr);
		imagepng($image_p);
		
	}


		
	function index() 
	{
		$data = array();
		
		//Fetch products from the data base.
		$data['products']= $this->web_model->getRows();
		$data['brand']= $this->web_model->brand();
		$data['storage']= $this->web_model->storage();
		$data['ram']= $this->web_model->ram();
		
		$data['page_title'] = 'Shoping Cart';
	    $data['body_setting'] = '';
		$data['body'] = 'index';
		$this->load->view('template/main', $data);	
		
	}
	function addToCart($proID)
	{
		
		//Fetch special product by ID
		$product = $this->web_model->getRows($proID);
		/* print_r($product);
		exit; */
		// Add product to the cart
		$data = array(
					'id'	=>$product['id'],
					'qty'	=>1,
					'price'	=>$product['price'],
					'name'	=>$product['name'],
					'image'	=>$product['image'],
					);
					$this->cart->insert($data);
					 /* print_r($ints);
					exit;  */
		// Redirect to the cart page
		redirect('cart/');
	}
	
	function cart() 
	{
		$data = array();
        
        //Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();
		/* print_r($data['cartItems']);
		exit; */
		$data['page_title'] = 'Shoping Cart';
	    $data['body_setting'] = '';
		$data['body'] = 'cart';
		$this->load->view('template/main', $data);	
		
		//Load the product list view
		//$this->load->view('cart/index',$data);
	}
	
	 function updateItemQty(){
        $update = 0;
        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        echo $update?'ok':'err';
    }
	
	function removeItem($rowid)
	{
		
        // Remove item from cart
        $remove = $this->cart->remove($rowid);
        
        // Redirect to the cart page
		
        redirect('cart/');
    }
	
	function checkout() 
	{
		//Redirect if the cart is empty
		if($this->cart->total_items()<=0)
		{
			redirect('index');
		}
		$custData = $data = array();
		
		//If order request is submitted
		$submit = $this->input->post('placeOrder');
		if(isset($submit))
		{
			//form field validation rules
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('phone','Phone','required');
			$this->form_validation->set_rules('address','Address','required');
			
			//prepare customer data
			$custData = array(
							'name'		=> strip_tags($this->input->post('name')),
							'email'		=> strip_tags($this->input->post('email')),
							'phone'		=> strip_tags($this->input->post('phone')),
							'address'	=> strip_tags($this->input->post('address')),
			);
			/* print_r($custData);
			exit; */
			//validate submit form data
			if($this->form_validation->run()==true)
			{
				//insert customer data
				$insert=$this->web_model->insertCustomer($custData);
				
				//Check customer data insert status
				if($insert)
				{
					//insert order
					$order = $this->placeOrder($insert);
					
					//if the order submission is successfull
					if($order)
					{
						$this->session->set_userdata('success_msg','Order placed successfully');
						redirect('orderSuccess/'.$order);
					}
					else
					{
						$data['error_msg']= 'Order submission failed please try again...';
					}
				
				}
				else
				{
					$data['error_msg']= 'Some problemes occured, please try again...';
				}
			}
			//redirect('orderSuccess');
		}
		
		//Customer data
		$data['custData'] = $custData;
		
		//retrive cart data from the session
		$data['cartItems'] = $this->cart->contents();
		
		//Pass product data to the view
		$data['page_title'] = 'Shoping Cart';
	    $data['body_setting'] = '';
		$data['body'] = 'checkout';
		$this->load->view('template/main', $data);
		
		//$this->load->view($this->controller.'/index',$data);
	}
	
	function placeOrder($custID)
	{
		//Insert order data
		$ordData = array(
						'customer_id'	=> $custID,
						'grand_total'	=> $this->cart->total(),
		);
		$insertOrder = $this->web_model->insertOrder($ordData);
		if(insertOrder)
		{
			//Retrive card data from the session
			$cartItems = $this->cart->contents();
			
			//Cart items
			$ordItemData = array();
			$i = 0;
			foreach($cartItems as $item)
			{
				$ordItemData[$i]['order_id'] = $insertOrder;
				$ordItemData[$i]['product_id'] = $item['id'];
				$ordItemData[$i]['quantity'] = $item['qty'];
				$ordItemData[$i]['sub_total'] = $item['subtotal'];
				$i++;
				
			}
			if(!empty($ordItemData))
			{
				//Insert order item
				$insertOrderItems = $this->web_model->insertOrderItems($ordItemData);
				if($insertOrderItems)
				{
					//Remove order item from the cart
					$this->cart->destroy();
					//return order ID
					return $insertOrder;
				}
			}
		}
		return false;
	}
	
	function orderSuccess($ordID)
	{
		//Fatch order data from the database
		$data['order1'] = $this->web_model->getOrder($ordID);
		
		//Load order detail view
		$data['page_title'] = 'Shoping Cart';
	    $data['body_setting'] = '';
		$data['body'] = 'order-success';
		$this->load->view('template/main', $data);
		//$this->load->view($this->controller.'/order-success',$data);
	}
	
	function fetch_data()
	{
		//Fatch order data from the database
		//$data['order2'] = $this->web_model->fetch_datam();
		//print_r($data['order2']);
		//exit;
		$query = "
		SELECT * FROM products WHERE status = '1'
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		 AND brand IN('".$brand_filter."')
		";
	}
	if(isset($_POST["ram"]))
	{
		$ram_filter = implode("','", $_POST["ram"]);
		$query .= "
		 AND ram IN('".$ram_filter."')
		";
	}
	if(isset($_POST["storage"]))
	{
		$storage_filter = implode("','", $_POST["storage"]);
		$query .= "
		 AND storage IN('".$storage_filter."')
		";
	}
		$statement =$this->db->query($query);
		
		$result = $statement->result_array();
		$total_row = COUNT($result);
		 /* echo "<pre>";
		print_r($result);
		exit;  */
		$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '
			<div class="col-sm-4 col-lg-4 col-md-4">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:550px;">
					<img src="uploads/product_images/'. $row['image'] .'" alt="" class="img-responsive" >
					<p align="center"><strong><a href="#">'. $row['name'] .'</a></strong></p>
					<h4 style="text-align:center;" class="text-danger" >'. $row['price'] .'</h4>
					<p>Camera : '. $row['camera'].' MP<br />
					Brand : '. $row['brand'] .' <br />
					RAM : '. $row['ram'] .' GB<br />
					Storage : '. $row['storage'] .' GB </p>
					
					<a href="addToCart/'.$row['id'].'" class="btn btn-success" >Add To cart</a>
					
					
					
				</div>

			</div>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
	}
	
}
