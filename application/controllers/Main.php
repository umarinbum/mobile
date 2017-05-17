<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->config('appointment_config');
        $this->load->library('common');
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //$this->load->model('appointment_model');
        $this->load->model('treatment_model');
        $this->load->model('doctor_model');
        $this->load->model('doctorallotment_model');
        $this->load->model('member_model');
        $this->load->model('agent_model');
        $this->load->model('appointment_model');
        // print_r($this->session->userdata());
        // exit;
    }
	
    /************** Login Page **************/
	public function index()
	{
        $data['link_form'] = 'doctor/doctor_allotment';
        $this->session->set_userdata('page', 'main');
        $this->session->unset_userdata('close_social_modal');

        $session_data = $this->session->userdata();

        if( isset($session_data['login']) ){
            $result = $this->member_model->get_user_by_uid($session_data['user_profile']['user_id']);
            if( !empty($result) ){

                $get_many = $this->appointment_model->get_appointment_by_member_id($result->id_member);
                $data['many_appointment'] = !empty($get_many)?sizeof($get_many):0;
            }else{
                $data['many_appointment'] = 0;
            }
        }

        $data['css_template']= array(
            'assets/plugins/datepicker/css/bootstrap-datepicker3.standalone.min.css',
            'assets/plugins/jQuery/jquery-ui.css'
        );

        $data['js_template'] = array(
            'assets/plugins/jQuery/jquery-ui.js',
            'assets/plugins/datepicker/js/bootstrap-datepicker.min.js',
            'assets/js/main.js'
        );

		$this->load->view('main_view', $data);
	}

    // STEP 2
    public function form_insert($id, $edit=NULL)
    {
        if( !$id ){
            $this->session->set_flashdata('notify', array('type'=>'danger', 'icon'=>'exclamation-sign', 'message'=>'ผิดพลาด'));
            redirect('main');
        }

        //Check Login
        if( $this->session->userdata('login') == true ){
            $data['loggedin_profile'] = $this->session->userdata('user_profile');
        }else{
            // Toggle Login Social
            if( $edit == NULL ){
                $data['toggle_login_modal'] = true;
            }
        }

        if( $edit != NULL ){

            // Check IF Not your Appointment.
            if( !$this->session->userdata('get_secret_code') ){
                $get_appo = $this->appointment_model->get_appointment_by_id($id);
                $session_data = $this->session->userdata('user_profile');

                if( $get_appo->social_uid != $session_data['user_id'] ){
                    $this->session->set_flashdata('notify', array('type'=>'danger', 'icon'=>'exclamation-sign', 'message'=>'ไม่ใช่ การจองของคุณ'));
                    redirect('main/data_appointment');
                }
            }


            if( !isset($_GET['edit2']) ){

                $appt_array = $this->appointment_model->get_appointment_by_id($id);

                $data['doctor_allot'] = (object) array(
                    'id_appointment'        => $appt_array->id_appointment,
                    'allot_start_time'      => $appt_array->allot_time_start,
                    'allot_end_time'        => $appt_array->allot_time_end,
                    'id_member'             => $appt_array->id_member,
                    'id_doctor'             => $appt_array->id_doctor,
                    'id_clinic'             => $appt_array->id_clinic,
                    'id_treatment'          => $appt_array->id_treatment,
                    'name_doctor'           => $appt_array->name_doctor,
                    'name_clinic'           => $appt_array->name_clinic,
                    'name_treatment'        => $appt_array->name_treatment,
                    'allot_date'            => $appt_array->allot_date,
                    'allot_time_start'      => $appt_array->allot_time_start,
                    'allot_time_end'        => $appt_array->allot_time_end,
                    'id_doctor_allotment'   => $appt_array->id_doctor_allotment,
                    'appointment_firstname' => $appt_array->appointment_firstname,
                    'appointment_lastname'  => $appt_array->appointment_lastname,
                    'appointment_telephone' => $appt_array->appointment_telephone,
                    'comment'               => $appt_array->comment,
                    'code_appointment'      => $appt_array->code_appointment,
                    'secret_code'           => $appt_array->secret_code,
                    'id_status'             => $appt_array->id_status,
                );

                $this->session->set_userdata('form_var', array('patient_name' => $appt_array->appointment_firstname." ".$appt_array->appointment_lastname, 'patient_tel' => $appt_array->appointment_telephone, 'patient_wish' => $appt_array->comment, ));

            }else{
                $data_allotment = $this->doctorallotment_model->get_allotment_by_id($id);

                $data['doctor_allot'] = $this->session->userdata('doctor_allot');

                $data['doctor_allot']->allot_start_time = $data_allotment->allot_start_time;
                $data['doctor_allot']->allot_end_time = $data_allotment->allot_end_time;
                $data['doctor_allot']->id_doctor = $data_allotment->id_doctor;
                $data['doctor_allot']->id_clinic = $data_allotment->id_clinic;
                $data['doctor_allot']->name_doctor = $data_allotment->name_doctor;
                $data['doctor_allot']->allot_date = $data_allotment->allot_date;
                $data['doctor_allot']->allot_time_start = $data_allotment->allot_start_time;
                $data['doctor_allot']->allot_time_end = $data_allotment->allot_end_time;
                $data['doctor_allot']->id_doctor_allotment = $data_allotment->id_doctor_allotment;
                $data['doctor_allot']->secret_code = $data_allotment->secret_code;
            }

            $this->session->set_userdata('doctor_allot', $data['doctor_allot']);
            $this->session->set_userdata('select_treatment', $data['doctor_allot']->name_treatment);
            $this->session->set_userdata('id_treatment', $data['doctor_allot']->id_treatment);
            $this->session->set_userdata('id_doctor', $data['doctor_allot']->id_doctor);
            $this->session->set_userdata('select_date', $data['doctor_allot']->allot_date);
            $this->session->set_userdata('last_id_link', $data['doctor_allot']->id_appointment);
            $this->session->set_userdata('generated_code', $data['doctor_allot']->code_appointment);
            $data['edit_from_secret'] = TRUE;

        }else{
            $this->session->set_userdata('doctor_allot', $this->doctorallotment_model->get_allotment_by_id($id));
            $this->session->set_userdata('form_insert_id', $id);

            $data['doctor_allot'] = $this->session->userdata('doctor_allot');
        }

        //For Condition Social Login
        $this->session->set_userdata('page', 'form_insert');

        $data['page_level'] = 2;

        $data['js_template'] = array(
            'assets/js/form_insert.js'
        );

        $this->load->view('form_insert_data', $data);
    }

    // STEP 3
    public function appointment_confirm($edit = NULL)
    {
        $data['page_level'] = 3;

        //IF Submit Form
        if( $this->input->post() ){
            $config = array(
                array('field' => 'patient_name', 'label' => 'ชื่อ - สกุล', 'rules' => 'required'),
                array('field' => 'patient_tel',  'label' => 'เบอร์โทรศัพท์มือถือ', 'rules' => 'required'),
                array('field' => 'patient_wish', 'label' => 'ความประสงค์/อาการ', 'rules' => 'required'),
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE){

                $this->session->set_flashdata('notify', array('type'=>'danger', 'icon'=>'exclamation-sign', 'message'=>'กรุณากรอกข้อมูลให้ครบ'));
                redirect('main/form_insert/'.$this->session->userdata('form_insert_id'));

            }else{
                $this->session->set_userdata('form_var', $this->input->post());

                // Insert Member && Appointment.
                if( $edit == NULL ){
                    $id_member_appo = $this->appo_insert_member();
                    $last_id_link = $this->appo_insert_appointment($id_member_appo);
                    $this->session->set_userdata('last_id_link', $last_id_link);
                    redirect('main/appointment_confirm');

                }else{
                    $sess = $this->session->userdata('doctor_allot');
                    $id_member_appo = $sess->id_member;
                    $this->appointment_model->cancel_appointment($sess->id_appointment);
                    $last_id_link = $this->appo_insert_appointment($id_member_appo, $edit=TRUE);
                    $this->session->set_userdata('last_id_link', $last_id_link);
                    redirect('main/appointment_confirm/edit');
                }
            }
        }

        if( $edit != NULL ){
            $data['edit_from_secret'] = TRUE;
        }

        $data['js_template'] = array(
            'assets/js/appointment_confirm.js'
        );
        $this->load->view('data_appointment_confirm', $data);
    }


    //Save Data Appointment
    public function appo_insert_member()
    {
        $data_session =  $this->session->userdata();
        $member_firstname = explode(" ", $data_session['form_var']['patient_name']);

        // IF Login
        if( isset($data_session['user_profile']) ){
            $has_user = $this->member_model->has_user();

            // IF none user.
            if( empty($has_user) ){
                $data_member = array(
                    'firstname'             => $member_firstname[0],
                    'lastname'              => isset($member_firstname[1])?$member_firstname[1]:'',
                    'gender'                => isset($data_session['user_profile'])?$data_session['user_profile']['gender']:'',
                    'dateofbirth'           => isset($data_session['user_profile'])?date('Y-m-d',strtotime(str_replace('/','-',$data_session['user_profile']['birthday']))):'0000-00-00',
                    'telephone'            => $data_session['form_var']['patient_tel'],
                    'register_datetime'     => date('Y-m-d H:i:s'),
                    'status'                => 0,
                    'social_type'           => isset($data_session['user_profile'])?$data_session['user_profile']['type']:'',
                    'social_uid'            => isset($data_session['user_profile'])?$data_session['user_profile']['user_id']:'',
                );
                return  $this->member_model->insert_member($data_member);

            // IF Has user.
            }else{
                return $has_user->id_member;
            }
        }
    }

    function appo_insert_appointment($id_member_appo, $edit=NULL){

        $last_code = $this->appointment_model->get_last_id();
        //$last_code = !empty($get_last_id)?$get_last_id->code_appointment:NULL;
        $generated_code = $this->common->gen_appointment_code($last_code);
        $this->session->set_userdata('generated_code', $generated_code);

        $data_session =  $this->session->userdata();
        $member_firstname = explode(" ", $data_session['form_var']['patient_name']);
        $secret_code = $this->common->random_num(6);

        $data_appointment = array(
                'appointment_by'        => 'member',
                'id_admin'              => 0,
                'id_member'             => $id_member_appo,
                'id_user'               => 0,
                'date_appointment'      => date('Y-m-d H:i:s'),
                'id_clinic'             => $data_session['doctor_allot']->id_clinic,
                'id_doctor'             => $data_session['doctor_allot']->id_doctor,
                'id_treatment'          => isset($data_session['id_treatment'])?$data_session['id_treatment']:$data_session['doctor_allot']->id_treatment,
                'allot_date'            => $data_session['doctor_allot']->allot_date,
                'allot_time_start'      => $data_session['doctor_allot']->allot_start_time,
                'allot_time_end'        => $data_session['doctor_allot']->allot_end_time,
                'id_doctor_allotment'   => $data_session['doctor_allot']->id_doctor_allotment,
                'datetime_create'       => date('Y-m-d H:i:s'),
                'appointment_firstname' => $member_firstname[0],
                'appointment_lastname'  => isset($member_firstname[1])?$member_firstname[1]:'',
                'appointment_telephone' => $data_session['form_var']['patient_tel'],
                'id_agent'              => '1',
                'comment'               => $data_session['form_var']['patient_wish'],
                'code_appointment'      => $edit==NULL?$generated_code:$data_session['doctor_allot']->code_appointment,
                'secret_code'           => $edit==NULL?$secret_code:$data_session['doctor_allot']->secret_code,
                'id_status'             => 1,
        );
        //print_r($data_appointment);
        $last_id_appointment = $this->appointment_model->insert_appointment($data_appointment);

        return $last_id_appointment;
    }


	public function data_appointment()
	{
        $result = $this->member_model->has_user();

        if( empty($result) ){
            $this->session->set_flashdata('notify', array('type'=>'danger', 'icon'=>'exclamation-sign', 'message'=>'ไม่มีรายการจอง'));
            redirect('main');
        }

        $data['get_appointment'] = $this->appointment_model->get_appointment_by_member_id($result->id_member);

        $data['js_template'] = array(
            'assets/js/data_appointment_all.js'
        );

		$this->load->view('data_appointment_all', $data);
	}

    public function search_doctor()
    {
        $data['link_form'] = 'doctor/doctor_allotment';

        $data['css_template']= array(
            'assets/plugins/datepicker/css/bootstrap-datepicker3.standalone.min.css',
            'assets/plugins/jQuery/jquery-ui.css'
        );

        $data['js_template'] = array(
            'assets/plugins/jQuery/jquery-ui.js',
            'assets/plugins/datepicker/js/bootstrap-datepicker.min.js',
            'assets/js/main.js'
        );

        $this->load->view('search_doctor_form', $data);
    }

    public function final_appointment()
    {
        $this->load->view('final_appointment');
    }

    public function cancle_appointment($id)
    {
       $this->appointment_model->cancel_appointment($id);

       redirect('main/data_appointment');
    }
}
