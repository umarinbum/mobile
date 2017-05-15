<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->config('appointment_config');
        $this->load->library('common');
        
        $this->load->model('appointment_model');
        $this->load->model('treatment_model');
        $this->load->model('doctor_model');
        $this->load->model('doctorclinic_model');
    }

    public function join_treatment_doctor_clinic()
    {
    	$result = $this->doctorclinic_model->doctor_clinic_data();


    }

    public function data_doctor()
    {
        $id = $this->input->post('id');
        $data = $this->doctor_model->search($id);
        echo json_encode($data);
    }
    public function data_treatment()
    {
        $text=$_GET['txt'];
        $data =$this->treatment_model->search($text);
//      print_r($data);
//      exit;
        echo json_encode($data);
    }

    public  function treatment_list()
    {
        $text=$_GET['txt'];
        $data =array();
        $data['treatment_all'] = $this->treatment_model->treatment_all($text);
        $this->load->view('treatment_list_view', $data);
    }
}