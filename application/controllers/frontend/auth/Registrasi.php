<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/pengguna/m_pelanggan');
    }

    // Halaman Registrasi
    public function index()
    {
        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'             => 'Registrasi Pelanggan',
            'site'              => $site,
        );
        $this->load->view('frontend/auth/v_registrasi', $data);
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
            $this->index();
            // End Validasi Input
        } else {
            //Masuk Database Pelanggan
            $data = array(
                'status'                => 'Pending',
                'nama'                  => $this->input->post('nama'),
                'email'                 => $this->input->post('email'),
                'password'              => sha1($this->input->post('password')),
                'no_telp'               => $this->input->post('no_telp'),
                'alamat'                => $this->input->post('alamat'),
                'tanggal_registrasi'    => date('Y-m-d H:i:s'),
            );
            $this->m_pelanggan->simpan_add($data);

            // Session login pelanggan
            $this->session->set_userdata('email', $this->input->post('email'));
            $this->session->set_userdata('nama', $this->input->post('nama'));
            // End session login pelanggan

            redirect(base_url('frontend/auth/Registrasi/success'), 'refresh');
        }
    }

    // Success
    public function success()
    {
        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'             => 'Registrasi Berhasil',
            'site'              => $site,
            'halaman'           => 'frontend/auth/v_success',
        );
        $this->load->view('frontend/layout/v_wrapper', $data);
    }
}
