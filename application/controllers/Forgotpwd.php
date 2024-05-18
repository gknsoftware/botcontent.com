<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpwd extends CI_Controller {

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
		$this->lang->load(array('user', 'emailtpl', 'error'), 
			$this->session->userdata('site_lang')
			);
		
		if ($this->session->userdata('logged_in'))
		{
			return $this->logged_in = true;
		}
		else
		{
			//Loaded model
			$this->load->model('Model_User','',true);

			return $this->logged_in = false;
		}
	}

	public function index()
	{
		if ( ! $this->logged_in )
		{
			//To assign a rule
			$this->form_validation->set_rules('email', 'e-posta adresi', 'trim|required|valid_email|callback_send_reset_link');

			//Assign a message
			$this->form_validation->set_message('required', $this->lang->line('lang_ci_valid_required'));
			$this->form_validation->set_message('valid_email', $this->lang->line('lang_ci_valid_email'));

			if($this->form_validation->run() == false)
			{
				//Field validation failed. User redirected to login page
				$data['success'] = false;
				$this->load->view('login/forgotPwd', $data);
			}
			else
			{
				//Go to success area
				$data['success'] = true;
				$this->load->view('login/forgotPwd', $data);
			}
		}
		else
		{
			redirect(route('home'),'refresh');
		}
	}

	public function send_reset_link($email)
	{
		//Field validation succeeded. Validate against database
		$email = $this->input->post('email');
		$memberID = $this->Model_User->get_member_id($email);

		if ($memberID) {
			//E-Mail template variables
			$data = array(
				'base_path' => 'http://www.weboti.com/',
				'user_id' => $memberID,
				'user_name' => $this->Model_User->get_member_info($memberID, 'member_name'),
				'user_email' => $email
				);

			//E-mail parameters
			$param = array(
				'from' => array('no-reply@weboti.com', 'Weboti'), 
				'to' => $email,
				'subject' => $this->lang->line('lang_etpl_fpass_subject'),
				'message' => $this->load->view('email/forgotPassword',$data,true)
				);

			send_email($param); // send confirm code

			if (!$this->Model_User->token_exists($memberID)) //if not reg token
			{
				//register token
				$this->Model_User->reg_token($memberID, $email);
			}
		}else{
			$this->form_validation->set_message('send_reset_link', $this->lang->line('lang_cpass_nosuchemail'));
			return false;
		}
	}

	public function newpwd($memberID)
	{
		if ( ! $this->logged_in )
		{
			//To assign a rule
			$this->form_validation->set_rules('password', 'şifre', 'trim|required|min_length[8]|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'şifre doğrulama', 'trim|required');

			//Assign a message
			$this->form_validation->set_message('required', $this->lang->line('lang_ci_valid_required'));
			$this->form_validation->set_message('matches', $this->lang->line('lang_ci_valid_matches'));
			$this->form_validation->set_message('min_length', $this->lang->line('lang_ci_valid_min_length'));

			if($this->form_validation->run() == false)
			{
				if ($_SERVER["REQUEST_TIME"] - $this->Model_User->token_timestamp($this->encrypt->decode($memberID)) > 86400)
				{
					$this->load->view('errors/html/error_expiredLink');
				}
				else
				{
					//Field validation failed.  User redirected to login page
					$data['user_id'] = $memberID;

					$this->load->view('login/newpwd', $data);
				}
			}
			else
			{
				$this->reset($this->encrypt->decode($memberID));
			}
		}
		else
		{
			redirect(route('home'),'refresh');
		}
	}

	protected function reset($memberID)
	{
		$resetpwd = $this->Model_User->reset_password($memberID, $this->input->post('password'));
		
		if ($resetpwd)
		{
			$this->Model_User->del_token($memberID);
			redirect(route('login/success/changepwd'), 'refresh');
		}
		else
		{
			return false;
		}
	}

}

/* End of file Forgotpwd.php */
/* Location: ./application/controllers/Forgotpwd.php */