<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	if ( ! function_exists('admin_base_url'))
	{
	    function admin_base_url()
	    {
	        $CI =& get_instance();
	        return $CI->config->config['admin_base_url'];
	    }
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

	function delete_files($path)
	{
		unlink($path);
		return 1;
	}


	function combinations($arrays, $i = 0) {
	    if (!isset($arrays[$i])) {
	        return array();
	    }
	    if ($i == count($arrays) - 1) {
	        return $arrays[$i];
	    }

	    // get combinations from subsequent arrays
	    $tmp = combinations($arrays, $i + 1);

	    $result = array();

	    // concat each array from tmp with each element from $arrays[$i]
	    foreach ($arrays[$i] as $v) {
	        foreach ($tmp as $t) {
	            $result[] = is_array($t) ? 
	                array_merge(array($v), $t) :
	                array($v, $t);
	        }
	    }

	    return $result;
	}

    function compareFloatNumbers($float1, $float2, $operator='=')  {  
	   
	    $epsilon = 0.00001;  
	      
	    $float1 = (float)$float1;  
	    $float2 = (float)$float2;  
	      
	    switch ($operator)  
	    {  
	        /*equal*/  
	        case "=":  
	        case "eq":  
	        {  
	            if (abs($float1 - $float2) < $epsilon) {  
	                return true;  
	            }  
	            break;    
	        }  
	       /* less than*/  
	        case "<":  
	        case "lt":  
	        {  
	            if (abs($float1 - $float2) < $epsilon) {  
	                return false;  
	            }  
	            else  
	            {  
	                if ($float1 < $float2) {  
	                    return true;  
	                }  
	            }  
	            break;    
	        }  
	        /*less than or equal */ 
	        case "<=":  
	        case "lte":  
	        {  
	            if ($this->compareFloatNumbers($float1, $float2, '<') || $this->compareFloatNumbers($float1, $float2, '=')) {  
	                return true;  
	            }  
	            break;    
	        }  
	        /*greater than */ 
	        case ">":  
	        case "gt":  
	        {  
	            if (abs($float1 - $float2) < $epsilon) {  
	                return false;  
	            }  
	            else  
	            {  
	                if ($float1 > $float2) {  
	                    return true;  
	                }  
	            }  
	            break;    
	        }  
	        /* greater than or equal*/  
	        case ">=":  
	        case "gte":  
	        {  
	            if ($this->compareFloatNumbers($float1, $float2, '>') || $this->compareFloatNumbers($float1, $float2, '=')) {  
	                return true;  
	            }  
	            break;    
	        }  
	        case "<>":  
	        case "!=":  
	        case "ne":  
	        {  
	            if (abs($float1 - $float2) > $epsilon) {  
	                return true;  
	            }  
	            break;    
	        }  
	        default:  
	        {  
	            die("Unknown operator '".$operator."' in compareFloatNumbers()");     
	        }  
	    }  
	      
	    return false;  
	}  


	
	function fetch_all_states(){
		$ci = get_instance();
		 $ci->db->order_by('name','ASC');
		
		 $ci->db->where('country_id','101');
		$query = $ci->db->get('states');
		return  $query->result_array();
		
	}
	

	function fetch_all_citiesbystate($state_name){
		$ci = & get_instance();
		$ci->db->from('cities');
		$ci->db->where('city_state',$state_name);
		$ci->db->order_by('city_name','ASC');
		$query = $ci->db->get();
		return $query->result_array();
	}


if(!function_exists('isUrlExists')){
    function isUrlExists($tblName, $urlSlug){
        if(!empty($tblName) && !empty($urlSlug)){
            $ci = & get_instance();
            $ci->db->from($tblName);
            $ci->db->where('title_slug',$urlSlug);
            $rowNum = $ci->db->count_all_results();
            return ($rowNum>0)?true:false;
        }else{
            return true;
        }
    }
}
	

	


	
	
