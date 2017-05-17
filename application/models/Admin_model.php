<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	private $tb_admin = "tb_admin";

    public function get($where)
    {
        $this->db->from($this->tb_admin.' a');
        $this->db->join('tb_doctor b', 'a.ad_id_doctor=b.id_doctor', 'left');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id($id)
    {
    	$this->db->from($this->tb_admin.' a');
        $this->db->join('tb_doctor b', 'a.ad_id_doctor=b.id_doctor', 'left');
        $this->db->where('id_admin', $id);
        $query = $this->db->get();
        return $query->row();
    }
}
