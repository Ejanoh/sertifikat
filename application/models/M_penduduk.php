<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penduduk extends CI_Model
{
	public function get()
	{
		$sql = "SELECT * FROM `penduduk`";
		$data = $this->db->query($sql);
		return $data;
	}

	public function get_where($id)
	{
		$sql = "SELECT * FROM `penduduk` WHERE id = '" . $id . "'";
		$data = $this->db->query($sql);
		return $data->row();
	}

	public function dosis1()
	{
		$sql = "SELECT * FROM `penduduk` WHERE sd1 = '1'";
		$data = $this->db->query($sql);
		return $data;
	}

	public function dosis2()
	{
		$sql = "SELECT * FROM `penduduk` WHERE sd2 = '1'";
		$data = $this->db->query($sql);
		return $data;
	}

	public function dosis3()
	{
		$sql = "SELECT * FROM `penduduk` WHERE sd3 = '1'";
		$data = $this->db->query($sql);
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('penduduk', $data);
	}

	public function update($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('penduduk', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('penduduk');
	}
}
