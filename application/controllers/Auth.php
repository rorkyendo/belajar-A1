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

	public function loginV2()
	{
		$data['title'] = 'Login Panel';
		$data['subtitle'] = 'Silahkan Login';
		$this->load->view('loginV2',$data);
	}

	public function registerV2()
	{
		$data['title'] = 'Register Panel';
		$data['subtitle'] = 'Silahkan Lakukan Pendaftaran';
		$this->load->view('registerV2',$data);
	}

	public function doCreateWithJQUERY()
	{
		$dataMahasiswa = array(
			'nim' => $this->input->post('nim');
			'nama_lengkap' => $this->input->post('nama_lengkap');
			'jenkel' => $this->input->post('jenkel');
			'alamat' => $this->input->post('alamat');
			'fakultas' => $this->input->post('fakultas');
			'prodi' => $this->input->post('prodi');
		);

		$dataPengguna = array(
			'username' => $this->input->post('username');
			'password' => $this->input->post('password');
		);

		$allData = array(
			'dataMahasiswa' => $dataMahasiswa,
			'dataPengguna' => $dataPengguna,
		);

		$saveDataMahasiswa = $this->General_model->create_general('mahasiswa',$dataMahasiswa);
		$saveDataPengguna = $this->General_model->create_general('pengguna',$dataPengguna);
		if ($saveDataPengguna == TRUE && $saveDataMahasiswa == TRUE) {
			echo json_encode($allData);
		}else {
			echo "error";
		}
	}

}
