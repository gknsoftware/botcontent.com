<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
			$this->load->model('model_user','model_user',true);
			
			return $this->logged_in = false;
		}
	}

	public function index()
	{
		if ( ! $this->logged_in )
		{
			$email = $this->input->post('email');

			$memberID = $this->model_user->get_member_id($email);
			$valid_code = $this->model_user->get_member_valid_code($memberID);

			if ($valid_code)
			{
				$data['member_id'] = $memberID;
				$data['member_email'] = $email;
				$data['verify_warning'] = false;
				$data['countdown'] = false;

				$this->load->view('login/confirmCode', $data);
			}
			else
			{
				$this->success();
			}
		}
		else
		{
			redirect(route('home'),'refresh');
		}
	}

	public function success($verify=false)
	{
		//To assign a rule
		$this->form_validation->set_rules('email', 'e-posta adresi', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'şifre', 'trim|required|callback_verify_user');

		//To assign a validate message
		$this->form_validation->set_message('required', $this->lang->line('lang_ci_valid_required'));
		$this->form_validation->set_message('valid_email', $this->lang->line('lang_ci_valid_email'));

		if($this->form_validation->run() == false)
		{
			//Field validation failed. User redirected to login page
			$data['verification_success'] = null;
			switch ($verify) {
				case 'approved':
					$data['verification_success'] = $this->lang->line('lang_ccode_verificationsuccess');
					break;

				case 'changepwd':
					$data['verification_success'] = $this->lang->line('lang_cpass_changepwdsuccess');
					break;
			}
			$this->load->view('login/login', $data);
		}
		else
		{
			//Go to private area
			redirect(route('home'), 'refresh');
		}
	}

	public function verify_user($password)
	{
		//Field validation succeeded.  Validate against database
		$email = $this->input->post('email');

		//query the database
		$result = $this->model_user->login($email, $password);

		if ($result)
		{
			$sess_array = array();
			foreach ($result as $row)
			{
				$group_name = $this->model_user->get_member_group($row->member_group);
				$sess_array = array(
					'id' => $row->member_id,
					'premium' => $row->premium,
					'group' => $row->member_group,
					'group_name' => $group_name,
					'email' => $row->member_email,
					'name' => $this->model_user->get_member_info($row->member_id, 'member_name'),
					'surname' => $this->model_user->get_member_info($row->member_id, 'member_surname'),
					'avatar' => $this->model_user->get_member_info($row->member_id, 'member_pic'),
					'site_plan_ordered' => $row->site_plan_ordered,
					'site_plan_purchased' => $row->site_plan_purchased,
					'site_plan_expired' => $row->site_plan_expired
					);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return true;
		}
		else
		{
			$this->form_validation->set_message('verify_user', $this->lang->line('lang_ci_valid_checkInfo'));
			return false;
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */