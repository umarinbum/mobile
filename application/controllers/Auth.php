<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
    	$this->load->model('admin_model');
    }

	public function fb_get_profile()
	{
		$this->destroy_login_session();

		if ($this->facebook->is_authenticated())
		{
			$user = $this->facebook->request('get', '/me?fields=id,name,birthday,email,gender,picture');

			if (!isset($user['error']))
			{
				$user_data = array(
				    'user_id'  	=> $user['id'],
				    'name'     	=> $user['name'],
				    'birthday' 	=> $user['birthday'],
				    'email' 	=> $user['email'],
				    'gender' 	=> $user['gender'],
				    'picture'	=> $user['picture']['data']['url'],
				    'type'		=> 'f'
				);

				$this->session->set_userdata('login', true);
				$this->session->set_userdata('user_profile', $user_data);
			}
		}

		if( $this->session->userdata('page') == 'form_insert' ){
			redirect('main/form_insert/'.$this->session->userdata('form_insert_id'));
		}else{
			redirect('main/data_appointment');
		}
	}

	public function google_login()
	{
		$this->destroy_login_session();

		//IF Destroy Session
		if (isset($_GET['code'])) {
			
			$this->googleplus->getAuthenticate();
			$this->session->set_userdata('login',true);

			$user = $this->googleplus->getUserInfo();

			$user_data = array(
				'user_id'  	=> $user['id'],
				'name'     	=> $user['name'],
				'birthday' 	=> '',
				'email' 	=> '',
				'gender' 	=> $user['gender'],
				'picture'	=> $user['picture'],
				'type'		=> 'g'
			);

			$this->session->set_userdata('user_profile', $user_data);
		}

		if( $this->session->userdata('page') == 'form_insert' ){
			redirect('main/form_insert/'.$this->session->userdata('form_insert_id'));
		}else{
			redirect('main/data_appointment');
		}
	}
	
	public function auth_admin()
	{
		if( $_POST ){
			$result = $this->admin_model->get($_POST);
			if( !empty($result) ){

				$newdata = array(
					'id_admin'		=> $result[0]->id_admin,
					'name_doctor'	=> $result[0]->name_doctor,
					'name_employee' => $result[0]->name_employee,
					'permission' 	=> $result[0]->permission,
					'status' 		=> $result[0]->status,
					'id_doctor' 	=> $result[0]->id_doctor,
					'slot_doctor' 	=> $result[0]->slot_doctor,
					'img_doctor'	=> $result[0]->img_doctor,
				);
				$this->session->set_userdata('admin_login', $newdata);
				redirect('admin');

			}else{
				$this->session->set_flashdata('notify', array('type'=>'danger', 'icon'=>'exclamation-sign', 'message'=>'Username หรือ Password ไม่ถูกต้อง'));
            	redirect('auth/auth_admin');
			}
		}

		$this->load->view('admin/admin_login');
	}




	//Logout for web redirect example
	public function fb_logout()
	{
		$this->facebook->destroy_session();
		redirect('main', redirect);
	}

	public function session_destroy()
	{
		$this->session->sess_destroy();
		redirect('main', redirect);
	}

	public function dashboard_session_destroy()
	{
		$this->session->sess_destroy();
		redirect('admin', redirect);
	}

	public function destroy_login_session()
	{
		$this->session->set_userdata('login', false);
		$this->session->unset_userdata(array('user_id'=>'', 'name'=>'', 'birthday'=>'', 'email'=>'', 'gender'=>'', 'picture'=>''));
	}

	public function show_session()
	{
		print_r($this->session->userdata());
	}
}