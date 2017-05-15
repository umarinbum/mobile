<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
    }

	public function fb_get_profile()
	{
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
				    'pictire'	=> $user['picture']['data']['url'],
				);

				$this->session->set_userdata('login', true);
				$this->session->set_userdata('user_profile', $user_data);		

				// print_r($this->session->userdata());
				// exit;
			}
		}

		redirect('main/data_appointment');
	}

	public function google_login()
	{
		
		if($this->session->userdata('login') == true){
			redirect('main/data_appointment');
		}
		
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
				'pictire'	=> $user['picture'],
			);

			$this->session->set_userdata('user_profile', $user_data);
			
			// print_r($this->session->userdata());
			// exit;

			redirect('main/data_appointment');
		} 
		
		// IF Not Login
		$data['login_url'] = $this->googleplus->loginURL();
		$this->load->view('welcome_message',$data);
	}
	
	public function google_get_profile(){
		
		if($this->session->userdata('login') != true){
			redirect('');
		}
		
		$data['user_profile'] = $this->session->userdata('user_profile');
		print_r($this->session->userdata());
		//$this->load->view('profile',$data);
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
}