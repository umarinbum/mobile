<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctorclinic_model extends CI_Model {

    public function get_doctor_clinic()
    {
    	$this->db->select('*');
        $this->db->from('tb_doctor_clinic a');
        $this->db->join('tb_clinic b', 'a.id_clinic=b.id_clinic', 'left');
        $this->db->join('tb_doctor c', 'a.id_doctor=c.id_doctor', 'left');
		$query = $this->db->get();
        return $query->result();
    }


}