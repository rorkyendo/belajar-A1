<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		$data['title'] = 'Login Panel';
		$data['subtitle'] = 'Silahkan Login';
		$this->load->view('login',$data);
	}

	public function register()
	{
		$data['title'] = 'Register Panel';
		$data['subtitle'] = 'Silahkan Lakukan Pendaftaran';
		$this->load->view('register',$data);
	}


}