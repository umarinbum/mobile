<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment_model extends CI_Model {

    public function get_appointment_by_date($date)
    {
    	$this->db->select('*');
        $this->db->from('tb_appointment a');
        $this->db->join('tb_doctor b', 'a.id_doctor=b.id_doctor', 'left');
        $this->db->join('tb_admin c', 'a.id_admin=c.id_admin', 'left');
        $this->db->where('allot_date', $date);
		$this->db->order_by('a.allot_time_start', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
    }

}