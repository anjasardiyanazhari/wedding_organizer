<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/data_master/m_rekening');
        $this->load->model('backend/pengguna/m_pelanggan');
        $this->load->model('frontend/transaksi/m_header_transaksi');
        $this->load->model('backend/buku/m_komentar');

        // Proteksi Halaman
        if ($this->session->userdata('login') == FALSE) {

            $this->session->set_flashdata('warning', 'Anda Belum Login');
            redirect('backend/auth/Login');
        }
    }

    // Halaman Rekening
    public function index()
    {
        // Untuk Falidasi 
        if ($this->session->userdata('akses_level') != 'Admin') {
            redirect('backend/dashboard/Informasi');
        }

        // Ambil jumlah Kategori
        $jumlah_rekening = $this->m_rekening->jumlah_rekening();

        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'DATA REKENING',
            'sub_header'        => 'JUMLAH DATA REKENING (' . $jumlah_rekening->jumlah . ') ',
            'halaman'           => 'backend/data_master/rekening/v_list',
        );
        $data['rekening'] = $this->m_rekening->getAll();

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_komentar'] = $this->m_komentar->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    // Tambah Data Rekening
    public function add()
    {
        // Untuk Falidasi 
        if ($this->session->userdata('akses_level') != 'Admin') {
            redirect('backend/dashboard/Informasi');
        }

        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'DATA REKENING',
            'halaman'           => 'backend/data_master/rekening/v_add',
        );
        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_komentar'] = $this->m_komentar->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    function proses_add()
    {
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_bank',
            'Nama Bank',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        $valid->set_rules(
            'nomor_rekening',
            'Nomor Rekening',
            'required|numeric',
            array(
                'required'          => '%s Harus Diisi',
                'numeric'           => '%s Menggunakan Karakter Angka',
            )
        );

        $valid->set_rules(
            'nama_pemilik',
            'Nama Pemilik',
            'required|max_length[20]',
            array(
                'required'          => '%s Harus Diisi',
                'max_length'        => '%s Maximal 20 Karakter',
            )
        );

        if ($valid->run() == FALSE) {
            $this->add();
            // End Validasi Input

        } else {
            //Masuk Database Rekening
            $data = array(
                'nama_bank'                 => $this->input->post('nama_bank'),
                'nomor_rekening'            => $this->input->post('nomor_rekening'),
                'nama_pemilik'              => $this->input->post('nama_pemilik'),
                'tanggal_post'              => date('Y-m-d H:i:s'),
            );
            $this->m_rekening->simpan_add($data);
            $this->session->set_flashdata('success', 'Data Telah Ditambahkan');
            redirect(base_url('backend/data_master/Rekening/index'), 'refresh');
        }
    }

    //Edit Data Rekening
    public function edit($id_rekening)
    {
        // Untuk Falidasi 
        if ($this->session->userdata('akses_level') != 'Admin') {
            redirect('backend/dashboard/Informasi');
        }

        $nama_bank = $this->m_rekening->getWhere($id_rekening);
        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'EDIT DATA REKENING',
            'sub_header'        => $nama_bank->nama_bank,
            'halaman'           => 'backend/data_master/rekening/v_edit',
        );
        // Ambil Data Rekening
        $data['isi_form'] = $this->m_rekening->getWhere($id_rekening);

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_komentar'] = $this->m_komentar->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    function proses_edit()
    {
        $id_rekening = $this->input->post('id_rekening');

        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_bank',
            'Nama Bank',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        $valid->set_rules(
            'nomor_rekening',
            'Nomor Rekening',
            'required|numeric',
            array(
                'required'          => '%s Harus Diisi',
                'numeric'           => '%s Menggunakan Karakter Angka',
            )
        );

        $valid->set_rules(
            'nama_pemilik',
            'Nama Pemilik',
            'required|max_length[20]',
            array(
                'required'          => '%s Harus Diisi',
                'max_length'        => '%s Maximal 20 Karakter',
            )
        );

        if ($valid->run() == FALSE) {
            $this->edit($id_rekening);
            // End Validasi Input
        } else {
            //Masuk Database Rekening
            $data = array(
                'id_rekening'        => $id_rekening,
                'nama_bank'                 => $this->input->post('nama_bank'),
                'nomor_rekening'            => $this->input->post('nomor_rekening'),
                'nama_pemilik'              => $this->input->post('nama_pemilik'),
            );
            $this->m_rekening->simpan_edit($id_rekening, $data);
            $this->session->set_flashdata('success', 'Data Telah Di Update');
            redirect(base_url('backend/data_master/Rekening/index'), 'refresh');
        }
    }

    // Delete Data Rekening
    public function delete($id_rekening)
    {
        // Untuk Falidasi 
        if ($this->session->userdata('akses_level') != 'Admin') {
            redirect('backend/dashboard/Informasi');
        }

        $this->m_rekening->delete($id_rekening);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect(base_url('backend/data_master/Rekening/index'), 'refresh');
    }
}
