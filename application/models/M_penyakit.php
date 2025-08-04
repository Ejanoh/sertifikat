<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penyakit extends CI_Model
{
	// Get semua atau satu data di tabel penyakit
	public function get($kode = ''){
		if ($kode != '') {
			$this->db->where('kodepenyakit', $kode);
		}
		return $this->db->get('penyakit');
	}

	// Insert User
	public function insert($data){
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
