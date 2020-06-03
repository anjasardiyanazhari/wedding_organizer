<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/data_master/m_fasilitas');
        $this->load->model('backend/dokumentasi/m_galleri');
        $this->load->model('backend/data_master/m_kategori');
        $this->load->model('backend/setting/m_konfigurasi');
        $this->load->model('backend/buku/m_contact');
    }

    //Halaman Utama Dashboard
    public function index()
    {
        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'             => $site->nama_web,
            'sub_title'         => 'Wedding Organizer',
            'halaman'           => 'frontend/home/v_about',
        );
        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting
        $data['site'] = $this->m_konfigurasi->getAll();
        // Ambil Data 
        $data['kategori'] = $this->m_konfigurasi->nav_fasilitas();
        // Ambil Data Fasilitas Untuk Data Home Fasilitas
        $data['fasilitas'] = $this->m_fasilitas->home();
        // Ambil Data Galleri Untuk Data Home Galleri
        $data['galleri'] = $this->m_galleri->getAll();
        $this->load->view('frontend/layout/v_wrapper', $data);
    }
}
