<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/data_master/m_kategori');
        $this->load->model('backend/pengguna/m_pelanggan');
        $this->load->model('frontend/transaksi/m_header_transaksi');
        $this->load->model('backend/buku/m_contact');

        // Proteksi Halaman
        if ($this->session->userdata('login') == FALSE) {

            $this->session->set_flashdata('warning', 'Anda Belum Login');
            redirect('backend/auth/Login');
        }
    }

    // Halaman Kategori
    public function index()
    {
        // Ambil jumlah Kategori
        $jumlah_kategori = $this->m_kategori->jumlah_kategori();

        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'DATA KATEGORI',
            'sub_header'        => 'JUMLAH DATA KATEGORI (' . $jumlah_kategori->jumlah . ') ',
            'halaman'           => 'backend/data_master/kategori/v_list',
        );
        $data['kategori'] = $this->m_kategori->getAll();

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_contact'] = $this->m_contact->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    // Tambah Data Kategori
    public function add()
    {
        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'TAMBAH DATA KATEGORI',
            'halaman'           => 'backend/data_master/kategori/v_add',
        );
        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_contact'] = $this->m_contact->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    function proses_add()
    {
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_kategori',
            'Nama Kategori',
            'required|is_unique[tbl_kategori.nama_kategori]',
            array(
                'required'          => '%s Harus Diisi',
                'is_unique'         => '%s Sudah Digunakan. Buat Nama Kategori Baru.',
            )
        );

        $valid->set_rules(
            'urutan',
            'Urutan Kategori',
            'required|is_unique[tbl_kategori.urutan]',
            array(
                'required'          => '%s Harus Diisi',
                'is_unique'         => '%s Sudah Digunakan. Buat Urutan Kategori Baru.',
            )
        );

        if ($valid->run() == FALSE) {
            $this->add();
            // End Validasi Input
        } else {
            // Membuat Slug Kategori
            $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
            // Masuk Database Kategori
            $data = array(
                'slug_kategori'     => $slug_kategori,
                'nama_kategori'     => $this->input->post('nama_kategori'),
                'urutan'            => $this->input->post('urutan'),
            );
            $this->m_kategori->simpan_add($data);
            $this->session->set_flashdata('success', 'Data Telah Ditambahkan');
            redirect(base_url('backend/data_master/kategori/index'), 'refresh');
        }
    }

    // Edit Data Kategori
    public function edit($id_kategori)
    {
        $nama_kategori = $this->m_kategori->getWhere($id_kategori);
        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'EDIT DATA KATEGORI',
            'sub_header'        => $nama_kategori->nama_kategori,
            'halaman'           => 'backend/data_master/kategori/v_edit',
        );
        // Ambil Detail Kategori
        $data['isi_form'] = $this->m_kategori->getWhere($id_kategori);

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_contact'] = $this->m_contact->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    function proses_edit()
    {
        $id_kategori = $this->input->post('id_kategori');

        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_kategori',
            'Nama Kategori',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        $valid->set_rules(
            'urutan',
            'Urutan Kategori',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        if ($valid->run() == FALSE) {
            $this->edit($id_kategori);
            // End Validasi Input
        } else {
            // Membuat Slug Kategori
            $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
            //Masuk Database Kategori
            $data = array(
                'id_kategori'       => $id_kategori,
                'slug_kategori'     => $slug_kategori,
                'nama_kategori'     => $this->input->post('nama_kategori'),
                'urutan'            => $this->input->post('urutan'),
            );
            $this->m_kategori->simpan_edit($id_kategori, $data);
            $this->session->set_flashdata('success', 'Data Telah Di Update');
            redirect(base_url('backend/data_master/Kategori/index'), 'refresh');
        }
    }

    // Delete Data Kategori
    public function delete($id_kategori)
    {
        $this->m_kategori->delete($id_kategori);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect(base_url('backend/data_master/Kategori/index'), 'refresh');
    }
}
