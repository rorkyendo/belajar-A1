<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		$data['title'] = 'Login Panel';
		$data['subtitle'] = 'Silahkan Login';
		$this->load->view('login',$data);
	}

	public function doLogin(){
		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));

		$cek = $this->Auth_model->validation($username,$password);
		if ($cek) {

			foreach ($cek as $key) {
				$dataPengguna = array(
					'nim' => $key->nim,
					'nama_lengkap' => $key->nama_lengkap,
					'LoggedIN' => TRUE,
				 );
			}

			$this->session->set_userdata($dataPengguna);
			redirect('mahasiswa');

		}else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger">Username atau password yang anda masukkan salah</div>');
			redirect('Auth/loginV2');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Auth/loginV2');
	}

	public function forgetPass(){
		$data['title'] = 'Ubah Password';
		$data['subtitle'] = 'Silahkan Ubah Password Disini';
		$this->load->view('forgetPassword',$data);
	}

	public function doResetPassword(){
		$email = $this->input->post('email');
		$cek = $this->General_model->get_by_id_general('pengguna','email',$email);
		if ($cek) {
			$passwordBaru = "C";

			$dataPengguna = array('password' => $passwordBaru);
			if ($this->General_model->update_general('pengguna','email',$email,$dataPengguna) == TRUE) {
				$this->session->set_flashdata('notif','<div class="alert alert-success">Password berhasil diubah</div>');

				$subject = "Ubah Password";
				$mailContent = "<h1>Perbuahan Password Baru</h1>";
				$mailContent .= "<p>Password baru kamu :".$passwordBaru."</p>";
				$mailTo = $email;
				$mailFromId = "Administrator";
				$mailFromName = "Administrator";

				sendMail($subject, $mailContent, $mailTo, $mailFromId, $mailFromName);

				redirect('Auth/forgetPass');
			}else {
				$this->session->set_flashdata('notif','<div class="alert alert-danger">Terjadi Kesalahan</div>');
				redirect('Auth/forgetPass');
			}

		}else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger">Email Tidak ditemukan</div>');
			redirect('Auth/forgetPass');
		}
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
