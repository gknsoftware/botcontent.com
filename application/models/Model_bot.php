<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Bot extends CI_Model {

	public function get_bot_categories()
	{
		$query = $this->db->get('bot_category');
		
		if ($query) {
			return $query->result();
		}
	}

	public function get_bot_list($botCatID)
	{
		$this->db->from('bot');
		$this->db->where('bot_cat_id', $botCatID); 
		$this->db->order_by("bot_id", "desc");
		$query = $this->db->get();
		
		if ($query) {
			return $query->result();
		}
	}

	public function get_bot_subcategories($botID)
	{
		$this->db->from('bot_subcategory');
		$this->db->where('bot_id', $botID); 
		$this->db->order_by("bot_subcat_id", "asc");
		$query = $this->db->get();
		
		if ($query) {
			return $query->result();
		}
	}

	public function get_bot_id($slug)
	{
		$this->db->from('bot');
		$this->db->where('bot_slug', $slug); 
		$query = $this->db->get();

		$result = $query->result();
		
		if ($result)
		{
			$row = $result[0];
			return $row->bot_id;
		}
	}

	public function get_bot_info($slug, $i)
	{
		$query = $this->db->query('SELECT * FROM bot WHERE bot_slug="'.$slug.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];
			$arr = (array) $row;

			return $arr[ $i ];
		}
	}

	public function get_subcat_slug($botID)
	{
		$this->db->from('bot_subcategory');
		$this->db->where('bot_id', $botID);
		$this->db->order_by("bot_subcat_id", "asc");
		$query = $this->db->get();

		$result = $query->result();
		
		if ($result)
		{
			$row = $result[0];
			return $row->bot_subcat_slug;
		}
	}

	public function get_subcat_diff($subcatSlug)
	{
		$this->db->from('bot_subcategory');
		$this->db->where('bot_subcat_slug', $subcatSlug);
		$query = $this->db->get();

		$result = $query->result();
		
		if ($result)
		{
			$row = $result[0];
			return $row->bot_subcat_diff;
		}
	}

	public function count_table($table)
	{
		return $this->db->count_all( $table );
	}

}

/* End of file Model_Dashboard.php */
/* Location: ./application/models/Model_Dashboard.php */