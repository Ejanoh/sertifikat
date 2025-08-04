<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat_model extends CI_Model
{

    public function get_all()
    {
        return $this->db->get('sertifikat')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('sertifikat', ['id' => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('sertifikat', $data);
    }

    public function update($id, $data)
    {
        return $this->db->update('sertifikat', $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('sertifikat', ['id' => $id]);
    }

    public function update_status($id, $status)
    {
        return $this->db->update('sertifikat', [
            'status' => $status,
            'tanggal_acc' => date('Y-m-d H:i:s')
        ], ['id' => $id]);
    }
}
