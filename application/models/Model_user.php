<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	public function login($email,$password)
	{
		$query = $this->db->get_where('members', array(
			'member_email' => $email, 
			'member_password' => sha1(md5(crc32(base64_encode($password))))
			));

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function register($email,$password,$name,$surname,$randomKeywords,$group=3)
	{
		$validEmail = $this->match('members', array('member_email' => $email));

		if ($validEmail) {
			return true;
		}else{
			//Member row & post data
			$memberDataRow = array(
				'member_group' => $group,
				'member_email' => $email,
				'member_name' => $name,
				'member_surname' => $surname,
				'member_password' => sha1(md5(crc32(base64_encode($password)))),
				'member_verify' => md5($randomKeywords)
				);

			//Insert to 'members' table
			$this->db->insert('members', $memberDataRow);
		}
	}

	public function reset_password($memberID, $new_pwd)
	{
		$query = $this->db->where('member_id', $memberID);
		$query = $this->db->update('members', array(
			'member_password' => sha1(md5(crc32(base64_encode($new_pwd))))
		));

		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function reg_token($rel_id, $member_email)
	{
		//Member row & post data
		$termsDataRow = array(
			'rel_id' => $rel_id,
			'token' => do_hash($member_email),
			'timestamp' => $_SERVER["REQUEST_TIME"]
			);

		//Insert to 'members' table
		$query = $this->db->insert('terms', $termsDataRow);

		if (!$query) {
			return false;
		}
	}

	public function del_token($rel_id)
	{
		$query = $this->db->delete('terms', array(
			'rel_id' => $rel_id
			));

		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function token_exists($rel_id)
	{
		$query = $this->db->query('SELECT * FROM terms WHERE rel_id="'.$rel_id.'"');
		$res = $query->result();

		if ($res)
		{
			return true;
		}
	}

	public function token_timestamp($rel_id)
	{
		$query = $this->db->query('SELECT * FROM terms WHERE rel_id="'.$rel_id.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];

			return $row->timestamp;
		}
	}

	public function match($table, $rows=array())
	{
		$query = $this->db->get_where($table, $rows);

		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function get_member_id($email)
	{
		$query = $this->db->query('SELECT * FROM members WHERE member_email="'.$email.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];

			return $row->member_id;
		}
	}

	public function get_member_pwd($memberID)
	{
		$query = $this->db->query('SELECT * FROM members WHERE member_id="'.$memberID.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];

			return $row->member_password;
		}
	}

	public function get_member_email($memberID)
	{
		$query = $this->db->query('SELECT * FROM members WHERE member_id="'.$memberID.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];

			return $row->member_email;
		}
	}

	public function get_member_group($groupID)
	{
		$query = $this->db->query('SELECT * FROM groups WHERE group_id="'.$groupID.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];

			return $row->group_name;
		}
	}

	public function get_member_valid_code($memberID)
	{
		$query = $this->db->query('SELECT * FROM members WHERE member_id="'.$memberID.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];

			return $row->member_verify;
		}
	}

	public function delete_verify_code($memberID)
	{
		$this->db->where('member_id', $memberID);
		$this->db->update('members', array(
			'member_verify' => '')
		);
	}

	public function update_verify_code($memberID, $new_code)
	{
		$this->db->where('member_id', $memberID);
		$this->db->update('members', array(
			'member_verify' => md5($new_code)
		));
	}

	public function get_website_info($memberID, $i)
	{
		$query = $this->db->query('SELECT * FROM members_site WHERE member_id="'.$memberID.'"');
		$res = $query->result();

		if ($res)
		{
			$row = $res[0];
			$arr = (array) $row;

			return $arr[ $i ];
		}
	}

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

}

/* End of file Model_User.php */
/* Location: ./application/models/Model_User.php */