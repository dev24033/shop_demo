<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class poll extends MX_Controller {
    
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
		//$data['products']= $this->web_model->getRows();
		//$data['brand']= $this->web_model->brand();
	
		
		$data['page_title'] = 'Poll system';
	    $data['body_setting'] = '';
		$data['body'] = 'poll_system/poll_system';
		$this->load->view('template/main', $data);	
	}
	
	function fetch_poll_data()
	{
		$php_framework = array("Laravel","CodeIgniter","CakePHP","Symfony","Phalcon");
		$total_poll_row = $this->web_model->get_total_rows();

		$output = '';
		if($total_poll_row > 0)
		{
			foreach($php_framework as $row)
			{
				$query = "select * from tbl_poll where php_framework = '".$row."'";
				$statement =$this->db->query($query);
				$result = $statement->result_array();
				$total_row = COUNT($result);
				//$total_row = $this->web_model->total_row();
		
				$percentage_vote = round(($total_row/$total_poll_row)*100);
				$progress_bar_class ='';
				if($percentage_vote >= 40)
				{
					$progress_bar_class ="progress-bar-success";
				}
				else if($percentage_vote >= 25 && $percentage_vote<40)
				{
					$progress_bar_class ="progress-bar-info";
				}
				else if($percentage_vote >= 10 && $percentage_vote<25)
				{
					$progress_bar_class ="progress-bar-warning";
				}
				else
				{
				$progress_bar_class ="progress-bar-danger";
				}
				$output .='
				<div class="row">
				<div class="col-md-2" align="right">
				<label>'.$row.'</label>
				</div>
				<div class="col-md-10">
				<div class="progress">
					<div class="progress-bar '.$progress_bar_class.'" roll="progressbar" aria-valuenow="'.$percentage_vote.'" aria-valuemin="0" aria-valuemax="100" style ="width:'.$percentage_vote.'%">
					'.$percentage_vote.' % Programmer like <b>'.$row.'</b> PHP Framework
					</div>
					</div>
				</div>
				</div>
				';
			}
		}
	echo $output;
	}
	
	function poll_insert()
	{
		$poll_option = $this->input->post('poll_option');
		
		$data = array(
			'php_framework'	=> $poll_option,
		);
		//$this->db->insert('tbl_poll', $data);
		$this->web_model->insertPoll($data);
		redirect('poll');
	}
		
}
?>