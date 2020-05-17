<?php

class m_pelanggan extends CI_Model
{

    // Detail Tbl Pelanggan
    public function getAll()
    {
        return $this->db->get('tbl_pelanggan')->result();
    }

    // Login
    public function getPelanggan($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        return $this->db->get('tbl_pelanggan');
    }

    // Pelanggan Yang Sudah Login
    public function sudah_login($email, $nama)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->where(array(
            'email' => $email,
            'nama' => $nama
        ));
        $this->db->order_by('id_pelanggan', 'desc');

        $query = $this->db->get();
        return $query->row();
    }

    // Tambah Data Pelanggan
    public function simpan_add($data)
    {
        $this->db->insert('tbl_pelanggan', $data);
    }

    // Edit Data Pelanggan - Untuk Mengambil Detail Data
    public function getWhere($id_pelanggan)
    {
        return $this->db->where('id_pelanggan', $id_pelanggan)->get('tbl_pelanggan')->row();
    }

    // Edit Data Pelanggan - Simpan Setelah Diedit
    public function simpan_edit($id_pelanggan, $data)
    {
        $this->db->where('id_pelanggan', $id_pelanggan)->update('tbl_pelanggan', $data);
    }

    // Delete Data Pelanggan
    public function delete($id_pelanggan)
    {
        $this->db->delete('tbl_pelanggan', array('id_pelanggan' => $id_pelanggan));
    }
}
