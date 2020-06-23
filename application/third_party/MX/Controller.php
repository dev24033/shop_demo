<?php (defined('BASEPATH')) OR exit('No direct script access allowed');



/** load the CI class for Modular Extensions **/

require dirname(__FILE__).'/Base.php';



/**

 * Modular Extensions - HMVC

 *

 * Adapted from the CodeIgniter Core Classes

 * @link	http://codeigniter.com

 *

 * Description:

 * This library replaces the CodeIgniter Controller class

 * and adds features allowing use of modules and the HMVC design pattern.

 *

 * Install this file as application/third_party/MX/Controller.php

 *

 * @copyright	Copyright (c) 2015 Wiredesignz

 * @version 	5.5

 * 

 * Permission is hereby granted, free of charge, to any person obtaining a copy

 * of this software and associated documentation files (the "Software"), to deal

 * in the Software without restriction, including without limitation the rights

 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell

 * copies of the Software, and to permit persons to whom the Software is

 * furnished to do so, subject to the following conditions:

 * 

 * The above copyright notice and this permission notice shall be included in

 * all copies or substantial portions of the Software.

 * 

 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR

 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,

 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE

 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER

 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,

 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN

 * THE SOFTWARE.

 **/

class MX_Controller 

{

	public $autoload = array();

	

	public function __construct() 

	{

		$class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));

		log_message('debug', $class." MX_Controller Initialized");

		Modules::$registry[strtolower($class)] = $this;	

		

		/* copy a loader instance and initialize */

		$this->load = clone load_class('Loader');

		$this->load->initialize($this);	

		

		/* autoload module items */

		$this->load->_autoloader($this->autoload);

	}

	

	public function __get($class) 

	{

		return CI::$APP->$class;

	}

	

	public function getdatefun()

	{	

		$timezone_offset_minutes = $_COOKIE['datetime'];

		$timezone_name = timezone_name_from_abbr("", $timezone_offset_minutes*60, false);

		date_default_timezone_set($timezone_name);

		$date = date('Y-m-d');

		

		return $date;

	}

	

	public function getdatetimefun()

	{	

		$timezone_offset_minutes = $_COOKIE['datetime'];

		$timezone_name = timezone_name_from_abbr("", $timezone_offset_minutes*60, false);

		date_default_timezone_set($timezone_name);

		$date = date('Y-m-d H:i:s');

		return $date;

	}

	

	/*public function check_email($email) {

		$this->load->model('admin_model');

		$checkusername = $this->web_model->validlogin($email);

		 if(empty($checkusername)) {

			$this->form_validation->set_message(__FUNCTION__, 'Username does not exists!');

			return FALSE;

		 } else {

			 return TRUE;

		 }

	}*/

	

	public function check_user_email($email) {

		$this->load->model('web_model');

		$checkexist = $this->web_model->checkemailexist($email);

		 if($checkexist) {

			$this->form_validation->set_message(__FUNCTION__, 'Email Id already exist!');

			return FALSE;

		 } else {

			 return TRUE;

		 }

	}

	

	

	

	public function emailtemplates($name,$message) {

		$data = array('name'=>$name,'message'=>$message);

		$content = $this->load->view('email', $data, true);

	}

	

	public function mailfun($to,$subject,$msg) {

		$this->load->library('email'); 

		$from_email = "no_reply@synram.com";

		$to_email = $toemail; 

		$this->email->from($from_email, 'Synram'); 

		$this->email->to($to_email);

		$this->email->subject($subject); 

		$this->email->message($content); 

		$this->email->set_mailtype('html');

		$mail = $this->email->send();

	}

	

	function generateRandomString($length = 2) {

		return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);

	}

	

	function sendresetpasswordmail($toemail) {

		if(empty($toemail)) {

			return;

		}

		$checkexist = $this->user_model->usercheck($toemail);

		if(count($checkexist) > 0) {		

			$resetcode = md5(rand(0, 100000)).md5($this->generateRandomString());

			$data = array('reset_code'=>$resetcode);

			$update = $this->user_model->UpdateResetCode($toemail,$data);

		}

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



}

