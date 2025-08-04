<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_gejala extends CI_Model
{
	// Get semua atau satu data di tabel penyakit
	public function get($kode = '')
	{
		$this->db->select('gejala.kodegejala, gejala.namagejala, gejala.ketgejala, gejala.kodepenyakit, penyakit.namapenyakit');
		$this->db->from('gejala');
		$this->db->join('penyakit', 'gejala.kodepenyakit = penyakit.kodepenyakit');
		if ($kode != '') {
			$this->db->where('gejala.kodegejala', $kode);
		}
		return $this->db->get();
	}

	// Insert User
	public function insert($data)
	{
		$this->db->insert('penyakit', $data);
	}

	// update User
	public function update($data)
	{
		$this->db->where('kodepenyakit', $data['kodepenyakit']);
		$this->db->update('penyakit', $data);
	}

	// Delete User
	public function delete($kode)
	{
		$this->db->where('kodepenyakit', $kode);
		$this->db->delete('penyakit');
	}
}
