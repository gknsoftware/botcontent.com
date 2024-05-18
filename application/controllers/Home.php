<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	protected $page_data;
	protected $logged_in;

	public function __construct()
	{
		parent::__construct();

		//Allow https url
		allow_https(1); 

		//Loaded language files
		$this->lang->load(array('global'), 
			$this->session->userdata('site_lang')
			);

		if ($this->session->userdata('logged_in'))
		{
			//If true logged in
			$this->logged_in = true;

			//Loaded model
			$this->load->model('model_home','model_home',true);
			$this->load->model('model_site','model_site',true);
			$this->load->model('model_bot','model_bot',true);

			//Session value assign
			$session_data = $this->session->userdata('logged_in');
			$this->page_data['member_id'] = $session_data['id'];
			$this->page_data['member_email'] = $session_data['email'];
			$this->page_data['member_name'] = $session_data['name'];
			$this->page_data['member_surname'] = $session_data['surname'];
			$this->page_data['member_group'] = $session_data['group'];
			$this->page_data['member_group_name'] = $session_data['group_name'];
			$this->page_data['customer_avatar'] = $session_data['avatar'];
			$this->page_data['premium'] = $this->model_site->get_member_info($this->page_data['member_id'], 'premium');
			$this->page_data['site_plan_ordered'] = $this->model_site->get_member_info($this->page_data['member_id'], 'site_plan_ordered');
			$this->page_data['site_plan_purchased'] = $this->model_site->get_member_info($this->page_data['member_id'], 'site_plan_purchased');
			$this->page_data['site_plan_expired'] = $this->model_site->get_member_info($this->page_data['member_id'], 'site_plan_expired');
			
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
			$this->load->view('home', $this->page_data);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		//session_destroy();
		redirect(route('login'), 'refresh');
	}

	public function change_language()
	{
		$this->session->set_userdata('site_lang', $this->input->post('language'));

		//echo $this->session->userdata('site_lang');
	}

	public function change_template()
	{
		$cookie = array(
			'name' => 'site_tpl',
			'value' => $this->input->post('template'),
			'expire' => 31536000,
			'path'   => '/'
		);

		return $this->input->set_cookie($cookie);
	}

	public function noJavascript()
	{
		$this->load->view('layout/header', $this->page_data);
		$this->load->view('errors/html/error_noJavascript', $this->page_data);
	}

	public function show_news()
	{
		$data['news_type'] = $this->model_home->get_selected_news($this->input->post('news_id'), 'type');
		$data['news_title'] = $this->model_home->get_selected_news($this->input->post('news_id'), 'title');
		$data['news_description'] = $this->model_home->get_selected_news($this->input->post('news_id'), 'description');
		$data['news_date'] = $this->model_home->get_selected_news($this->input->post('news_id'), 'date');

		//render partial file
		$this->load->view('modals/partials/NewsInfoData', $data);
	}

	public function update_settings()
	{
		//Sistem
		$this->model_site->update_option('_use_richtextbox', $this->input->post('opt_richtextbox'));
		$this->model_site->update_option('_def_website', $this->input->post('select_website'), 'default');

		//Bot
		$this->model_site->update_option('_use_cleanedcontent', $this->input->post('opt_cleanedcontent'));
		$this->model_site->update_option('_use_downloadimage', $this->input->post('opt_downloadimage'));

		//Özgünleştirme
		foreach($this->input->post("text_findkeywords") as $key => $value)
		{
			$replace_keywords = $this->input->post("text_replacekeywords");

			if ( ($value != '') && ($replace_keywords[$key] != '') )
			{
				//Update data
				$this->model_site->update_option('_replaced_keywords_'.do_hash($value), $value . '|' . $replace_keywords[$key], 'replaced_keywords');
			}
		}
	}

	public function delete_settings()
	{
		//Sistem
		return $this->model_site->delete_option( $this->input->post('opt_name') );
	}
	
	public function update_defaults()
	{
		//Update options
		$this->model_site->update_option('_def_website_'.do_hash(get_option('_def_website')).'_author', $this->input->post('text_author'), 'default');
		$this->model_site->update_option('_def_website_'.do_hash(get_option('_def_website')).'_category', $this->input->post('text_category'), 'default');
	}

	public function load_get_option_by_group($groupname)
	{
		foreach (get_option_by_group($groupname) as $key => $value)
		{
			$expKeywords = explode('|', $value->option_value);

			echo '
			<tr id="row-'.$value->option_id.'">
				<td>'.trim($expKeywords[0]).'</td>
				<td>'.trim($expKeywords[1]).'</td>
				<td><a href="javascript:void(0);" class="btn btn-danger btn-xs deleteSettings" data-option="'.$value->option_name.'" data-id="'.$value->option_id.'">Kaldır</a></td>
			</tr>';
		}

		echo "
		<script type=\"text/javascript\">
		/* GOGO:POST: delete settings
		--------------------------------------------------*/
		function post_DeleteSettings()
		{
			var result = confirm(\"Silmek istediğinize emin misiniz?\");
			if (result)
			{
				var optionID = $(this).data('id');

				$.post('home/delete_settings',{ opt_name: $(this).data('option') }, function(data, status){	
					$('tr#row-'+optionID).css({ 'background-color':'red', 'color':'white' }).fadeOut(1000);
				});
			}
		}
		$('.deleteSettings').on('click', post_DeleteSettings);
		</script>";
	}
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */