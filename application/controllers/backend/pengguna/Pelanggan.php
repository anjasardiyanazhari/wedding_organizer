<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/pengguna/m_pelanggan');
        $this->load->model('frontend/transaksi/m_header_transaksi');
        $this->load->model('backend/buku/m_komentar');

        // Proteksi Halaman
        if ($this->session->userdata('login') == FALSE) {

            $this->session->set_flashdata('warning', 'Anda Belum Login');
            redirect('backend/auth/Login');
        }
    }

    // Halaman Pelanggan
    public function index()
    {
        // Ambil jumlah Pelanggan
        $jumlah_pelanggan = $this->m_pelanggan->jumlah_pelanggan();

        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'DATA PELANGGAN',
            'sub_header'        => 'JUMLAH DATA PELANGGAN (' . $jumlah_pelanggan->jumlah . ') ',
            'halaman'           => 'backend/pengguna/pelanggan/v_list',
        );
        // Ambil Data Pelanggan
        $data['pelanggan'] = $this->m_pelanggan->getAll();

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_komentar'] = $this->m_komentar->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    // Tambah Data Pelanggan
    public function add()
    {
        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'TAMBAH DATA PELANGGAN',
            'halaman'           => 'backend/pengguna/pelanggan/v_add',
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
            'nama',
            'Nama Pelanggan',
            'required|max_length[20]',
            array(
                'required'          => '%s Harus Diisi',
                'max_length'        => '%s Maximal 20 Karakter',
            )
        );

        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[tbl_pelanggan.email]',
            array(
                'required'          => '%s Harus Diisi',
                'valid_email'       => '%s Tidak Valid',
                'is_unique'         => '%s Sudah Digunakan. Buat Email Baru.',
            )
        );

        $valid->set_rules(
            'password',
            'Password',
            'required|min_length[8]',
            array(
                'required'          => '%s Harus Diisi',
                'min_length'        => '%s Minimal 8 Karakter',
            )
        );

        $valid->set_rules(
            'no_telp',
            'No Telp',
            'required|min_length[10]',
            array(
                'required'          => '%s Harus Diisi',
                'min_length'        => '%s Minimal 10 Digit',
            )
        );

        $valid->set_rules(
            'alamat',
            'Alamat',
            'required|min_length[5]',
            array(
                'required'          => '%s Harus Diisi',
                'min_length'        => '%s Minimal 5 Karakter',
            )
        );

        if ($valid->run() == FALSE) {
            $this->add();
            // End Validasi Input
        } else {
            //Masuk Database Pelanggan
            $data = array(
                'nama'              => $this->input->post('nama'),
                'email'             => $this->input->post('email'),
                'password'          => sha1($this->input->post('password')),
                'no_telp'           => $this->input->post('no_telp'),
                'alamat'            => $this->input->post('alamat'),
                'tanggal_update'    => date('Y-m-d H:i:s'),
            );
            $this->m_pelanggan->simpan_add($data);
            $this->session->set_flashdata('success', 'Data Telah Ditambahkan');
            redirect(base_url('backend/pengguna/Pelanggan/index'), 'refresh');
        }
    }

    //Edit Data Pelanggan
    public function edit($id_pelanggan)
    {
        $nama = $this->m_pelanggan->getWhere($id_pelanggan);
        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'EDIT DATA PELANGGAN',
            'sub_header'        => $nama->nama,
            'halaman'           => 'backend/pengguna/pelanggan/v_edit',
        );
        // Ambil Data Pelanggan
        $data['isi_form'] = $this->m_pelanggan->getWhere($id_pelanggan);

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
        $id_pelanggan = $this->input->post('id_pelanggan');

        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama',
            'Nama Pelanggan',
            'required|max_length[20]',
            array(
                'required'          => '%s Harus Diisi',
                'max_length'        => '%s Maximal 20 Karakter',
            )
        );

        $valid->set_rules(
            'password',
            'Password',
            'required|min_length[8]',
            array(
                'required'          => '%s Harus Diisi',
                'min_length'        => '%s Minimal 8 Karakter',
            )
        );

        $valid->set_rules(
            'no_telp',
            'No Telp',
            'required|min_length[10]',
            array(
                'required'          => '%s Harus Diisi',
                'min_length'        => '%s Minimal 10 Digit',
            )
        );

        $valid->set_rules(
            'alamat',
            'Alamat',
            'required|min_length[5]',
            array(
                'required'          => '%s Harus Diisi',
                'min_length'        => '%s Minimal 5 Karakter',
            )
        );

        if ($valid->run() == FALSE) {
            $this->edit($id_pelanggan);
            // End Validasi Input
        } else {
            //Masuk Database Pelanggan
            // kalau pasword lebih dari 8 karakter, maka password diganti
            if (strlen($this->input->post('password')) >= 8) {
                $data = array(
                    'id_pelanggan'      => $id_pelanggan,
                    'nama'              => $this->input->post('nama'),
                    'email'             => $this->input->post('email'),
                    'password'          => sha1($this->input->post('password')),
                    'no_telp'           => $this->input->post('no_telp'),
                    'alamat'            => $this->input->post('alamat'),
                );
            } else {
                // Kalau Password kurang dari 8 maka password tidak diganti
                $data = array(
                    'id_pelanggan'      => $id_pelanggan,
                    'nama'              => $this->input->post('nama'),
                    'email'             => $this->input->post('email'),
                    'no_telp'           => $this->input->post('no_telp'),
                    'alamat'            => $this->input->post('alamat'),
                );
            }
            // End data Update
            $this->m_pelanggan->simpan_edit($id_pelanggan, $data);
            $this->session->set_flashdata('success', 'Data Telah Di Update');
            redirect(base_url('backend/pengguna/Pelanggan/index'), 'refresh');
        }
    }

    // Delete Data Pelanggan
    public function delete($id_pelanggan)
    {
        $this->m_pelanggan->delete($id_pelanggan);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect(base_url('backend/pengguna/Pelanggan/index'), 'refresh');
    }
}
