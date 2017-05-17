<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctorallotment_model extends CI_Model {

    public function get_allotment($id_clinic, $doctor, $front_date)
    {
    	$this->db->select('*');
        $this->db->from('tb_doctor_allotment a');
        $this->db->join('tb_clinic b', 'a.id_clinic=b.id_clinic', 'left');
        $this->db->join('tb_doctor c', 'a.id_doctor=c.id_doctor', 'left');
        $this->db->where('a.allot_date', $front_date);

        if( $id_clinic != 0 ){
            $this->db->where('a.id_clinic', $id_clinic);
        }
        if( $doctor != 0 ){
            $this->db->where('a.id_doctor', $doctor);
        }

		$this->db->order_by('a.allot_start_time', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
    }

    public function get_allotment_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tb_doctor_allotment a');
        $this->db->join('tb_clinic b', 'a.id_clinic=b.id_clinic', 'left');
        $this->db->join('tb_doctor c', 'a.id_doctor=c.id_doctor', 'left');
        $this->db->where('a.id_doctor_allotment', $id);
        $query = $this->db->get();
        return $query->row();
    }
}