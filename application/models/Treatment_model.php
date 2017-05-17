<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Treatment_model extends CI_Model
{
    public function search_by_id($id)
    {
        $this->db->from('tb_treatment a');
        $this->db->join('tb_clinic b', 'a.id_clinic=b.id_clinic', 'left');
        $this->db->where('id_treatment', $id);
        $query = $this->db->get();
        return $query->row();
    }

    /** Search Treatment**/
    public function search($text)
    {
        $this->db->from('tb_treatment a');
        $this->db->join('tb_clinic b', 'a.id_clinic=b.id_clinic', 'left');
        $this->db->like('tag_search', $text);
        $this->db->limit(5);
        $query = $this->db->get();

        $data = array();
        foreach ($query->result() as $row)
        {
            $data[] = array(
                'id_treatment'  => $row->id_treatment,
                'id_clinic'     => $row->id_clinic,
                'name_treatment'=> $row->name_treatment,
                'tag_search'    => $row->tag_search,
                'name_clinic'   => $row->name_clinic,
                'status'        => $row->status,
            );
        }
//       $data= $query->result();
        return $data;
    }

    public function treatment_all($text)
    {
        $this->db->select('*');
        $this->db->from('tb_treatment a');
        $this->db->join('tb_doctor_clinic b', 'a.id_clinic=b.id_clinic', 'left');
        $this->db->join('tb_clinic c', 'b.id_clinic=c.id_clinic', 'left');
        $this->db->like('a.tag_search', $text);
        $this->db->group_by('a.id_treatment');
        $query = $this->db->get();
       return $query->result_array();
//        print_r($query->result_array());

    }

}