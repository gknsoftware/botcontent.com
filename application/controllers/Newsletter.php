<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Controller {

	public $base_path = 'http://www.weboti.com/';

	public function __construct()
	{
		parent::__construct();

		//Loaded language files
		$this->lang->load(array('emailtpl'), 
			$this->session->userdata('site_lang')
			);

		//Loaded model
		$this->load->model('Model_User','',true);
	}

	public function _remap($param1, $param2)
	{
		$this->index($param1, $param2);
	}

	public function index($newsletter, $memberID)
	{
		switch ($this->encrypt->decode($newsletter)) {
			case 'forgotpassword':
				//Member data
				$email = $this->Model_User->get_member_email( $this->encrypt->decode($memberID[0]) );

				//E-Mail template variables
				$data = array(
					'base_path' => $this->base_path,
					'user_id' => $this->encrypt->decode($memberID[0]),
					'user_name' => $this->Model_User->get_customer_info($this->Model_User->get_member_id($email), 'customer_name'),
					'user_email' => $email
					);

				//Render email template
				$this->load->view('email/forgotpassword',$data);
				break;

			case 'confirmcode':
				//Member data
				$email = $this->Model_User->get_member_email( $this->encrypt->decode($memberID[0]) );

				//E-Mail template variables
				$data = array(
					'base_path' => $this->base_path,
					'user_id' => $this->encrypt->decode($memberID[0]),
					'user_name' => $this->Model_User->get_customer_info($this->Model_User->get_member_id($email), 'customer_name'),
					'user_email' => $email,
					'user_password' => '*********',
					'verify_code' => $this->Model_User->get_member_valid_code($memberID[0])
					);

				//Render email template
				$this->load->view('email/confirmcode',$data);
				break;
			
			default:
				return false;
				break;
		}
	}

}

/* End of file Newsletter.php */
/* Location: ./application/controllers/Newsletter.php */