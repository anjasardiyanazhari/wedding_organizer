<?php

class m_contact extends CI_Model
{

    // Detail Tbl Komentar
    public function getAll()
    {
        return $this->db->get('tbl_contact')->result();
    }

    // Tbl Hitung jumlah Komentar
    public function jumlah_contact()
    {
        $this->db->select('COUNT(*) AS jumlah');
        $this->db->from('tbl_contact');
        $this->db->order_by('id_contact', 'desc');

        $query = $this->db->get();
        return $query->row();
    }

    // Tambah Data Pegawai
    public function simpan_add($data)
    {
        $this->db->insert('tbl_contact', $data);
    }

    // Delete Data Komentar
    public function delete($id_contact)
    {
        $this->db->delete('tbl_contact', array('id_contact' => $id_contact));
    }
}
