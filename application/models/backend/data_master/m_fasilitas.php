<?php

use Mpdf\Tag\Input;

class m_fasilitas extends CI_Model
{

    // Detail Tbl Fasilitas
    public function getAll()
    {
        $this->db->select('tbl_fasilitas.*,
                        tbl_pegawai.nama,
                        tbl_kategori.nama_kategori,
                        tbl_kategori.slug_kategori,
                        COUNT(tbl_foto.id_foto) AS total_foto');

        $this->db->from('tbl_fasilitas');
        // Join
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_fasilitas.id_pegawai', 'left');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_fasilitas.id_kategori', 'left');
        // Menampilkan angka foto
        $this->db->join('tbl_foto', 'tbl_foto.id_fasilitas = tbl_fasilitas.id_fasilitas', 'left');
        // End Join
        $this->db->group_by('tbl_fasilitas.id_fasilitas');
        $this->db->order_by('id_fasilitas', 'desc');
        $this->db->limit(12);

        return $this->db->get()->result();
    }

    // Tbl Hitung jumlah Fasilitas
    public function jumlah_fasilitas()
    {
        $this->db->select('COUNT(*) AS jumlah');
        $this->db->from('tbl_fasilitas');
        $this->db->order_by('id_fasilitas', 'desc');

        $query = $this->db->get();
        return $query->row();
    }

    // Get Data Untuk home
    public function home()
    {
        $this->db->select('tbl_fasilitas.*,
                        tbl_pegawai.nama,
                        tbl_kategori.nama_kategori,
                        tbl_kategori.slug_kategori,
                        COUNT(tbl_foto.id_foto) AS total_foto');

        $this->db->from('tbl_fasilitas');
        // Join
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_fasilitas.id_pegawai', 'left');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_fasilitas.id_kategori', 'left');
        // Menampilkan angka foto
        $this->db->join('tbl_foto', 'tbl_foto.id_fasilitas = tbl_fasilitas.id_fasilitas', 'left');
        // End Join
        $this->db->where('tbl_fasilitas.status_fasilitas', 'Publish');
        $this->db->group_by('tbl_fasilitas.id_fasilitas');
        $this->db->order_by('id_fasilitas', 'desc');
        $this->db->limit(12);

        return $this->db->get()->result();
    }

    // Get Data Untuk home
    public function read($slug_fasilitas)
    {
        $this->db->select('tbl_fasilitas.*,
                         tbl_pegawai.nama,
                         tbl_kategori.nama_kategori,
                         tbl_kategori.slug_kategori,
                         COUNT(tbl_foto.id_foto) AS total_foto');

        $this->db->from('tbl_fasilitas');
        // Join
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_fasilitas.id_pegawai', 'left');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_fasilitas.id_kategori', 'left');
        // Menampilkan angka foto
        $this->db->join('tbl_foto', 'tbl_foto.id_fasilitas = tbl_fasilitas.id_fasilitas', 'left');
        // End Join
        $this->db->where('tbl_fasilitas.status_fasilitas', 'Publish');
        $this->db->where('tbl_fasilitas.slug_fasilitas', $slug_fasilitas);
        $this->db->group_by('tbl_fasilitas.id_fasilitas');
        $this->db->order_by('id_fasilitas', 'desc');

        return $this->db->get()->row();
    }

    // Get Data Untuk home Fasilitas Pagination
    public function fasilitas($limit, $start)
    {
        $this->db->select('tbl_fasilitas.*,
                         tbl_pegawai.nama,
                         tbl_kategori.nama_kategori,
                         tbl_kategori.slug_kategori,
                         COUNT(tbl_foto.id_foto) AS total_foto');

        $this->db->from('tbl_fasilitas');
        // Join
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_fasilitas.id_pegawai', 'left');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_fasilitas.id_kategori', 'left');
        // Menampilkan angka foto
        $this->db->join('tbl_foto', 'tbl_foto.id_fasilitas = tbl_fasilitas.id_fasilitas', 'left');
        // End Join
        $this->db->where('tbl_fasilitas.status_fasilitas', 'Publish');
        $this->db->group_by('tbl_fasilitas.id_fasilitas');
        $this->db->order_by('id_fasilitas', 'desc');
        $this->db->limit($limit, $start);

        $query = $this->db->get();
        return $query->result();
    }

