<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upgrade extends CI_Controller {

	protected $page_data;
	protected $logged_in;

	public function __construct()
	{
		parent::__construct();

		/**
		 * Allow ssl(https) secure?
		 *
		 * @uses allow_https(0); https => http
		 * @uses allow_https(1); http => https
		 */
		allow_https(1);

		//Loaded language files
		$this->lang->load(array('global'), 
			$this->session->userdata('site_lang')
			);

		if ($this->session->userdata('logged_in'))
		{
			//If true logged in
			$this->logged_in = true;

			//Session value assign
			$session_data = $this->session->userdata('logged_in');
			$this->page_data['member_id'] = $session_data['id'];
			$this->page_data['member_email'] = $session_data['email'];
			$this->page_data['member_name'] = $session_data['name'];
			$this->page_data['member_surname'] = $session_data['surname'];
			$this->page_data['member_group'] = $session_data['group'];
			$this->page_data['member_group_name'] = $session_data['group_name'];
			$this->page_data['customer_avatar'] = $session_data['avatar'];

			//Loaded model
			$this->load->model('model_site','',true);
			$this->load->model('model_bot','',true);
			
			return true;
		}
		else
		{
			//If not logged in
			$this->logged_in = false;

			//Back to login
			redirect(base_url(), 'refresh');

			return false;
		}
	}

	public function index()
	{
		if ($this->logged_in)
		{
			//Render template
			$this->load->view('price', $this->page_data);

			
		}
	}
}


/* End of file Upgrade.php */
/* Location: ./application/controllers/Upgrade.php */