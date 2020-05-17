<?php

class m_header_transaksi extends CI_Model
{

    // Tbl Header Transaksi
    public function getAll()
    {
        $this->db->select('tbl_header_transaksi.*,
                        tbl_pelanggan.nama,
                        SUM(tbl_transaksi.jumlah) AS total_item');
        $this->db->from('tbl_header_transaksi');
        // Join
        $this->db->join('tbl_transaksi', 'tbl_transaksi.kode_transaksi = tbl_header_transaksi.kode_transaksi', 'left');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = tbl_header_transaksi.id_pelanggan', 'left');
        // End Join
        $this->db->group_by('tbl_header_transaksi.id_header_transaksi');
        $this->db->order_by('id_header_transaksi', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    // Tbl Hitung jumlah Transaksi
    public function jumlah_header_transaksi()
    {
        $this->db->select('COUNT(*) AS jumlah');
        $this->db->from('tbl_header_transaksi');
        $this->db->order_by('id_header_transaksi', 'desc');

        $query = $this->db->get();
        return $query->row();
    }

    // Tbl Header Transaksi dari Pelangan
    public function getTransaksi_pelanggan($id_pelanggan)
    {
        $this->db->select('tbl_header_transaksi.*,SUM(tbl_transaksi.jumlah) AS total_item');
        $this->db->from('tbl_header_transaksi');
        $this->db->where('tbl_header_transaksi.id_pelanggan', $id_pelanggan);
        // Join
        $this->db->join('tbl_transaksi', 'tbl_transaksi.kode_transaksi = tbl_header_transaksi.kode_transaksi', 'left');
        // End Join
        $this->db->group_by('tbl_header_transaksi.id_header_transaksi');
        $this->db->order_by('id_header_transaksi', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    // Detail Get Riwayat Transaksi Tbl Header Transaksi
    public function getKode_transaksi($kode_transaksi)
    {
        $this->db->select('tbl_header_transaksi.*,
                        tbl_pelanggan.nama,
                        tbl_rekening.nama_bank AS bank,
                        tbl_rekening.nomor_rekening,
                        tbl_rekening.nama_pemilik,
                        SUM(tbl_transaksi.jumlah) AS total_item');
        $this->db->from('tbl_header_transaksi');
        // Join
        $this->db->join('tbl_transaksi', 'tbl_transaksi.kode_transaksi = tbl_header_transaksi.kode_transaksi', 'left');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = tbl_header_transaksi.id_pelanggan', 'left');
        $this->db->join('tbl_rekening', 'tbl_rekening.id_rekening = tbl_header_transaksi.id_rekening', 'left');
        // End Join
        $this->db->group_by('tbl_header_transaksi.id_header_transaksi');

        $this->db->where('tbl_transaksi.kode_transaksi', $kode_transaksi);
        $this->db->order_by('id_header_transaksi', 'desc');

        $query = $this->db->get();
        return $query->row();
    }

    // Tambah Data Header Transaksi
    public function simpan_add($data)
    {
        $this->db->insert('tbl_header_transaksi', $data);
    }

    // Edit Data Header Transaksi - Untuk Mengambil Detail Data
    public function getWhere($id_header_transaksi)
    {
        return $this->db->where('id_header_transaksi', $id_header_transaksi)->get('tbl_header_transaksi')->row();
    }

    // Edit Data Header Transaksi - Simpan Setelah Diedit
    public function simpan_edit($id_header_transaksi, $data)
    {
        $this->db->where('id_header_transaksi', $id_header_transaksi)->update('tbl_header_transaksi', $data);
    }

    // Detail Delete Foto Video - Untuk Mengambil Foto Video
    public function getWhereDeleteFoto($kode_transaksi)
    {
        return $this->db->where('kode_transaksi', $kode_transaksi)->get('tbl_header_transaksi')->row();
    }

    // Delete Data Header Transaksi
    public function delete($kode_transaksi)
    {
        $this->db->delete('tbl_header_transaksi', array('kode_transaksi' => $kode_transaksi));
    }
}