    // Total Fasilitas Untuk home Fasilitas Pagination
    public function total_fasilitas()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('tbl_fasilitas');
        $this->db->where('status_fasilitas', 'publish');

        $query = $this->db->get();
        return $query->row();
    }

    // Get Data Untuk home kategori
    public function kategori($id_kategori, $limit, $start)
    {
        $this->db->select('tbl_fasilitas.*,
                         tbl_pegawai.nama,
                         tbl_kategori.nama_kategori,
                         tbl_kategori.slug_kategori,
                         COUNT(tbl_foto.id_foto) AS total_foto');

        $this->db->from('tbl_fasilitas');
        // Join
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_fasilitas.id_pegawai', 'left');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_fasilitas.id_kategori', 'left');
        // Menampilkan angka foto
        $this->db->join('tbl_foto', 'tbl_foto.id_fasilitas = tbl_fasilitas.id_fasilitas', 'left');
        // End Join
        $this->db->where('tbl_fasilitas.status_fasilitas', 'Publish');
        $this->db->where('tbl_fasilitas.id_kategori', $id_kategori);
        $this->db->group_by('tbl_fasilitas.id_fasilitas');
        $this->db->order_by('id_fasilitas', 'desc');
        $this->db->limit($limit, $start);

        $query = $this->db->get();
        return $query->result();
    }

    // Total Fasilitas Untuk home kategori
    public function total_kategori($id_kategori)
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('tbl_fasilitas');
        $this->db->where('status_fasilitas', 'publish');
        $this->db->where('id_kategori', $id_kategori);

        $query = $this->db->get();
        return $query->row();
    }

    // Detail Tbl Fasilitas untuk Kategori Home
    public function getAllKategori()
    {
        $this->db->select('tbl_fasilitas.*,
                                        tbl_pegawai.nama,
                                        tbl_kategori.nama_kategori,
                                        tbl_kategori.slug_kategori,
                                        COUNT(tbl_foto.id_foto) AS total_foto');

        $this->db->from('tbl_fasilitas');
        // Join
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_fasilitas.id_pegawai', 'left');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_fasilitas.id_kategori', 'left');
        // Menampilkan angka foto
        $this->db->join('tbl_foto', 'tbl_foto.id_fasilitas = tbl_fasilitas.id_fasilitas', 'left');
        // End Join
        $this->db->group_by('tbl_fasilitas.id_kategori');
        $this->db->order_by('id_fasilitas', 'desc');

        return $this->db->get()->result();
    }

    // Tambah Data Fasilitas
    public function simpan_add($data)
    {
        $this->db->insert('tbl_fasilitas', $data);
    }

    // Edit Data Fasilitas - Untuk Mengambil Detail Data
    public function getWhere($id_fasilitas)
    {
        return $this->db->where('id_fasilitas', $id_fasilitas)->get('tbl_fasilitas')->row();
    }

    // Edit Data Fasilitas - Simpan Setelah Diedit
    public function simpan_edit($id_fasilitas, $data)
    {
        $this->db->where('id_fasilitas', $id_fasilitas)->update('tbl_fasilitas', $data);
    }

    // Untuk Mengambil Detail Data
    public function getWhereFoto($id_fasilitas)
    {
        $this->db->select('*');
        $this->db->from('tbl_foto');
        $this->db->where('id_fasilitas', $id_fasilitas);
        $this->db->order_by('id_foto', 'desc');

        return $this->db->get()->result();
    }

    // Tambah Data Foto
    public function simpan_add_foto($data)
    {
        $this->db->insert('tbl_foto', $data);
    }

    // Detail Delete Fasilitas - Untuk Mengambil Foto Fasilitas
    public function getWhereDeleteFasilitas($id_fasilitas)
    {
        return $this->db->where('id_fasilitas', $id_fasilitas)->get('tbl_fasilitas')->row();
    }

    // Delete Data Fasilitas
    public function delete($id_fasilitas)
    {
        $this->db->delete('tbl_fasilitas', array('id_fasilitas' => $id_fasilitas));
    }

    // Detail Delete Foto Video - Untuk Mengambil Foto 
    public function getWhereDeleteFoto($id_foto)
    {
        return $this->db->where('id_foto', $id_foto)->get('tbl_foto')->row();
    }

    // Delete Data Foto
    public function delete_foto($id_foto)
    {
        $this->db->delete('tbl_foto', array('id_foto' => $id_foto));
    }
}
