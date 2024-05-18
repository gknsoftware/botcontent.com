<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	protected $logged_in;
	public $random_keywords_char_num = 8;

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
			$this->form_validation->set_rules('email', 'e-posta adresi', 'trim|required|valid_email');
			$this->form_validation->set_rules('name', 'isim', 'trim|required');
			$this->form_validation->set_rules('surname', 'soyisim', 'trim|required');
			$this->form_validation->set_rules('password', 'şifre', 'trim|required|min_length[8]|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'şifre doğrulama', 'trim|required');

			//Assign a message
			$this->form_validation->set_message('required', $this->lang->line('lang_ci_valid_required'));
			$this->form_validation->set_message('valid_email', $this->lang->line('lang_ci_valid_email'));
			$this->form_validation->set_message('matches', $this->lang->line('lang_ci_valid_matches'));
			$this->form_validation->set_message('min_length', $this->lang->line('lang_ci_valid_min_length'));

			if($this->form_validation->run() == false)
			{
				//Field validation failed.  User redirected to login page
				$this->load->view('login/register');
			}
			else
			{
				//If success validation return this function
				$this->check_user();

				$memberID = $this->Model_User->get_member_id($this->input->post('email'));
				$memberVerify = $this->Model_User->get_member_info($memberID, 'member_verify');
				if ( !empty($memberVerify) )
				{
					//Go to verification area
					$data['member_id'] = $memberID;
					$data['member_email'] = $this->input->post('email');
					$data['verify_warning'] = false;
					$data['countdown'] = false;

					//Render "confirm code" template
					$this->load->view('login/confirmCode', $data);
				}
				else
				{
					redirect(route('home'),'refresh');
				}
			}
		}
		else
		{
			redirect(route('home'),'refresh');
		}
	}

	public function check_user()
	{
		//Field validation succeeded.  Validate against database
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$name = $this->input->post('name');
		$surname = $this->input->post('surname');
		$randomKeywords = random_keywords($this->random_keywords_char_num);

		//query the database
		$result = $this->Model_User->register($email, $password, $name, $surname, $randomKeywords);

		if ($result) {
			$this->form_validation->set_message('check_user', $this->lang->line('lang_ci_valid_existsEmail'));
			return false;
		}else{
			//E-Mail template variables
			$data = array(
				'base_path' => 'http://www.weboti.com/',
				'verify_code' => $randomKeywords,
				'user_id' => $this->Model_User->get_member_id($email),
				'user_name' => $name,
				'user_email' => $email,
				'user_password' => '******'.substr($password, -3, 3)
				);

			//E-mail parameters
			$param = array(
				'from' => array('no-reply@weboti.com', 'Weboti'), 
				'to' => $email,
				'subject' => $this->lang->line('lang_etpl_vcode_subject'),
				'message' => $this->load->view('email/confirmCode',$data,true)
				);

			send_email($param); // send confirm code
		}
	}

	public function verifyCode($memberID, $verifyCode=false)
	{
		if ( ! $this->logged_in )
		{
			$expUrl = explode('-', $memberID);
			$memberID = substr($memberID, 0, $expUrl[1]);

			$checkCode = $this->Model_User->get_member_valid_code($memberID);

			$rows = array(
				'member_id' => $memberID,
				'member_verify' => $checkCode
				);
			$match = $this->Model_User->match('members', $rows);

			if ( ($match == true) && (md5($this->input->post('verifyCode')) == $checkCode) || ($verifyCode == $checkCode) )
			{ //If the code is correct
				$this->Model_User->delete_verify_code($memberID); //Delete member verify code
				redirect(route('login/success/approved'), 'refresh');
			}
			else
			{
				if ($checkCode)
				{
					redirect(route('confirmCode/'.$memberID.md5($memberID).'-'.strlen($memberID)), 'refresh');
				}
				else
				{
					redirect(route('home'), 'refresh');
				}
			}
		}
		else
		{
			redirect(route('home'), 'refresh');
		}
	}

	public function sendVerifyCode($memberID)
	{
		$expUrl = explode('-', $memberID);
		$memberID = substr($memberID, 0, $expUrl[1]);
		$randomKeywords = random_keywords($this->random_keywords_char_num);

		$checkCode = $this->Model_User->get_member_valid_code($memberID);
		if ($checkCode) 
		{
			//Update new verify code
			$this->Model_User->update_verify_code($memberID, $randomKeywords);

			//E-Mail template variables
			$data = array(
				'base_path' => 'http://www.weboti.com/',
				'verify_code' => $randomKeywords,
				'user_id' => $memberID,
				'user_name' => $this->Model_User->get_member_info($memberID, 'member_name'),
				'user_email' => $this->Model_User->get_member_email($memberID),
				'user_password' => '*********'
				);

			//E-mail parameters
			$param = array(
				'from' => array('no-reply@weboti.com', 'Weboti'), 
				'to' => $this->Model_User->get_member_email($memberID),
				'subject' => $this->lang->line('lang_etpl_vcode_subject'),
				'message' => $this->load->view('email/confirmCode',$data,true)
				);

			send_email($param); // send confirm code

			//Go to verification area
			$data['member_id'] = $memberID;
			$data['member_email'] = $this->Model_User->get_member_email($memberID);
			$data['verify_warning'] = false;
			$data['countdown'] = true;

			$this->load->view('login/confirmCode', $data);
		}
		else
		{
			redirect(route('home'), 'refresh');
		}
	}

}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */