<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{
	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('backend/pengguna/m_pegawai');
		$this->load->model('backend/pengguna/m_pelanggan');
		$this->load->model('backend/data_master/m_fasilitas');
		$this->load->model('backend/data_master/m_kategori');
		$this->load->model('frontend/transaksi/m_header_transaksi');
		$this->load->model('backend/data_master/m_rekening');
		$this->load->model('backend/buku/m_komentar');
		$this->load->model('backend/dokumentasi/m_galleri');
		$this->load->model('backend/setting/m_konfigurasi');

		// Proteksi Halaman
		if ($this->session->userdata('login') == FALSE) {

			$this->session->set_flashdata('warning', 'Anda Belum Login');
			redirect('backend/auth/Login');
		}
	}

	//Halaman Utama Dashboard
	public function index()
	{
		$data = array(
			'title'             => 'Administrator',
			'sub_title'         => 'Wedding Organizer',
			'halaman'			=> 'backend/dashboard/informasi/v_list'
		);
		// Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
		$data['site'] = $this->m_konfigurasi->getAll();

		// Menampilkan Jumlah Total Data ke Sidebar
		$data['total_pegawai'] = $this->m_pegawai->getAll();
		$data['total_pelanggan'] = $this->m_pelanggan->getAll();
		$data['total_fasilitas'] = $this->m_fasilitas->getAll();
		$data['total_kategori'] = $this->m_kategori->getAll();
		$data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
		$data['total_rekening'] = $this->m_rekening->getAll();
		$data['total_komentar'] = $this->m_komentar->getAll();
		$data['total_galleri'] = $this->m_galleri->getAll();
		$this->load->view('backend/layout/v_wrapper', $data);
	}
}