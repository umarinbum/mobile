<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
    	$this->load->config('appointment_config');
    	$this->load->model('appointment_model');
    	$this->load->model('doctor_model');
    }
	
	public function index()
	{
		$data['times'] = $this->config->item('appointment_times');

		$result = $this->appointment_model->get_appointment_by_date('2017-03-15');
		$data['doctors'] = $this->doctor_model->get_doctor();

		$data['result_data'] = $this->merge_array_same_doctor($result);
		//print_r($merge);
		
		$this->load->view('appointment_view', $data);
	}

	public function merge_array_same_doctor($result)
	{
		$arry = array();

		foreach( $result as $row ){

			$start_time = substr($row['allot_time_start'],0,-3);
			$end_time = substr($row['allot_time_end'],0,-3);

			if( !isset($arry[$row['id_doctor']]) ){

				$arry[$row['id_doctor']][$start_time] = array(
					'id_appointment' 	=> $row['id_appointment'],
					'id_admin' 			=> $row['id_admin'],
					'id_doctor' 		=> $row['id_doctor'],
					'allot_date' 		=> $row['allot_date'],
					'allot_time_start' 	=> $start_time,
					'allot_time_end' 	=> $end_time,
					'name_doctor' 		=> $row['name_doctor'],
					'status' 			=> $row['status'],
					'username_yhh_app' 	=> $row['username_yhh_app'],
					'distance_time'		=> $this->distance_time_value($start_time, $end_time),
				);

			}else{

				$arry[$row['id_doctor']][$start_time]['id_appointment'] = $row['id_appointment'];
				$arry[$row['id_doctor']][$start_time]['id_admin'] = $row['id_admin'];
				$arry[$row['id_doctor']][$start_time]['id_doctor'] = $row['id_doctor'];
				$arry[$row['id_doctor']][$start_time]['allot_date'] = $row['allot_date'];
				$arry[$row['id_doctor']][$start_time]['allot_time_start'] = $start_time;
				$arry[$row['id_doctor']][$start_time]['allot_time_end'] = $end_time;
				$arry[$row['id_doctor']][$start_time]['name_doctor'] = $row['name_doctor'];
				$arry[$row['id_doctor']][$start_time]['status'] = $row['status'];
				$arry[$row['id_doctor']][$start_time]['username_yhh_app'] = $row['username_yhh_app'];
				$arry[$row['id_doctor']][$start_time]['distance_time'] = $this->distance_time_value($start_time, $end_time);
			}
		}

		return $arry;
	}

	public function distance_time_value( $start_time, $end_time )
	{
		$str_start_time = strtotime($start_time);
		$str_end_time = strtotime($end_time);

		$run = 0;
		while ($str_start_time <= $str_end_time) {
			$str_start_time = strtotime('+30 minutes', $str_start_time);

			$run++;
		}

		return $run;
	}
}
