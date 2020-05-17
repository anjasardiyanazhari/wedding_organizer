<?php

class m_transaksi extends CI_Model
{

    // Tbl Transaksi
    public function getAll()
    {
        return $this->db->get('tbl_transaksi')->result();
    }

    // Detail Get Riwayat Transaksi Berdasarkan Tbl Header Transaksi
    public function getKode_transaksi($kode_transaksi)
    {
        $this->db->select('tbl_transaksi.*,
                        tbl_fasilitas.nama_fasilitas,
                        tbl_fasilitas.kode_fasilitas');

        $this->db->from('tbl_transaksi');
        // Join dengan Failitas
        $this->db->join('tbl_fasilitas', 'tbl_fasilitas.id_fasilitas = tbl_transaksi.id_fasilitas', 'left');
        // End Join
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->order_by('id_transaksi', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    // Tambah Data Transaksi
    public function simpan_add($data)
    {
        $this->db->insert('tbl_transaksi', $data);
    }

    // Edit Data Transaksi - Untuk Mengambil Detail Data
    public function getWhere($id_transaksi)
    {
        return $this->db->where('id_transaksi', $id_transaksi)->get('tbl_transaksi')->row();
    }

    // Detail Slug Transaksi
    public function read($slug_transaksi)
    {
        return $this->db->where('slug_transaksi', $slug_transaksi)->get('tbl_transaksi')->row();
    }

    // Edit Data Transaksi - Simpan Setelah Diedit
    public function simpan_edit($id_transaksi, $data)
    {
        $this->db->where('id_transaksi', $id_transaksi)->update('tbl_transaksi', $data);
    }

    // Delete Data Header Transaksi
    public function delete($kode_transaksi)
    {
        $this->db->delete('tbl_transaksi', array('kode_transaksi' => $kode_transaksi));
    }
}
