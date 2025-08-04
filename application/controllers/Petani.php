<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petani extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('M_penduduk');
	}

	public function index()
	{
		$data = [
			'title' 		=> 'Petani',
		];
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/petani/index', $data);
		$this->load->view('layout/footer');
	}

	// fungsi registrasi
	public function regist()
	{
		$this->form_validation->set_rules('namapetani', 'Nama Lengkap', 'required|trim|min_length[3]', [
			'required' => 'Nama Lengkap harus diisi!',
			'min_length' => 'Nama Lengkap terlalu pendek!',
		]);
		$this->form_validation->set_rules('nohp', 'Nomor Hp', 'required|trim|numeric|min_length[11]|max_length[15]', [
			'required' => 'Nomor Hp harus diisi!',
			'numeric' => 'Nomor Hp harus berupa angka!',
			'min_length' => 'Nomor Hp terlalu pendek!',
			'max_length' => 'Nomor Hp terlalu panjang, maksimal 15 karakter!',
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required' => 'Username harus diisi!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|max_length[20]', [
			'min_length' => 'Password terlalu pendek!',
			'max_length' => 'Password terlalu panjang, maksimal 20 karakter!',
		]);

		if ($this->form_validation->run() == false) {
			$data = [
				'title' 		=> 'Registrasi',
			];
			
			$this->load->view('content/login/layout/header', $data);
			$this->load->view('content/login/regist', $data);
			$this->load->view('content/login/layout/footer');
		} else {
			$data = [
				'namapetani' 	=> htmlspecialchars($this->input->post('namapetani', true)),
				'nohp' 			=> htmlspecialchars($this->input->post('nohp', true)),
				'data_created' 	=> time()
			];

			$datauser = [
				'username' 		=> htmlspecialchars($this->input->post('username', true)),
				'password' 		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'namauser' 		=> htmlspecialchars($this->input->post('namapetani', true)),
				'role' 		=> 2,
				'status' 	=> 1,
				'date_created' 	=> time()
			];

			$result = $this->M_petani->regist($data, $datauser);
			if ($result) {
				$this->session->set_flashdata('swetalert', '`Good Job!`, `Selamat! Akun anda telah terdaftar. Silahkan login`, `success`');
			} else {
				$this->session->set_flashdata('swetalert', '`Upsss!`, `Maaf! Akun anda gagal terdaftar. Silahkan coba lagi`, `error`');
			}
			redirect('login');
		}
	}
}
