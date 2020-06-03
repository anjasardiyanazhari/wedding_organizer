<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/pengguna/m_pegawai');
        $this->load->model('backend/pengguna/m_pelanggan');
        $this->load->model('frontend/transaksi/m_header_transaksi');
        $this->load->model('backend/buku/m_contact');

        // Proteksi Halaman
        if ($this->session->userdata('login') == FALSE) {

            $this->session->set_flashdata('warning', 'Anda Belum Login');
            redirect('backend/auth/Login');
        }
    }

    // Halaman Pegawai
    public function index()
    {
        // Untuk Falidasi 
        if ($this->session->userdata('akses_level') != 'Admin') {
            redirect('backend/dashboard/Informasi');
        }

        // Ambil jumlah pegawai
        $jumlah_pegawai = $this->m_pegawai->jumlah_pegawai();

        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'DATA PEGAWAI',
            'sub_header'        => 'JUMLAH DATA PEGAWAI (' . $jumlah_pegawai->jumlah . ') ',
            'halaman'           => 'backend/pengguna/pegawai/v_list',
        );
        // Ambil Data Pegawai
        $data['pegawai'] = $this->m_pegawai->getAll();

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_contact'] = $this->m_contact->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    // Tambah Data Pegawai
    public function add()
    {
        // Untuk Falidasi 
        if ($this->session->userdata('akses_level') != 'Admin') {
            redirect('backend/dashboard/Informasi');
        }

        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'TAMBAH DATA PEGAWAI',
            'halaman'           => 'backend/pengguna/pegawai/v_add',
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
            'nama',
            'Nama Pegawai',
            'required|max_length[20]',
            array(
                'required'          => '%s Harus Diisi',
                'max_length'        => '%s Maximal 20 Karakter',
            )
        );

        $valid->set_rules(
            'username',
            'Username',
            'required|min_length[5]|is_unique[tbl_pegawai.username]',
            array(
                'required'          => '%s Harus Diisi',
                'min_length'        => '%s Minimal 5 Karakter',
                'is_unique'         => '%s Sudah Digunakan. Buat Username Baru.',
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
            //Masuk Database Pegawai
            $data = array(
                'nama'              => $this->input->post('nama'),
                'username'          => $this->input->post('username'),
                'password'          => sha1($this->input->post('password')),
                'no_telp'           => $this->input->post('no_telp'),
                'alamat'            => $this->input->post('alamat'),
                'akses_level'       => $this->input->post('akses_level'),
            );
            $this->m_pegawai->simpan_add($data);
            $this->session->set_flashdata('success', 'Data Telah Ditambahkan');
            redirect(base_url('backend/pengguna/Pegawai/index'), 'refresh');
        }
    }

    //Edit Data Pegawai
    public function edit($id_pegawai)
    {
        // Untuk Falidasi 
        if ($this->session->userdata('akses_level') != 'Admin') {
            redirect('backend/dashboard/Informasi');
        }

        $nama = $this->m_pegawai->getWhere($id_pegawai);
        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'EDIT DATA PEGAWAI',
            'sub_header'        => $nama->nama,
            'halaman'           => 'backend/pengguna/pegawai/v_edit',
        );
        // Ambil Data Pegawai
        $data['isi_form'] = $this->m_pegawai->getWhere($id_pegawai);

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
        $id_pegawai = $this->input->post('id_pegawai');

        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama',
            'Nama Pegawai',
            'required',
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
            'No Telepon',
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
            $this->edit($id_pegawai);
            // End Validasi Input
        } else {
            //Masuk Database Pegawai
            // kalau pasword lebih dari 8 karakter, maka password diganti
            if (strlen($this->input->post('password')) >= 8) {
                $data = array(
                    'id_pegawai'        => $id_pegawai,
                    'nama'              => $this->input->post('nama'),
                    'username'          => $this->input->post('username'),
                    'password'          => sha1($this->input->post('password')),
                    'no_telp'           => $this->input->post('no_telp'),
                    'alamat'            => $this->input->post('alamat'),
                    'akses_level'       => $this->input->post('akses_level'),
                );
            } else {
                // Kalau Password kurang dari 8 maka password tidak diganti
                $data = array(
                    'id_pegawai'        => $id_pegawai,
                    'nama'              => $this->input->post('nama'),
                    'username'          => $this->input->post('username'),
                    'no_telp'           => $this->input->post('no_telp'),
                    'alamat'            => $this->input->post('alamat'),
                    'akses_level'       => $this->input->post('akses_level'),
                );
            }
            // End data Update
            $this->m_pegawai->simpan_edit($id_pegawai, $data);
            $this->session->set_flashdata('success', 'Data Telah Di Update');
            redirect(base_url('backend/pengguna/Pegawai/index'), 'refresh');
        }
    }

    // Delete Data Pegawai
    public function delete($id_pegawai)
    {
        // Untuk Falidasi 
        if ($this->session->userdata('akses_level') != 'Admin') {
            redirect('backend/dashboard/Informasi');
        }

        $this->m_pegawai->delete($id_pegawai);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect(base_url('backend/pengguna/Pegawai/index'), 'refresh');
    }
}
