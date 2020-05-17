<?php

class m_kategori extends CI_Model
{

    // Detail Tbl Kategori
    public function getAll()
    {
        return $this->db->get('tbl_kategori')->result();
    }

    // Tbl Hitung jumlah Kategori
    public function jumlah_kategori()
    {
        $this->db->select('COUNT(*) AS jumlah');
        $this->db->from('tbl_kategori');
        $this->db->order_by('id_kategori', 'desc');

        $query = $this->db->get();
        return $query->row();
    }

    // Tambah Data Kategori
    public function simpan_add($data)
    {
        $this->db->insert('tbl_kategori', $data);
    }

    // Edit Data Kategori - Untuk Mengambil Detail Data
    public function getWhere($id_kategori)
    {
        return $this->db->where('id_kategori', $id_kategori)->get('tbl_kategori')->row();
    }

    // Detail Slug Kategori
    public function read($slug_kategori)
    {
        return $this->db->where('slug_kategori', $slug_kategori)->get('tbl_kategori')->row();
    }

    // Edit Data Kategori - Simpan Setelah Diedit
    public function simpan_edit($id_kategori, $data)
    {
        $this->db->where('id_kategori', $id_kategori)->update('tbl_kategori', $data);
    }

    // Delete Data Kategori
    public function delete($id_kategori)
    {
        $this->db->delete('tbl_kategori', array('id_kategori' => $id_kategori));
    }
}
