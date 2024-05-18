<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

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

			//Loaded model
			$this->load->model('model_site','model_site',true);
			$this->load->model('model_bot','model_bot',true);

			//Session value assign
			$session_data = $this->session->userdata('logged_in');
			$this->page_data['member_id'] = $session_data['id'];
			$this->page_data['member_email'] = $session_data['email'];
			$this->page_data['member_name'] = $session_data['name'];
			$this->page_data['member_surname'] = $session_data['surname'];
			$this->page_data['member_group'] = $session_data['group'];
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
			//Assign to page data
			$site_limit = $this->model_site->get_premium_feature($this->page_data['premium'], 'website_limit');
			$this->page_data['website_list'] = $this->model_site->get_website_list($this->page_data['member_id'], $site_limit);

			//Render page
			$this->load->view('mysites', $this->page_data);
		}
	}

	public function support()
	{
		if ($this->logged_in)
		{
			//Assign to page data
			$this->page_data['department_list'] = $this->model_site->get_department_list();
			$this->page_data['ticket_list'] = $this->model_site->get_ticket_list($this->page_data['member_id']);
			$this->page_data['all_ticket_list'] = $this->model_site->all_ticket_list();
			//Faq data
			$this->page_data['faq_list'] = $this->model_site->faq_list(5);

			//Render page
			$this->load->view('support', $this->page_data);
		}
	}

	public function sendTicket()
	{
		if ($this->logged_in)
		{
			$post = array(
				'member_id' => $this->page_data['member_id'],
				'input_department' => $this->input->post('department'),
				'input_subject' => $this->input->post('subject'),
				'input_content' => $this->input->post('content'),
				'input_date' => date('Y-m-d H:i:s', time()),
				'input_priority' => $this->input->post('priority'),
				'input_status' => 1
				);

			$insert = $this->model_site->add_ticket($post);

			if ($insert)
			{
				redirect(route('site/support'), 'refresh');
			}
		}
	}

	public function show_ticket()
	{
		if ($this->logged_in)
		{
			$this->model_site->get_ticket_update_read( $this->input->post('ticket_id') );

			//Assign to page data
			$this->page_data['ticket_status'] = $this->model_site->get_ticket_status( $this->input->post('ticket_id') );
			$this->page_data['last_response_id'] = $this->model_site->get_last_ticket_response_id( $this->input->post('ticket_id') );
			$this->page_data['response'] = $this->model_site->get_ticket_response( $this->input->post('ticket_id') );

			//Render partial page
			$this->load->view('modals/partials/TicketResponseData', $this->page_data);
		}
	}

	public function reply_ticket()
	{
		if ($this->logged_in)
		{
			//To assign input
			$post = array(
				'member_id' => $this->page_data['member_id'],
				'input_response_id' => $this->input->post('hiddenResponseID'),
				'input_content' => $this->input->post('reply'),
				'input_date' => date('Y-m-d H:i:s', time()),
				'input_status' => 1
				);

			$insert = $this->model_site->add_reply_ticket($post);

			if ($insert)
			{
				//Assign to page data
				$this->page_data['ticket_status'] = $this->model_site->get_ticket_status( $this->input->post('hiddenResponseID') );
				$this->page_data['last_response_id'] = $this->model_site->get_last_ticket_response_id( $this->input->post('hiddenResponseID') );
				$this->page_data['response'] = $this->model_site->get_ticket_response( $this->input->post('hiddenResponseID') );

				//Render partial page
				$this->load->view('modals/partials/TicketResponseData', $this->page_data);
			}
		}
	}

	public function faq($faqCat=null, $faqID=null)
	{
		if ($this->logged_in)
		{
			//Assign to page data
			$this->page_data['faq_single_category'] = $this->model_site->get_faq_single_cat( $this->encrypt->decode($faqCat) );
			$this->page_data['faq_title_list'] = $this->model_site->faq_title_list( $this->encrypt->decode($faqCat) );
			//Single faq page
			$this->page_data['faq_title'] = $this->model_site->get_faq_info( $this->encrypt->decode($faqID), 'faq_title' );
			$this->page_data['faq_content'] = $this->model_site->get_faq_info( $this->encrypt->decode($faqID), 'faq_content' );

			//Render page
			$this->load->view('faq', $this->page_data);
		}
	}

	public function check_remote_client()
	{
		if ($this->logged_in)
		{
			$returned = _check_remote_client($this->input->post('url'), $this->input->post('site_id'), 'bototi-client.php');
			$returned = '
			<script type="text/javascript">
			/*	GOGO: refresh remote client connection status
			--------------------------------------------------*/
			$(\'[data-toggle="popover"]\').popover({
				html : true
			});
			function refreshConnection()
			{
				var href = $(this).attr("href");
				var siteID = $(this).data("site-id");

				//Preloader icon
				$("td#site-id-"+siteID).html("Kontrol ediliyor...");

				//Post data
				$.post("site/check_remote_client",{url: href, site_id: siteID}, function(data, status){
					$("td#site-id-"+siteID).html(data);
				});

				return false;
			}
			$(".refreshConnection").on("click", refreshConnection);
			</script>';

			echo $returned;
		}
	}

	public function sync_remote_client()
	{
		if ($this->logged_in)
		{
			$siteID = $this->input->post('site_id');
			$clientURL = rtrim($this->input->post('url'), '/');

			//Connect to client&json file
			$syncStart = _check_remote_client($clientURL, $siteID, 'bototi-client.php', TRUE) ? file_get_contents($clientURL . '/bototi-client.php') : null;
			$jsonData = _check_remote_client($clientURL, $siteID, 'bototi-data.json', TRUE) ? file_get_contents($clientURL . '/bototi-data.json') : null;

			//Decrypted json data
			$decryptedJsonData = json_decode(_decrypted($jsonData, $clientURL), TRUE);
			

			//Process status
			$returned = _check_remote_client($clientURL, $siteID, 'bototi-client.php', TRUE) ? '<p style="margin-bottom:.5em"><strong class="text-success">[ok]</strong> Uzak istemciye bağlanıldı.</p>' : '<p style="margin-bottom:.5em"><strong class="text-danger">[no]</strong> Uzak istemciye bağlanamadı.</p>';
			$returned .= _check_remote_client($clientURL, $siteID, 'bototi-data.json', TRUE) ? '<p style="margin-bottom:.5em"><strong class="text-success">[ok]</strong> JSON dosyası oluşturuldu/güncellendi.</p>' : '<p style="margin-bottom:.5em"><strong class="text-danger">[no]</strong> JSON dosyası oluşturulamadı/güncellenemedi.</p>';
			$returned .= ( !empty($decryptedJsonData) ) ? '<p style="margin-bottom:.5em"><strong class="text-success">[ok]</strong> Veriler içe aktarıldı.</p>' : '<p style="margin-bottom:.5em"><strong class="text-danger">[no]</strong> Veriler içe aktarılamadı.</p>';
			$returned .= ( !empty($decryptedJsonData) && array_key_exists('categories', $decryptedJsonData) ) ? '<p style="margin-bottom:.5em"><strong class="text-success">[ok]</strong> Bütün kategorilere erişildi.</p>' : '<p style="margin-bottom:.5em"><strong class="text-danger">[no]</strong> Kategorilere erişilemiyor.</p>';
			$returned .= ( !empty($decryptedJsonData) && array_key_exists('authors', $decryptedJsonData) ) ? '<p style="margin-bottom:.5em"><strong class="text-success">[ok]</strong> Bütün yazarlara erişildi.</p>' : '<p style="margin-bottom:.5em"><strong class="text-danger">[no]</strong> Yazarlara erişilemiyor.</p>';
			$returned .= '<br /> <p>Senkronizasyon tamamlandı..!</p> <br /> <p><i class="fa fa-lightbulb-o"></i> <strong>İpucu:</strong> Websitenizde kalıcı değişiklikler yaptığınızda(kategori düzenleme, yeni kategori ekleme vs.) değişikliklerin aktif olabilmesi için senkronize etmelisiniz.</p>';

			echo $returned;
		}
	}

	public function add_new_site()
	{
		if ($this->logged_in)
		{
			//Detect and change url format
			$parse = parse_url($this->input->post('site_url'));
			$newURL = ( !array_key_exists('scheme', $parse) ) ? 'http://' . $parse['path'] : $this->input->post('site_url');

			$post = array(
			'member_id' => $this->page_data['member_id'],
			'site_name' => $this->input->post('site_name'),
			'site_url' => $newURL,
			'site_script' => $this->input->post('site_script'),
			'site_category' => $this->input->post('site_category')
			);

			$returned = $this->model_site->add_site($post);

			if ($returned) {
				redirect(route('site'), 'refresh');
			}
		}
	}

}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */