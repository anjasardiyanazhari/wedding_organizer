<?php

class m_konfigurasi extends CI_Model
{

    // Detail Tbl Pelanggan
    public function getAll()
    {
        $query = $this->db->get('tbl_konfigurasi');
        return $query->row();
    }

    //edit
    public function simpan_edit($data)
    {
        $this->db->where('id_konfigurasi', $data['id_konfigurasi']);
        $this->db->update('tbl_konfigurasi', $data);
        // $this->db->where('id_konfigurasi', $id_konfigurasi)->update('tbl_konfigurasi', $data);
    }

    // Edit Data Konfigurasi Logo - Untuk Mengambil Detail Data
    public function getWhere($id_konfigurasi)
    {
        return $this->db->where('id_konfigurasi', $id_konfigurasi)->get('tbl_konfigurasi')->row();
    }

    // Menu kategori Fasilitas Di Halaman Depan
    public function nav_fasilitas()
    {
        $this->db->select('tbl_fasilitas.*,
						tbl_kategori.nama_kategori,
                        tbl_kategori.slug_kategori');

        $this->db->from('tbl_fasilitas');
        //join

        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_fasilitas.id_kategori', 'left');

        //end join
        $this->db->group_by('tbl_fasilitas.id_kategori');
        $this->db->order_by('tbl_kategori.urutan', 'ASC');

        $query = $this->db->get();
        return $query->result();
    }
}
