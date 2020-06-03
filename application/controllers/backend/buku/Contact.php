<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/buku/m_contact');
        $this->load->model('backend/pengguna/m_pelanggan');
        $this->load->model('frontend/transaksi/m_header_transaksi');

        // Proteksi Halaman
        if ($this->session->userdata('login') == FALSE) {

            $this->session->set_flashdata('warning', 'Anda Belum Login');
            redirect('backend/auth/Login');
        }
    }

    // Halaman Contact
    public function index()
    {
        // Ambil jumlah Contact
        $jumlah_contact = $this->m_contact->jumlah_contact();

        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'DATA CONTACT',
            'sub_header'        => 'JUMLAH DATA CONTACT (' . $jumlah_contact->jumlah . ') ',
            'halaman'           => 'backend/buku/contact/v_list',
        );
        $data['contact'] = $this->m_contact->getAll();

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_contact'] = $this->m_contact->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    // Delete Data Contact
    public function delete($id_contact)
    {
        $this->m_contact->delete($id_contact);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect(base_url('backend/buku/Contact/index'), 'refresh');
    }
}
