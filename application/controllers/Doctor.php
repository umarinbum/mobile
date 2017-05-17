<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->config('appointment_config');
        $this->load->library('common');
        
        $this->load->model('doctorallotment_model');
        $this->load->model('treatment_model');
        $this->load->model('doctor_model');
        $this->load->model('doctorclinic_model');
    }

    public function doctor_allotment()
    {
        $search = $this->input->get('search');
        $id_treatment = $this->input->get('id_treatment');
        $doctor = $this->input->get('doctor');
        $front_date = $this->input->get('front_date');
        
        if( !$this->input->get() || !$id_treatment ){
            $this->session->set_flashdata('notify', array('type'=>'danger', 'icon'=>'exclamation-sign', 'message'=>'ไม่พบหัตถการนี้'));
            redirect('main');
        }
        
        $data_treatment = $this->treatment_model->search_by_id($id_treatment);
        
        if( !empty($data_treatment) ){
            $this->session->set_userdata('select_treatment', $search);
            $this->session->set_userdata('id_treatment', $id_treatment);
            $this->session->set_userdata('id_doctor', $doctor);
            $this->session->set_userdata('select_date', $front_date);
            
            
            $data['page_level'] = 1;
            $data['times'] = $this->config->item('appointment_times');
            $data['doctors'] = $this->doctorclinic_model->get_doctor_clinic();

            $result = $this->doctorallotment_model->get_allotment($data_treatment->id_clinic, $doctor, $front_date);
            $data['result_data'] = $this->common->merge_array_same_doctor($result);

            if( !empty($data['result_data']) ){
                $doc2 = array();
                foreach( $data['doctors'] as $row ){

                    $doc2[$row->id_doctor] = array(
                        'id_doctor_clinic'  => $row->id_doctor_clinic,
                        'id_clinic'         => $row->id_clinic,
                        'id_doctor'         => $row->id_doctor,
                        'status'            => $row->status,
                        'name_clinic'       => $row->name_clinic,
                        'name_doctor'       => $row->name_doctor,
                        'img_doctor'        => $row->img_doctor,
                    );
                }

                $doc3 = array();
                foreach($data['result_data'] as $row=>$value){

                    $doc3[] = array(
                        'id_doctor_clinic'  => $doc2[$row]['id_doctor_clinic'],
                        'id_clinic'         => $doc2[$row]['id_clinic'],
                        'id_doctor'         => $doc2[$row]['id_doctor'],
                        'status'            => $doc2[$row]['status'],
                        'name_clinic'       => $doc2[$row]['name_clinic'],
                        'name_doctor'       => $doc2[$row]['name_doctor'],
                        'img_doctor'        => $doc2[$row]['img_doctor'],
                    );      
                }

                $data['doc_finish'] = $doc3;
            }
        }else{
            //Data next 5 days
        }
            


        $data['css_template'] = array(
            'assets/plugins/datepicker/css/bootstrap-datepicker3.standalone.min.css',
            'assets/css/appointment_table.css',
        );
        
        $data['js_template'] = array(
            'assets/plugins/datepicker/js/bootstrap-datepicker.min.js',
            'assets/js/appointment_view.js',
        );

        $this->load->view('appointment_view', $data);
    }

}
	