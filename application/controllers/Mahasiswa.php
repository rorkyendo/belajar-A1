<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Data mahasiswa';
		$data['subtitle'] = 'List Data Mahasiswa';
		$data['mahasiswa'] = $this->General_model->get_general('mahasiswa');
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('modul/mahasiswa/index',$data);
		$this->load->view('template/footer');
	}

	public function detail($nim){
		$dataMahasiswa = $this->General_model->get_by_id_general('mahasiswa','nim',$nim);
		if ($dataMahasiswa == TRUE) {
			$dataMahasiswa = json_encode($dataMahasiswa);
			echo $dataMahasiswa;
		}else {
			echo "";
		}
	}

	// public function edit($nim){
	// 	$dataMahasiswa = array(
	// 		'nama_lengkap' => $nama_lengkap,
	// 		'jen' => $nama_lengkap,
	// 	);
	// }

}
