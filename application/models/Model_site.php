<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Site extends CI_Model {

	public function get_member_info($memberID, $i)
	{
		$query = $this->db->query('SELECT * FROM members WHERE member_id="'.$memberID.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];
			$arr = (array) $row;

			return $arr[ $i ];
		}
	}

	public function get_customer_info($memberID, $i)
	{
		$query = $this->db->query('SELECT * FROM customers WHERE member_id="'.$memberID.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];
			$arr = (array) $row;

			return $arr[ $i ];
		}
	}

	public function get_department($departmentID)
	{
		$query = $this->db->query('SELECT * FROM ticket_department WHERE department_id="'.$departmentID.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];

			return $row->department_name;
		}
	}

	public function get_department_list()
	{
		$query = $this->db->get('ticket_department');
		
		if ($query) {
			return $query->result();
		}
	}

	public function get_ticket_status($ticketID)
	{
		$query = $this->db->query('SELECT * FROM ticket WHERE ticket_id="'.$ticketID.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];

			return $row->ticket_status;
		}
	}

	public function get_ticket_list($memberID)
	{
		$this->db->from('ticket');
		$this->db->order_by("ticket_id", "desc");
		$this->db->where('member_id', $memberID); 
		$query = $this->db->get();
		
		if ($query) {
			return $query->result();
		}
	}

	public function all_ticket_list()
	{
		$this->db->from('ticket');
		$this->db->order_by("ticket_id", "desc");
		$query = $this->db->get();
		
		if ($query) {
			return $query->result();
		}
	}

	public function add_ticket($post)
	{
		//Ticket row & post data
		$ticketDataRow = array(
			'member_id' => $post['member_id'],
			'department_id' => $post['input_department'],
			'ticket_subject' => $post['input_subject'],
			'ticket_content' => $post['input_content'],
			'ticket_date' => $post['input_date'],
			'ticket_priority' => $post['input_priority'],
			'ticket_status' => $post['input_status']
			);

		//Insert to 'ticket' table
		$query = $this->db->insert('ticket', $ticketDataRow);

		if ($query) {
			return true;
		}else {
			return false;
		}
	}

	public function add_reply_ticket($post)
	{
		//Ticket row & post data
		$ticketDataRow = array(
			'member_id' => $post['member_id'],
			'response_id' => $post['input_response_id'],
			'ticket_content' => $post['input_content'],
			'ticket_date' => $post['input_date'],
			'ticket_status' => $post['input_status']
			);

		//Insert to 'ticket' table
		$query = $this->db->insert('ticket', $ticketDataRow);

		if ($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_ticket_response($ticketID)
	{
		$this->db->from('ticket');
		$this->db->where('response_id', $ticketID); 
		$this->db->order_by("ticket_id", "asc");
		$query = $this->db->get();
		
		if ($query) {
			return $query->result();
		}
	}

	public function get_last_ticket_response_id($ticketID)
	{
		$query = $this->db->query('SELECT * FROM ticket WHERE response_id="'.$ticketID.'" ORDER BY ticket_id DESC');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];

			return $row->ticket_id;
		}
	}

	public function get_ticket_update_read($ticketID)
	{
		//Ticket row & post data
		$query = $this->db->where('ticket_id', $ticketID);
		$query = $this->db->update('ticket', array(
			'read' => 2
		));
	}

	public function get_ticket_count()
	{
		$this->db->from('ticket');
		$this->db->where('read', 1); 
		$query = $this->db->get();
		
		if ($query) {
			return $query->result();
		}
	}

	public function get_faq_single_cat($catID)
	{
		$query = $this->db->query('SELECT * FROM faq_category WHERE faq_cat_id="'.$catID.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];

			return $row->faq_cat_name;
		}
	}

	public function get_faq_info($faqID, $i)
	{
		$query = $this->db->query('SELECT * FROM faq WHERE faq_id="'.$faqID.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];
			$arr = (array) $row;

			return $arr[ $i ];
		}
	}

	public function faq_list($limit=null)
	{
		//Faq categories
		$catQuery = $this->db->get('faq_category');
		$cat = $catQuery->result();

		$limitSql = !empty($limit) ? ' LIMIT '.$limit : null;

		$html = null;
		foreach ($cat as $k => $v)
		{
			$faqID = null;

			$html .= '
			<div class="col-lg-4 col-md-4 col-sm-6" data-margin="50px 0">
				<h1 data-font-size="22"><i class="'.$v->faq_cat_icon.'"></i> '.$v->faq_cat_name.'</h1>

				<ul class="faq-category">';

				//Faq list
				$faqQuery = $this->db->query('SELECT * FROM faq WHERE faq_cat_id="'.$v->faq_cat_id.'" ORDER BY faq_id ASC'.$limitSql);
				$faq = $faqQuery->result();

				foreach ($faq as $_k => $_v) {
					$faqID = $_v->faq_id;
					$html .= '<li><i class="fa fa-angle-right"></i> <a href="'.route('site/faq/'.$this->encrypt->encode($_v->faq_cat_id).'/'.$this->encrypt->encode($_v->faq_id)).'">'.$_v->faq_title.'</a></li>';
				}

				if ($faqQuery->num_rows() >= $limit) {
					$html .= '<a href="'.route('site/faq/'.$this->encrypt->encode($v->faq_cat_id).'/'.$this->encrypt->encode($faqID)).'">'.$this->lang->line('lang_viewall').' &raquo;</a>';
				}

			$html .= '
				</ul>
			</div>';
		}

		return $html;
	}

	public function faq_title_list($faqCatID)
	{
		$this->db->from('faq');
		$this->db->where('faq_cat_id', $faqCatID); 
		$this->db->order_by("faq_id", "asc");
		$query = $this->db->get();
		
		if ($query) {
			return $query->result();
		}
	}

	public function get_option_by_group($groupname)
	{
		//Get member id
		if ($this->session->userdata('logged_in'))
				$session_data = $this->session->userdata('logged_in');

		//List options
		$this->db->from('options');
		$this->db->where( array('member_id' => $session_data['id'], 'group_name' => $groupname) ); 
		$this->db->order_by("option_id", "desc");
		$query = $this->db->get();
		
		if ($query) {
			return $query->result();
		}
	}

	public function get_option($name)
	{
		//Get member id
		if ($this->session->userdata('logged_in'))
				$session_data = $this->session->userdata('logged_in');

		//Check same value
		$query = $this->db->get_where('options', array('member_id' => $session_data['id'], 'option_name' => $name));
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];
			return $row->option_value;
		}
	}

	public function add_option($name,$value,$groupname='general')
	{
		//Get member id
		if ($this->session->userdata('logged_in'))
				$session_data = $this->session->userdata('logged_in');

		//Check same value
		$query = $this->db->get_where('options', array('member_id' => $session_data['id'], 'option_name' => $name));

		if ($query->num_rows() > 0)
		{
			return false;
		}
		else
		{
			//Option row & post data
			$optionDataRow = array(
				'member_id' => $session_data['id'],
				'group_name' => $groupname,
				'option_name' => $name,
				'option_value' => $value
				);

			//Insert to 'options' table
			return $this->db->insert('options', $optionDataRow);
		}
	}

	public function update_option($name,$value,$groupname='general')
	{
		//Get member id
		if ($this->session->userdata('logged_in'))
				$session_data = $this->session->userdata('logged_in');

		//Check same value
		$query = $this->db->get_where('options', array('member_id' => $session_data['id'], 'option_name' => $name));

		if ($query->num_rows() > 0)
		{
			//Option row & post data
			$optionDataRow = array(
				'option_value' => $value,
				'group_name' => $groupname
				);

			//Update to 'options' table
			$query = $this->db->where('member_id', $session_data['id']);
			$query = $this->db->where('option_name', $name);
			$query = $this->db->update('options', $optionDataRow);

			return $query;
		}
		else
		{
			return $this->add_option($name,$value,$groupname);
		}
	}

	public function delete_option($name)
	{
		//Get member id
		if ($this->session->userdata('logged_in'))
				$session_data = $this->session->userdata('logged_in');

		//Check same value
		$query = $this->db->get_where('options', array('member_id' => $session_data['id'], 'option_name' => $name));

		if ($query->num_rows() > 0)
		{
			//Delete to 'options' table
			return $this->db->delete('options', array( 'member_id' => $session_data['id'], 'option_name' => $name ));
		}
		else
		{
			return false;
		}
	}

	public function get_premium_feature($premium, $feature)
	{

		$query = $this->db->query('SELECT * FROM premium_features WHERE premium_name="'.trim($premium).'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];
			$arr = (array) $row;

			return $arr[ $feature ];
		}
	}

	public function get_website_list($memberID, $limit)
	{
		$this->db->from('members_site');
		$this->db->where('member_id', $memberID);
		$this->db->order_by("site_id", "asc");
		$this->db->limit($limit);
		
		$query = $this->db->get();
		
		if ($query) {
			return $query->result();
		}
	}

	public function add_site($post)
	{
		//Site row & post data
		$memberSiteDataRow = array(
			'member_id' => $post['member_id'],
			'site_name' => $post['site_name'],
			'site_url' => $post['site_url'],
			'site_script' => $post['site_script'],
			'site_category' => $post['site_category']
			);

		//Insert to 'ticket' table
		$query = $this->db->insert('members_site', $memberSiteDataRow);

		if ($query) {
			return true;
		}else {
			return false;
		}
	}

}

/* End of file Model_Site.php */
/* Location: ./application/models/Model_Site.php */