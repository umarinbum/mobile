<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class appointment extends CI_Controller
{

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
    }

    public function appointment_detail()
    {
        if( $this->input->post() ){
            $this->session->unset_userdata('user_profile', '');
            $this->session->unset_userdata('login', '');
            $this->session->set_userdata('get_secret_code', $_POST['code']);
        }

        $result = $this->appointment_model->get_appointment($this->session->userdata('get_secret_code'));

        if ( empty($result) )
        {
            $this->session->set_flashdata('notify', array('type'=>'danger', 'icon'=>'exclamation-sign', 'message'=>'รหัสไม่ถูกต้อง'));
            redirect('main');
        }
        else
        {
            $data['appointment'] = $result;
            $this->load->view('data_appointment_detail',$data);
        }
    }
    
    public function appointment_print($code)
    {
        $result = $this->appointment_model->get_appointment($code);

        if ($code != $result[0]->secret_code)
        {
            $this->session->set_flashdata('notify', array('type'=>'danger', 'icon'=>'exclamation-sign', 'message'=>'รหัสไม่ถูกต้อง'));
            redirect('main');
        }
        else
        {

            $htmlFilePath = FCPATH.'assets/html/'.$code.'.html';
            ob_start();
            $data['appointment'] = $result;
            $this->load->view('data_appointment_print',$data);
            file_put_contents($htmlFilePath, ob_get_clean());
            $this->create_pdf($code);
        }

    }


    public function create_pdf($code)
    {    $pdfFilePath = FCPATH.'assets/pdf/'.$code.'.pdf';
        $this->load->library('pdf');
        $pdf = new mPDF('utf-8','A4',0,'',1,1,9,16,9,9,'p');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->SetDisplayMode('fullpage');
        $html = file_get_contents('assets/html/'.$code.'.html');
        $pdf->WriteHTML(file_get_contents('assets/bootstrap/css/bootstrap.css'), 1);
        $pdf->WriteHTML(file_get_contents('assets/css/print.css'), 1);
//        $pdf->WriteHTML(file_get_contents('assets/css/main.css'), 1);
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, 'F');
        $pdf->Output();

    }
}