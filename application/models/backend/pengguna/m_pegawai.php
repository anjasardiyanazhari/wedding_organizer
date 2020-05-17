<?php

class m_pegawai extends CI_Model
{

    // Login
    public function getPegawai($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('tbl_pegawai');
    }

    // Detail Tbl Pegawai
    public function getAll()
    {
        return $this->db->get('tbl_pegawai')->result();
    }

    // Tbl Hitung jumlah Pegawai
    public function jumlah_pegawai()
    {
        $this->db->select('COUNT(*) AS jumlah');
        $this->db->from('tbl_pegawai');
        $this->db->order_by('id_pegawai', 'desc');

        $query = $this->db->get();
        return $query->row();
    }

    // Tambah Data Pegawai
    public function simpan_add($data)
    {
        $this->db->insert('tbl_pegawai', $data);
    }

    // Edit Data Pegawai - Untuk Mengambil Detail Data
    public function getWhere($id_pegawai)
    {
        return $this->db->where('id_pegawai', $id_pegawai)->get('tbl_pegawai')->row();
    }

    // Edit Data Pegawai - Simpan Setelah Diedit
    public function simpan_edit($id_pegawai, $data)
    {
        $this->db->where('id_pegawai', $id_pegawai)->update('tbl_pegawai', $data);
    }

    // Delete Data Pegawai
    public function delete($id_pegawai)
    {
        $this->db->delete('tbl_pegawai', array('id_pegawai' => $id_pegawai));
    }
}
