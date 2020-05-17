<?php

class m_komentar extends CI_Model
{

    // Detail Tbl Komentar
    public function getAll()
    {
        return $this->db->get('tbl_komentar')->result();
    }

    // Tbl Hitung jumlah Komentar
    public function jumlah_komentar()
    {
        $this->db->select('COUNT(*) AS jumlah');
        $this->db->from('tbl_komentar');
        $this->db->order_by('id_komentar', 'desc');

        $query = $this->db->get();
        return $query->row();
    }

    // Tambah Data Pegawai
    public function simpan_add($data)
    {
        $this->db->insert('tbl_komentar', $data);
    }

    // Delete Data Komentar
    public function delete($id_komentar)
    {
        $this->db->delete('tbl_komentar', array('id_komentar' => $id_komentar));
    }
}
