<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penyakit');
		// cek_login();
		// check_admin();
	}

	// Load Halaman Management User
	public function index()
	{
		$this->loadView();
	}

	// Load View
	private function loadView($showModal = "index")
	{
		$data = [
			'title' => 'Penyakit',
			'penyakit' => $this->M_penyakit->get()->result(),
			'showModal' => $showModal
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/penyakit/index', $data);
		$this->load->view('layout/footer');
	}

	// Get Data Penyakit By Kode
	public function getOne()
	{
		$id = htmlspecialchars($this->input->post('kode', true));
		$data = $this->M_penyakit->get($id)->row();
		echo json_encode($data);
	}

	// Add User
	public function add()
	{
		$this->form_validation->set_rules('kodepenyakit', 'Kode Hama & Penyakit', 'required|trim|min_length[1]|max_length[8]|is_unique[penyakit.kodepenyakit]', [
			'required' => 'Kode Hama & Penyakit harus diisi!',
			'min_length' => 'Kode Hama & Penyakit terlalu pendek!',
			'max_length' => 'Kode Hama & Penyakit terlalu panjang!',
			'is_unique' => 'Kode Hama & Penyakit sudah digunakan!',
		]);
		$this->form_validation->set_rules('namapenyakit', 'Nama Hama & Penyakit', 'required|trim', [
			'required' => 'Nama Hama & Penyakit harus diisi!',
		]);
		$this->form_validation->set_rules('ketpenyakit', 'Keterangan Hama & Penyakit', 'required|trim', [
			'required' => 'Keterangan Hama & Penyakit harus diisi!',
		]);
		if ($this->form_validation->run() == false) {
			$this->loadView('add');
		} else {
			$data 	= [
				'kodepenyakit'		=> htmlspecialchars($this->input->post('kodepenyakit', true)),
				'namapenyakit'		=> htmlspecialchars($this->input->post('namapenyakit', true)),
				'ketpenyakit'		=> htmlspecialchars($this->input->post('ketpenyakit', true))
			];
			$result = $this->M_penyakit->insert($data);
			if ($result) {
				$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Gagal Di Tambahkan !`, `error`');
			} else {
				$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Tambahkan !`, `success`');
			}
			redirect('penyakit');
		}
	}

	// Update User
	public function update()
	{
		// Deklarasi Variable
		$kodepenyakit = htmlspecialchars($this->input->post('kodepenyakit', true));
		$namapenyakit = htmlspecialchars($this->input->post('namapenyakit', true));
		$ketpenyakit = htmlspecialchars($this->input->post('ketpenyakit', true));

		// Cek Data
		$cek = $this->M_penyakit->get($kodepenyakit)->row();

		// Cek Perubahan Data
		if ($namapenyakit == $cek->namapenyakit && $ketpenyakit == $cek->ketpenyakit) {
			$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Tidak Berubah`, `error`');
			redirect('penyakit');
		}

		// Set Rules
		$this->form_validation->set_rules('kodepenyakit', 'Kode Hama & Penyakit', 'required|trim|min_length[1]|max_length[8]', [
			'required' => 'Kode Hama & Penyakit harus diisi!',
			'min_length' => 'Kode Hama & Penyakit terlalu pendek!',
			'max_length' => 'Kode Hama & Penyakit terlalu panjang!',
		]);
		$this->form_validation->set_rules('namapenyakit', 'Nama Hama & Penyakit', 'required|trim', [
			'required' => 'Nama Hama & Penyakit harus diisi!',
		]);
		$this->form_validation->set_rules('ketpenyakit', 'Keterangan Hama & Penyakit', 'required|trim', [
			'required' => 'Keterangan Hama & Penyakit harus diisi!',
		]);

		// Cek Validasi
		if ($this->form_validation->run() == false) {
			$this->loadView('edit');
		} else {
			$data 	= [
				'kodepenyakit'		=> $kodepenyakit,
				'namapenyakit'		=> $namapenyakit,
				'ketpenyakit'		=> $ketpenyakit
			];
			$result = $this->M_penyakit->update($data);
			if ($result) {
				$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Gagal Di Ubah !`, `error`');
			} else {
				$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Ubah !`, `success`');
			}
			redirect('penyakit');
		}
	}

	// Delete User
	public function delete($id)
	{
		$result = $this->M_penyakit->delete($id);
		if ($result) {
			$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Gagal Di Hapus !`, `error`');
		} else {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Hapus !`, `success`');
		}
		redirect('penyakit');
	}
}
