<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		$data['title'] = 'Login Panel';
		$data['subtitle'] = 'Silahkan Login';
		$this->load->view('login',$data);
	}

	public function loginV2()
	{
		$data['title'] = 'Login Panel';
		$data['subtitle'] = 'Silahkan Login';
		$this->load->view('loginV2',$data);
	}

	public function register()
	{
		$data['title'] = 'Register Panel';
		$data['subtitle'] = 'Silahkan Lakukan Pendaftaran';
		$this->load->view('register',$data);
	}

	public function registerV2()
	{
		$data['title'] = 'Register Panel';
		$data['subtitle'] = 'Silahkan Lakukan Pendaftaran';
		$this->load->view('registerV2',$data);
	}

	public function doRegisterWithJquery(){

		$dataMahasiswa = array(
			'nim' => $this->input->post('nim'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'jenkel' => $this->input->post('jenkel'),
			'alamat' => $this->input->post('alamat'),
			'fakultas' => $this->input->post('fakultas'),
			'prodi' => $this->input->post('prodi'),
		);

		$dataPengguna = array(
			'nim' => $this->input->post('nim'),
			'username' => $this->input->post('username'),
			'password' => sha1($this->input->post('password')),
		);

		$savePengguna = $this->General_model->create_general('pengguna',$dataPengguna);
		$saveDataMahasiswa = $this->General_model->create_general('mahasiswa',$dataMahasiswa);

		if (($saveDataMahasiswa && $savePengguna) == TRUE) {
			echo "Data Berhasil disimpan!";
		}else {
			echo "terjadi kesalahan!";
		}

	}

	public function cekNim(){
		$nim = $this->input->get('nim');
		$cek = $this->General_model->get_by_id_general('pengguna','nim',$nim);

		if($cek){
			echo "true";
		}else {
			echo "false";
		}

	}

	public function mahasiswa(){
		$this->General_model->get_general('mahasiswa');
	}

}
