<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Home extends CI_Model {

	public function get_news()
	{
		$query = $this->db->get('news');
		
		if ($query) {
			return $query->result();
		}
	}

	public function get_selected_news($newsID, $i)
	{
		$query = $this->db->query('SELECT * FROM news WHERE id="'.$newsID.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];
			$arr = (array) $row;

			return $arr[ $i ];
		}
	}

}

/* End of file Model_Home.php */
/* Location: ./application/models/Model_Home.php */