<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_management extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('admin_login')) {
            redirect('auth/auth_admin');
        }
    }

    public function user()
    {
        //print_r($this->session->userdata('admin_login'));

        $data['css_template'] = array(
            'assets/plugins/datepicker/css/bootstrap-datepicker3.standalone.min.css',
            'assets/css/appointment_table.css',
        );

        $data['js_template'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js',
            'assets/js/admin_appointment.js',
        );

        $this->load->view('admin/header',$data);
        $this->load->view('admin/admin_user_list_view');
        $this->load->view('admin/footer',$data);

    }

    public function treatment()
    {
        //print_r($this->session->userdata('admin_login'));

        $data['css_template'] = array(
            'assets/plugins/datepicker/css/bootstrap-datepicker3.standalone.min.css',
            'assets/css/appointment_table.css',
        );

        $data['js_template'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js',
            'assets/js/admin_appointment.js',
        );

        $this->load->view('admin/header',$data);
        $this->load->view('admin/admin_treatment_list');
        $this->load->view('admin/footer',$data);

    }

    public function doctor()
    {
        //print_r($this->session->userdata('admin_login'));

        $data['css_template'] = array(
            'assets/plugins/datepicker/css/bootstrap-datepicker3.standalone.min.css',
            'assets/css/appointment_table.css',
        );

        $data['js_template'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js',
            'assets/js/admin_appointment.js',
        );

        $this->load->view('admin/header',$data);
        $this->load->view('admin/admin_doctor_list');
        $this->load->view('admin/footer',$data);

    }
    public function doctor_form()
    {
        //print_r($this->session->userdata('admin_login'));

        $data['css_template'] = array(
            'assets/plugins/datepicker/css/bootstrap-datepicker3.standalone.min.css',
            'assets/css/appointment_table.css',
        );

        $data['js_template'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js',
            'assets/js/admin_appointment.js',
        );

        $this->load->view('admin/header',$data);
        $this->load->view('admin/admin_doctor_form');
        $this->load->view('admin/footer',$data);

    }

}