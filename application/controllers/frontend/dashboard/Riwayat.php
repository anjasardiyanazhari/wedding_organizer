<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/pengguna/m_pelanggan');
        $this->load->model('frontend/transaksi/m_header_transaksi');
        $this->load->model('frontend/transaksi/m_transaksi');
        $this->load->model('backend/data_master/m_rekening');
        $this->load->model('backend/buku/m_contact');

        // Proteksi Halaman
        if ($this->session->userdata('login') == FALSE) {

            $this->session->set_flashdata('warning', 'Anda Belum Login');
            redirect('frontend/auth/Login');
        }
    }

    // Halaman Riwayat Penyewaan
    public function index()
    {
        // Ambil data Login id_pelanggan dari SESSION
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->m_header_transaksi->getTransaksi_pelanggan($id_pelanggan);

        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'                 => 'Riwayat Penyewaan',
            'site'                  => $site,
            'header_transaksi'      => $header_transaksi,
            'halaman'               => 'frontend/dashboard/informasi/v_riwayat',
        );
        $this->load->view('frontend/layout/v_wrapper', $data);
    }

    // Halaman Detail
    public function detail($kode_transaksi)
    {
        // Ambil data Login id_pelanggan dari SESSION
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->m_header_transaksi->getKode_transaksi($kode_transaksi);
        $transaksi = $this->m_transaksi->getKode_transaksi($kode_transaksi);

        // Pastikan Bahwa Pelanggan Hanya mengakses data Transaksi
        if ($header_transaksi->id_pelanggan != $id_pelanggan) {
            $this->session->set_flashdata('warning', 'Anda Mencoba Mengakses Data Transaksi Orang Lain');
            redirect(base_url('frontend/auth/login'));
        }

        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'                 => 'Riwayat Penyewaan',
            'site'                  => $site,
            'header_transaksi'      => $header_transaksi,
            'transaksi'             => $transaksi,
            'halaman'               => 'frontend/dashboard/Informasi/v_detail',
        );
        $this->load->view('frontend/layout/v_wrapper', $data);
    }
}
