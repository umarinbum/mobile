<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model
{
    public function insert_member($data_member)
    {
   		$this->db->insert('tb_member', $data_member);
		return $this->db->insert_id();
    }

	public function has_user()
	{
		$data_session = $this->session->userdata();
		$this->db->where('social_uid', $data_session['user_profile']['user_id']);
		$query = $this->db->get('tb_member');
		return $query->row(); 
	}

	public function get_user_by_uid($uid)
	{
		$this->db->where('social_uid', 	$uid);
		$query = $this->db->get('tb_member');
		return $query->row(); 
	}
}