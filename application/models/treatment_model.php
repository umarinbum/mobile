<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Treatment_model extends CI_Model
{

    /** Search Treatment**/
    public  function search($text)
    {
        $this->db->select('*');
        $this->db->like('tag_search', $text);
        $query = $this->db->get('tb_treatment',5);
        $data = array();
        foreach ($query->result() as $row)
        {
            $data[] = array(
                'data'=> $row->id_treatment,
                'value'=> $row->name_treatment,
            );
        }
//       $data= $query->result();
        return $data;
    }
    public  function treatment_all($text)
    {
        $this->db->select('*');
        $this->db->from('tb_treatment a');
        $this->db->join('tb_doctor_clinic b', 'a.id_clinic=b.id_clinic', 'left');
        $this->db->join('tb_clinic c', 'b.id_clinic=c.id_clinic', 'left');
        $this->db->like('name_treatment', $text);
        $query = $this->db->get();
       return $query->result_array();
//        print_r($query->result_array());

    }

}