<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
{

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/buku/m_komentar');
        $this->load->model('backend/pengguna/m_pelanggan');
        $this->load->model('frontend/transaksi/m_header_transaksi');
        $this->load->model('backend/buku/m_komentar');

        // Proteksi Halaman
        if ($this->session->userdata('login') == FALSE) {

            $this->session->set_flashdata('warning', 'Anda Belum Login');
            redirect('backend/auth/Login');
        }
    }

    // Halaman Komentar
    public function index()
    {
        // Ambil jumlah Komentar
        $jumlah_komentar = $this->m_komentar->jumlah_komentar();

        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'DATA KOMENTAR',
            'sub_header'        => 'JUMLAH DATA KOMENTAR (' . $jumlah_komentar->jumlah . ') ',
            'halaman'           => 'backend/buku/komentar/v_list',
        );
        $data['komentar'] = $this->m_komentar->getAll();

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_komentar'] = $this->m_komentar->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    // Delete Data Komentar
    public function delete($id_komentar)
    {
        $this->m_komentar->delete($id_komentar);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect(base_url('backend/buku/Komentar/index'), 'refresh');
    }
}
