<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
    var $CI;

    function __construct()
    {
		$this->CI =& get_instance();
		$this->CI->load->database();
		$this->CI->load->library('encrypt');
		
		$admin_session_config = array(
		    'sess_cookie_name' => 'admin_session_config',
		    'sess_expiration' => 0
		);
		$this->CI->load->library('session', $admin_session_config, 'admin_session');
		
		$this->CI->load->helper('url');
    }
	
	function check_session()
	{
        $admin = $this->CI->session->userdata('admin');
        if(!$admin)
        {
            redirect('admin/login');
        }
	}
    
    function check_access($user_role, $default_redirect=false, $redirect = false)
    {
        
        
        $admin = $this->CI->session->userdata('admin');
        if (!$admin || $admin==0)
        {
            redirect('admin/login');
        }
         
        $this->CI->db->select('user_role');
        $this->CI->db->where('id', $admin['id']);
        $this->CI->db->limit(1);
        $result = $this->CI->db->get('users');
        $result = $result->row();
        
        //result should be an object I was getting odd errors in relation to the object.
        //if $result is an array then the problem is present.
        if(!$result || is_array($result))
        {
            $this->logout();
            return false;
        }
    //  echo $result->access;
        if ($user_role)
        {
            if ($user_role == $result->user_role)
            {
                return true;
            }
            else
            {
                if ($redirect)
                {
                    redirect($redirect);
                }
                elseif($default_redirect)
                {
                    redirect('admin/dashboard/');
                }
                else
                {
                    return false;
                }
            }
            
        }
    }
    
	
    function is_logged_in($redirect = false, $default_redirect = true)
    {
    
       
        $admin = $this->CI->session->userdata('admin');
        
        if (!$admin)
        {
            
            if ($redirect)
            {
                $this->CI->session->set_flashdata('redirect', $redirect);
            }
                
            if ($default_redirect)
            {   
                redirect('admin/login');
            }
            
            return false;
        }
        else
        {
            return true;
        }
    }

    function is_logged_in_user($redirect = false, $default_redirect = true)
    {
    
       
        $user = $this->CI->session->userdata('medplus_user');
        
        if (!$user)
        {
           

            if ($redirect)
            {
                $this->CI->session->set_flashdata('redirect', $redirect);
            }
                
            if ($default_redirect)
            {   
                redirect('/');
            }
            
            return false;
        }
        else
        {
            return true;
        }
    }
    /*
    this function does the logging in.
    */
    function login_admin($username, $password, $remember=false)
    {
        // make sure the username doesn't go into the query as false or 0

        if(!$username)
        {
            return false;
        }
      
        $this->CI->db->select('*');
        $this->CI->db->where('user_name', $username);
        $this->CI->db->where('password',  sha1($password));
        $this->CI->db->where('user_level',  '1');
        $this->CI->db->limit(1);
        $result = $this->CI->db->get('admin');
        $result = $result->row_array();
         
        if (sizeof($result) > 0)
        {
            $admin = array();
            $admin['admin'] = array();
            $admin['admin']['id'] = $result['id'];
            $admin['admin']['name'] = '';
            $admin['admin']['email'] = '';
            $admin['admin']['username'] = $result['user_name'];
            $admin['admin']['user_role'] = $result['user_level'];
            $admin['admin']['image'] = '';
            
            if($remember)
            {
                $loginCred = json_encode(array('username'=>$username, 'password'=>$password));
                /*$loginCred = base64_encode($this->aes256Encrypt($loginCred));*/
                //remember the user for 6 months
                $this->generateCookie($loginCred, strtotime('+6 months'));
            }
            
            $this->CI->session->set_userdata($admin);
            return true;
        }
        else
        {
            return false;
        }
    }

    function login_user($login_email_id, $password,$user_role, $remember=false)
    {
         if(!$login_email_id)
        {
            return false;
        }
      
        $this->CI->db->select('*');
        $this->CI->db->where('phone_number', $login_email_id);
        $this->CI->db->where('new_password',  sha1($password));
        $this->CI->db->where('user_level',  $user_role);
        $this->CI->db->limit(1);
        $result = $this->CI->db->get('users');
        $result = $result->row_array();
         
        if (sizeof($result) > 0)
        {
            $user = array();
            $user['medplus_user'] = array();
            $user['medplus_user']['id'] = $result['id'];
            $user['medplus_user']['username'] = $result['name'];
            $user['medplus_user']['user_role'] = $result['user_level'];
            $user['medplus_user']['phone_number'] = $result['phone_number'];
            
            $user['medplus_user']['email'] = $result['email_address'];
            $user['medplus_user']['password'] = $result['new_password'];
          
            
            if($remember)
            {
                $loginCred = json_encode(array('email'=>$login_email_id, 'password'=>$password));
                $loginCred = base64_encode($this->aes256Encrypt($loginCred));
              
                $this->generateCookieUser($loginCred, strtotime('+6 months'));
            }
            
            $this->CI->session->set_userdata($user);
            return true;
        }
        else
        {
            return false;
        }
    }

    function login_user_custom($login_email_id, $password,$user_role, $remember=false)
    {
         
         if(!$login_email_id)
        {
            return false;
        }
      
        $this->CI->db->select('*');
        $this->CI->db->where('phone_number', $login_email_id);
        $this->CI->db->where('new_password',  $password);
        $this->CI->db->where('user_level',  $user_role);
        $this->CI->db->limit(1);
        $result = $this->CI->db->get('users');
        $result = $result->row_array();
        
        if (sizeof($result) > 0)
        {
            $user = array();
            $user['medplus_user'] = array();
            $user['medplus_user']['id'] = $result['id'];
            $user['medplus_user']['first_name'] = $result['name'];
            $user['medplus_user']['user_role'] = $result['user_level'];
            $user['medplus_user']['phone_number'] = $result['phone_number'];
            
            $user['medplus_user']['email'] = $result['email_address'];
            $user['medplus_user']['password'] = $result['new_password'];
          
            
            if($remember)
            {
                $loginCred = json_encode(array('email'=>$login_email_id, 'password'=>$password));
                $loginCred = base64_encode($this->aes256Encrypt($loginCred));
              
                $this->generateCookieUser($loginCred, strtotime('+6 months'));
            }
            
            $this->CI->session->set_userdata($user);
            return true;
        }
        else
        {
            return false;
        }
    }
    
    private function generateCookie($data, $expire)
    {
       /* setcookie('GoCartAdmin', $data, $expire, '/', $_SERVER['HTTP_HOST']);*/
    }

     private function generateCookieUser($data, $expire)
    {
        /*setcookie('GoCartUser', $data, $expire, '/', $_SERVER['HTTP_HOST']);*/
    }

    private function aes256Encrypt($data)
    {
        $key = config_item('encryption_key');
        if(32 !== strlen($key))
        {
            $key = hash('SHA256', $key, true);
        }
        $padding = 16 - (strlen($data) % 16);
        $data .= str_repeat(chr($padding), $padding);
        return mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
    }

    private function aes256Decrypt($data) {
        $key = config_item('encryption_key');
        if(32 !== strlen($key))
        {
            $key = hash('SHA256', $key, true);
        }
        $data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
        $padding = ord($data[strlen($data) - 1]); 
        return substr($data, 0, -$padding); 
    }

    /*
    this function does the logging out
    */
    function logout()
    {
        $this->CI->session->unset_userdata('admin');
        //force expire the cookie
        $this->generateCookie('[]', time()-3600);
    }

    function logoutUser()
    {
        $this->CI->session->unset_userdata('medplus_user');
        //force expire the cookie
        $this->generateCookieUser('[]', time()-3600);
    }

    /*
    This function resets the admins password and usernames them a copy
    */
    function reset_password($username)
    {
        $admin = $this->get_admin_by_username($username);
        if ($admin)
        {
            $this->CI->load->helper('string');
            $this->CI->load->library('email');
            
            $new_password       = random_string('alnum', 8);
            $admin['password']  = sha1($new_password);
            $this->save_admin($admin);
            
            $this->CI->email->from(config_item('email'), config_item('site_name'));
            $this->CI->email->to($admin['email']);
            $this->CI->email->subject(config_item('site_name').': Admin Password Reset');
            $this->CI->email->message('Your password has been reset to '. $new_password .'.');
            $this->CI->email->send();
            return true;
        }
        else
        {
            return false;
        }
    }
    
    /*
    This function gets the admin by their username address and returns the values in an array
    it is not intended to be called outside this class
    */
    private function get_admin_by_username($username)
    {
        $this->CI->db->select('*');
        $this->CI->db->where('username', $username);
        $this->CI->db->limit(1);
        $result = $this->CI->db->get('admin');
        $result = $result->row_array();

        if (sizeof($result) > 0)
        {
            return $result; 
        }
        else
        {
            return false;
        }
    }
    
    /*
    This function takes admin array and inserts/updates it to the database
    */
    function save($admin)
    {
        if ($admin['id'])
        {
            $this->CI->db->where('id', $admin['id']);
            $this->CI->db->update('user_name', $admin);
        }
        else
        {
            $this->CI->db->insert('user_admin', $admin);
        }
    }
    
    
    /*
    This function gets a complete list of all admin
    */
   
    /*
    This function gets an individual admin
    */
    function get_admin($id)
    {
        $this->CI->db->select('*');
        $this->CI->db->where('id', $id);
        $result = $this->CI->db->get('user_admin');
        $result = $result->row();

        return $result;
    }       
    
    function check_id($str)
    {
        $this->CI->db->select('id');
        $this->CI->db->from('user_admin');
        $this->CI->db->where('id', $str);
        $count = $this->CI->db->count_all_results();
        
        if ($count > 0)
        {
            return true;
        }
        else
        {
            return false;
        }   
    }
    
    function check_username($str, $id=false)
    {
        $this->CI->db->select('username');
        $this->CI->db->from('users');
        $this->CI->db->where('username', $str);
        if ($id)
        {
            $this->CI->db->where('id !=', $id);
        }
        $count = $this->CI->db->count_all_results();
        
        if ($count > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function delete($id)
    {
        if ($this->check_id($id))
        {
            $admin  = $this->get_admin($id);
            $this->CI->db->where('id', $id);
            $this->CI->db->limit(1);
            $this->CI->db->delete('admin');

            return $admin->firstname.' '.$admin->lastname.' has been removed.';
        }
        else
        {
            return 'The admin could not be found.';
        }
    }
}