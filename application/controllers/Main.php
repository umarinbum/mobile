<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->config('appointment_config');
        $this->load->library('common');
        
        $this->load->model('appointment_model');
        $this->load->model('treatment_model');
        $this->load->model('doctor_model');
    }
	
    /************** Login Page **************/
	public function index()
	{
        $data['link_form'] = 'main/appointment_table';

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

    /************** Appointment Page **************/
    public function appointment_table($date = null)
    {
        if( $date == null ){
            if( !$this->session->userdata('select_date') ){
                $this->session->set_userdata('select_date', date('Y-m-d', strtotime('+2 days', strtotime(date('Y-m-d')))) );
            }
        }else{
            $this->session->set_userdata('select_date', $date);
        }

        if( !empty($this->input->post()) ){
            $this->session->set_userdata('select_treatment', $this->input->post('search') );

            $search = $this->input->post('search');
        }



        $data['page_level'] = 1;
        $data['times'] = $this->config->item('appointment_times');
        $data['doctors'] = $this->doctor_model->get_doctor();

        $result = $this->appointment_model->get_appointment_by_date($this->session->userdata('select_date'));
        $data['result_data'] = $this->common->merge_array_same_doctor($result);

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

	public function data_appointment()
	{
        $data['js_template'] = array(
            'assets/js/data_appointment_all.js'
        );

		$this->load->view('data_appointment_all', $data);
	}

    public function search_doctor()
    {
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



    public function appointment_detail()
    {
        $this->load->view('data_appointment_detail');
    }

    public function form_insert($id=null)
    {
        if( !$this->session->userdata('login') ){
            $data['session_login'] = false;
        }

        $data['page_level'] = 2;
        
        $this->load->view('form_insert_data', $data);
    }

    public function appointment_confirm()
    {
        $data['page_level'] = 3;
        
        $this->load->view('data_appointment_confirm', $data);
    }


    public function search_procedure($text)
    {
        $data['link_form'] = '';
        $data['css_template']= array(
            'assets/plugins/datepicker/css/bootstrap-datepicker3.standalone.min.css',
            'assets/plugins/jQuery/jquery-ui.css'
        );

        $data['js_template'] = array(
            'assets/plugins/jQuery/jquery-ui.js',
            'assets/plugins/datepicker/js/bootstrap-datepicker.min.js',
            'assets/js/main.js'
        );


        $this->load->view('template/search_procedure',$data);
    }
    public function thank_you()
    {
              $this->load->view('form_thank');
    }

}
