<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_supervisor extends CI_Model {

	public function get_group_list()
	{
		$this->db->from('groups');
		$this->db->order_by("group_id", "desc");
		$query = $this->db->get();
		
		if ($query) {
			return $query->result();
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

	public function get_customer_list($limit=null)
	{
		$this->db->from('customers');
		$this->db->order_by("customer_id", "desc");
		if (!empty($limit)) {
			$this->db->limit($limit);
		}
		$query = $this->db->get();
		
		if ($query) {
			return $query->result();
		}
	}

	public function add_customer($post)
	{
		//Member row & post data
		$memberDataRow = array(
			'member_email' => $post['customer_email'],
			'member_password' => $post['customer_password'],
			'member_group' => $post['customer_group']
			);

		//Insert to 'members' table
		$query = $this->db->insert('members', $memberDataRow);

		//Customer row & post data
		$customerDataRow = array(
			'member_id' => $this->db->insert_id(),
			'customer_company' => $post['customer_company'],
			'customer_name' => $post['customer_name'],
			'customer_surname' => $post['customer_surname'],
			'customer_email' => $post['customer_email'],
			'customer_phone' => $post['customer_phone'],
			'customer_address' => $post['customer_address'],
			'customer_payment' => $post['customer_payment']
			);

		//Insert to 'customer' table
		$query = $this->db->insert('customers', $customerDataRow);

		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function del_customer($memberID)
	{
		$delCustomer = $this->db->delete('customers', array(
			'member_id' => $memberID
			));

		$delMember = $this->db->delete('members', array(
			'member_id' => $memberID
			));

		if ( ($delCustomer == true) && ($delMember == true) ) {
			return true;
		}else{
			return false;
		}
	}

	public function edit_customer($memberID, $post=array())
	{
		$_is_empty_password = empty($post['input_password']) ? $this->get_member_info($post['input_member_id'], 'member_password') : sha1(md5(crc32(base64_encode( $post['input_password'] ))));

		//Members row & post data
		$query = $this->db->where('member_id', $memberID);
		$query = $this->db->update('members', array(
			'member_group' => $post['input_group'],
			'member_email' => $post['input_email'],
			'member_password' => $_is_empty_password
		));

		//Customer row & post data
		$query = $this->db->where('member_id', $memberID);
		$query = $this->db->update('customers', array(
			'customer_company' => $post['input_company'],
			'customer_name' => $post['input_name'],
			'customer_surname' => $post['input_surname'],
			'customer_email' => $post['input_email'],
			'customer_phone' => $post['input_phone'],
			'customer_address' => $post['input_address'],
			'customer_payment' => $post['input_payment']
		));

		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function get_sector_list($limit=null)
	{
		$this->db->from('sector');
		$this->db->order_by("sector_id", "desc");
		if (!empty($limit)) {
			$this->db->limit($limit);
		}
		$query = $this->db->get();
		
		if ($query) {
			return $query->result();
		}
	}

	public function add_sector($post)
	{
		//Sector row & post data
		$sectorDataRow = array(
			'sector_name' => $post['sector_name'],
			'sector_desc' => $post['sector_desc']
			);

		//Insert to 'sector' table
		$query = $this->db->insert('sector', $sectorDataRow);

		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function del_sector($sector_id)
	{
		$delSector = $this->db->delete('sector', array(
			'sector_id' => $sector_id
			));

		if ( $delSector == true ) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file model_supervisor.php */
/* Location: ./application/models/model_supervisor.php */