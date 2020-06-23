<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	function test() {
		echo "hello";
	}
	
	function isLoggedIn() {
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        $is_logged_in = $this->session->userdata('logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== TRUE) {
            redirect('/login');
            exit;
        }
    }
	
	function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	
	function cvf_convert_object_to_array($data) {

		if (is_object($data)) {
			$data = get_object_vars($data);
		}

		if (is_array($data)) {
			return array_map(__FUNCTION__, $data);
		}
		else {
			return $data;
		}
	}

	function menu_options($id,$count,$sel_id) {
			$this->load->model('category_model');
			//$result=mysqli_query($con,"select * from category where parent_id='$id' and status != 1");
			echo 'hi'; die;
			$getcategorymenu = $this->category_model->getcategorymenu($id);
			print_r($getcategorymenu); die;
	        if(count($getcategorymenu)>0)
			{
				
				while($row=mysqli_fetch_array($result)) {
					$var="";
					$li_id = $row['categoryID'];
					$menu_name = $row['name'];
					for($i=1;$i<=$count;$i++)
					{
						$menu_name = "- ".$menu_name;
					}
			
				if($sel_id==$li_id)
				{
					echo "<option value='$li_id' selected='selected'>".$menu_name."</option>";
				}
				else
				{
					echo "<option value='$li_id'>".$menu_name."</option>";
				}
			
		    menu_options($li_id,$count+1,$sel_id);	
			
	        }
			
			}
	
            }
	
