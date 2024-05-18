<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bot extends CI_Controller {

	protected $page_data;
	protected $logged_in;
	protected $target;
	protected $data;

	public function __construct()
	{
		parent::__construct();

		/**
		 * Allow ssl(https) secure?
		 *
		 * @uses allow_https(0); https => http
		 * @uses allow_https(1); http => https
		 */
		allow_https(0);

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
			$this->page_data['customer_avatar'] = $session_data['avatar'];

			//Loaded model
			$this->load->model('model_home','model_home',true);
			$this->load->model('model_site','model_site',true);
			$this->load->model('model_bot','model_bot',true);

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

	public function initialize($category, $page, $bot=null, $link=null)
	{	
		//Get url pattern's
		$urlPattern = json_decode($this->model_bot->get_bot_info($bot, 'bot_url_pattern'));
		
		/**
		 * Find and replace values
		 * @var array
		 */
		$find = array('{category}', '{page}', '{link}');
		$replace = array($category, $page, str_replace('[s]', '/', $link));

		/**
		 * Replace pattern's
		 * @var string
		 */
		$site = str_replace($find, $replace, $urlPattern->site);
		$single = str_replace($find, $replace, $urlPattern->single);

		// Create DOM from URL or file
		$returned = connect( $site );

		if ( !empty($link) )
		{
			// Create DOM from URL or file
			$returned = connect( $single );
		}

		return $returned;
	}

	public function lists($cat, $bot, $subcat, $page)
	{
		if ($this->logged_in)
		{
			/**
			 * Initialize Bot
			 * @var array
			 */
			$site = array();
			$site['link'] = null;
			$site['single'] = null;
			$site['subcat'] = $subcat;
			$site['home'] = $this->initialize( $subcat, $page, $bot );
			$this->load->view('bot/'.$cat.'/'.$bot.'/target', $site);

			//Superglobal array data
			$this->page_data['target'] = $GLOBALS['target'];
			$this->page_data['data'] = $GLOBALS['data'];

			//Template data's
			$this->page_data['get_cat'] = $cat;
			$this->page_data['get_bot'] = $bot;
			$this->page_data['subcat'] = $this->model_bot->get_bot_subcategories( $this->model_bot->get_bot_id($this->page_data['get_bot']) );

			//Render template
			$this->load->view('bot', $this->page_data);
		}
	}

	public function selectedCategory($cat, $bot, $subcat, $page)
	{
		echo '<script src="'.get_asset('js', 'botAjaxPost_Inner.js').'"></script>';
		/**
		 * Initialize Bot
		 * @var array
		 */
		$site = array();
		$site['link'] = null;
		$site['single'] = null;
		$site['subcat'] = $subcat;
		$site['home'] = $this->initialize( $subcat, $page, $bot );

		//Target elements
		$this->load->view('bot/'.$cat.'/'.$bot.'/target', $site);

		//Render template
		$this->load->view('bot/'.$cat.'/'.$bot.'/templates/tpl_list');
	}

	public function selectedContent($cat, $bot, $subcat, $page, $link)
	{
		/**
		 * Initialize Bot
		 * @var array
		 */
		$site = array();
		$site['link'] = $link;
		$site['subcat'] = $subcat;
		//$site['home'] =  $this->initialize( $subcat, $page, $bot );
		$site['single'] = $this->initialize( $subcat, $page, $bot, $link );

		//Target elements
		$this->load->view('bot/'.$cat.'/'.$bot.'/target', $site);

		//Render template
		$this->load->view('bot/'.$cat.'/'.$bot.'/templates/tpl_editable');
	}
	
	public function add_new_content()
	{
		//redirect_post('http://www.guncelicerikler.com/bototi-client.php?action=insert', $_POST, '');
	}

}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */