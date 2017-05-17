<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_model extends CI_Model {

    public function get_doctor()
    {
        //$this->db->where('status', 0);
    	$query = $this->db->get('tb_doctor');
        return $query->result();
    }
    
    public  function search($id)
    {
        $this->db->select('*');
        $this->db->from('tb_treatment a');
        $this->db->join('tb_doctor_clinic b', 'a.id_clinic=b.id_clinic', 'left');
        $this->db->join('tb_clinic c', 'b.id_clinic=c.id_clinic', 'left');
        $this->db->join('tb_doctor d', 'b.id_doctor=d.id_doctor', 'left');
        $this->db->where(' a.id_treatment', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

}