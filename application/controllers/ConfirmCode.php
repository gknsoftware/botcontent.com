<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConfirmCode extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		//Loaded language files
		$this->lang->load(array('user', 'emailtpl', 'error'), 
			$this->session->userdata('site_lang')
			);

		//Loaded model
		$this->load->model('Model_User','',true);
	}

	public function _remap($parameter)
	{
		$this->index($parameter);
	}

	public function index($memberID)
	{
		$expUrl = explode('-', $memberID);

		$data['member_id'] = substr($memberID, 0, $expUrl[1]);
		$data['member_email'] = $this->Model_User->get_member_email($data['member_id']);
		$data['verify_warning'] = true;
		$data['countdown'] = false;

		$this->load->view('login/confirmCode', $data);
	}

}

/* End of file ConfirmCode.php */
/* Location: ./application/controllers/ConfirmCode.php */