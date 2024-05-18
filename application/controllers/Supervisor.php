<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {

	protected $page_data;
	protected $logged_in;

	public function __construct()
	{
		parent::__construct();

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
			$this->page_data['member_email'] = $session_data['email'];
			$this->page_data['member_name'] = $session_data['name'];
			$this->page_data['member_surname'] = $session_data['surname'];
			$this->page_data['member_group'] = $session_data['group'];
			$this->page_data['customer_avatar'] = $session_data['avatar'];
			$this->page_data['company_logo'] = $session_data['logo'];

			//Loaded model
			$this->load->model('model_supervisor','',true);

			if ($session_data['group'] == 0)
			{
				//Back to home
				redirect(base_url(), 'refresh');
				return false;
			}

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
		$this->sites();
	}

	public function customers()
	{
		if ($this->logged_in)
		{
			//To assign a rule
			$this->form_validation->set_rules('customer_company', null, 'trim|required');
			$this->form_validation->set_rules('customer_name', null, 'trim|required');
			$this->form_validation->set_rules('customer_surname', null, 'trim|required');
			$this->form_validation->set_rules('customer_email', null, 'trim|required|valid_email');
			

			if($this->form_validation->run() == false)
			{
				$this->page_data['group_list'] = $this->model_supervisor->get_group_list();
				$this->page_data['customer_list'] = $this->model_supervisor->get_customer_list();
				$this->load->view('supervisor/customers', $this->page_data);
			}
			else
			{
				$this->add_customer();
			}
		}
	}

	public function add_customer()
	{
		$post = array();
		$post['customer_company'] = $this->input->post('customer_company');
		$post['customer_name'] = $this->input->post('customer_name');
		$post['customer_surname'] = $this->input->post('customer_surname');
		$post['customer_phone'] = $this->input->post('customer_phone');
		$post['customer_address'] = $this->input->post('customer_address');
		$post['customer_payment'] = $this->input->post('customer_payment');
		$post['customer_email'] = $this->input->post('customer_email');
		$post['customer_password'] = $this->input->post('customer_password');
		$post['customer_group'] = $this->input->post('customer_group');

		$insert = $this->model_supervisor->add_customer($post);

		if ($insert)
		{
			redirect(current_url());
			return true;
		}
		else
		{
			return false;
		}
	}

	public function delete_customer()
	{
		$this->model_supervisor->del_customer($this->input->post('member_id'));
	}

	public function editable_customer()
	{
		$data['success'] = false;
		$data['member_id'] = $this->input->post('member_id');
		$this->load->view('modals/partials/customereditdata', $data);
	}

	public function edit_customer()
	{
		$post = array(
			'input_member_id' => $this->input->post('member_id'),
			'input_company' => $this->input->post('customer_company'),
			'input_name' => $this->input->post('customer_name'),
			'input_surname' => $this->input->post('customer_surname'),
			'input_email' => $this->input->post('customer_email'),
			'input_phone' => $this->input->post('customer_phone'),
			'input_address' => $this->input->post('customer_address'),
			'input_payment' => $this->input->post('customer_payment'),
			'input_group' => $this->input->post('member_group'),
			'input_password' => $this->input->post('member_password')
			);

		$returned = $this->model_supervisor->edit_customer($this->input->post('member_id'), $post);

		if ($returned) {
			$data['success'] = true;
			$data['member_id'] = $this->input->post('member_id');
			$this->load->view('modals/partials/customereditdata', $data);
		}
	}

	public function business_card()
	{
		$memberID = $this->input->post('member_id');
		$data['customer_company'] = $this->model_supervisor->get_customer_info($memberID, 'customer_company');
		$data['customer_name'] = $this->model_supervisor->get_customer_info($memberID, 'customer_name');
		$data['customer_surname'] = $this->model_supervisor->get_customer_info($memberID, 'customer_surname');
		$data['customer_email'] = $this->model_supervisor->get_customer_info($memberID, 'customer_email');
		$data['customer_phone'] = $this->model_supervisor->get_customer_info($memberID, 'customer_phone');
		$data['customer_address'] = $this->model_supervisor->get_customer_info($memberID, 'customer_address');
		$data['company_logo'] = $this->model_supervisor->get_customer_info($memberID, 'company_logo');

		//render partial file
		$this->load->view('modals/partials/customerinfodata', $data);
	}

	public function sites()
	{
		$this->load->view('supervisor/sites', $this->page_data);
	}

	public function sector()
	{
		if ($this->logged_in)
		{
			//To assign a rule
			$this->form_validation->set_rules('sector_name', null, 'trim|required');

			if($this->form_validation->run() == false)
			{
				$this->page_data['sector_list'] = $this->model_supervisor->get_sector_list();
				$this->load->view('supervisor/sector', $this->page_data);
			}
			else
			{
				$this->add_sector();
			}
		}
	}

	public function add_sector()
	{
		$post = array();
		$post['sector_name'] = $this->input->post('sector_name');
		$post['sector_desc'] = $this->input->post('sector_desc');

		$insert = $this->model_supervisor->add_sector($post);

		if ($insert)
		{
			redirect(current_url());
			return true;
		}
		else
		{
			return false;
		}
	}

	public function delete_sector()
	{
		$this->model_supervisor->del_sector($this->input->post('sector_id'));
	}

	public function templates()
	{
		$this->load->view('supervisor/templates', $this->page_data);
	}

	public function multilang()
	{
		$this->load->view('supervisor/multilang', $this->page_data);
	}

}

/* End of file supervisor.php */
/* Location: ./application/controllers/supervisor.php */