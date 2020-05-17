<?php

class m_galleri extends CI_Model
{
    // Detail Tbl Galleri
    public function getAll()
    {
        return $this->db->get('tbl_galleri')->result();
    }

    // Tbl Hitung jumlah Galleri
    public function jumlah_galleri()
    {
        $this->db->select('COUNT(*) AS jumlah');
        $this->db->from('tbl_galleri');
        $this->db->order_by('id_galleri', 'desc');

        $query = $this->db->get();
        return $query->row();
    }

    // Tambah Data Galleri
    public function simpan_add($data)
    {
        $this->db->insert('tbl_galleri', $data);
    }

    // Edit Data Galleri - Untuk Mengambil Detail Data
    public function getWhere($id_galleri)
    {
        return $this->db->where('id_galleri', $id_galleri)->get('tbl_galleri')->row();
    }

    // Edit Data Galleri - Simpan Setelah Diedit
    public function simpan_edit($id_galleri, $data)
    {
        $this->db->where('id_galleri', $id_galleri)->update('tbl_galleri', $data);
    }

    // Delete Data Galleri
    public function delete($id_galleri)
    {
        $this->db->delete('tbl_galleri', array('id_galleri' => $id_galleri));
    }
}
