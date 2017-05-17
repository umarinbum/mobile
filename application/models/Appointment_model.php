<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment_model extends CI_Model {

    public function get_appointment($code)
    {
        $this->db->select('*');
        $this->db->from('tb_appointment a');
        $this->db->join('tb_doctor b', 'a.id_doctor=b.id_doctor', 'left');
        $this->db->join('tb_admin c', 'a.id_admin=c.id_admin', 'left');
        $this->db->join('tb_treatment d', 'a.id_treatment=d.id_treatment', 'left');
        $this->db->join('tb_clinic e', 'a.id_clinic=e.id_clinic', 'left');
        $this->db->where('a.id_status !=', 3);
        $this->db->where('a.id_status !=', 4);
        $this->db->where('a.secret_code',$code);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_appointment_by_date($id_treatment, $doctor, $front_date)
    {
    	$this->db->select('*');
        $this->db->from('tb_appointment a');
        $this->db->join('tb_doctor b', 'a.id_doctor=b.id_doctor', 'left');
        $this->db->join('tb_admin c', 'a.id_admin=c.id_admin', 'left');
        $this->db->where('allot_date', $front_date);

        if( $id_treatment != 0 ){
            $this->db->where('a.id_treatment', $id_treatment);
        }
        if( $doctor != 0 ){
            $this->db->where('a.id_doctor', $doctor);
        }

		$this->db->order_by('a.allot_time_start', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
    }

    public function get_appointment_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tb_appointment a');
        $this->db->join('tb_doctor b', 'a.id_doctor=b.id_doctor', 'left');
        $this->db->join('tb_admin c', 'a.id_admin=c.id_admin', 'left');
        $this->db->join('tb_treatment d', 'a.id_treatment=d.id_treatment', 'left');
        $this->db->join('tb_clinic e', 'a.id_clinic=e.id_clinic', 'left');
        $this->db->join('tb_member f', 'a.id_member=f.id_member', 'left');
        $this->db->where('a.id_appointment', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_appointment_by_member_id($id_member)
    {
        $this->db->from('tb_appointment a');
        $this->db->join('tb_doctor b', 'a.id_doctor=b.id_doctor', 'left');
        $this->db->join('tb_admin c', 'a.id_admin=c.id_admin', 'left');
        $this->db->join('tb_treatment d', 'a.id_treatment=d.id_treatment', 'left');
        $this->db->join('tb_clinic e', 'a.id_clinic=e.id_clinic', 'left');
        $this->db->join('tb_member f', 'a.id_member=f.id_member', 'left');
        $this->db->where('a.id_member', $id_member);
        $this->db->where('a.id_status !=', 3);
        $this->db->where('a.id_status !=', 4);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_last_id()
    {
        //return $this->db->select('*')->order_by('id_appointment',"desc")->limit(1)->get('tb_appointment')->row();
        $this->db->select('code_appointment');
        $this->db->where('SUBSTRING(code_appointment, 2, 2) =', substr(date('Y')+543, 2,2) );
        $this->db->from('tb_appointment');
        $query = $this->db->get();
        //print_r($query->result());

        $num = 0;
        foreach($query->result() as $row){
            if( intval(substr($row->code_appointment, 6, 7)) > intval(substr($num, 6, 7)) ){
                $num = $row->code_appointment;
            }
        }

        return $num;
    }

    public function insert_appointment($data_appointment)
    {
        $this->db->insert('tb_appointment', $data_appointment);
        return $this->db->insert_id();
    }

    public function confirm_appointment($id)
    {
        $this->db->set('id_status', 2);
        $this->db->where('id_appointment', $id);
        $this->db->update('tb_appointment');
    }

    public function cancel_appointment($id)
    {
        $this->db->set('id_status', 3);
        $this->db->where('id_appointment', $id);
        $this->db->update('tb_appointment');
    }
}