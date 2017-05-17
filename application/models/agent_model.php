<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent_model extends CI_Model
{
    function select_agent()
    {
        $this->db->select('*');
        $this->db->where('id_agent = 1');//เงือนไข
        $data_agent = $this->db->get('tb_agent');
//        return $data_agent->result_array();

    }

}
