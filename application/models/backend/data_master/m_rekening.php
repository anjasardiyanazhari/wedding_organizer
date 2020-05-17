<?php

class m_rekening extends CI_Model
{

    // Detail Tbl Rekening
    public function getAll()
    {
        return $this->db->get('tbl_rekening')->result();
    }

    // Tbl Hitung jumlah Rekening
    public function jumlah_rekening()
    {
        $this->db->select('COUNT(*) AS jumlah');
        $this->db->from('tbl_rekening');
        $this->db->order_by('id_rekening', 'desc');

        $query = $this->db->get();
        return $query->row();
    }

    // Tambah Data Rekening
    public function simpan_add($data)
    {
        $this->db->insert('tbl_rekening', $data);
    }

    // Edit Data Rekening - Untuk Mengambil Detail Data
    public function getWhere($id_rekening)
    {
        return $this->db->where('id_rekening', $id_rekening)->get('tbl_rekening')->row();
    }

    // Edit Data Rekening - Simpan Setelah Diedit
    public function simpan_edit($id_rekening, $data)
    {
        $this->db->where('id_rekening', $id_rekening)->update('tbl_rekening', $data);
    }

    // Delete Data Rekening
    public function delete($id_rekening)
    {
        $this->db->delete('tbl_rekening', array('id_rekening' => $id_rekening));
    }
}
