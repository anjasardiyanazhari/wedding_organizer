<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/setting/m_konfigurasi');
    }

    // Halaman Login
    public function index()
    {
        $data = array(
            'title'             => 'Login',
            'sub_title'         => 'Login Administrator',
        );
        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        $this->load->view('backend/auth/v_login', $data);
    }

    public function proses_login()
    {
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'username',
            'Username',
            'trim|required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        $valid->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        if ($valid->run() == FALSE) {
            $this->index();
            // End Validasi Input
        } else {

            $username = $this->input->post('username');
            $password = sha1($this->input->post('password'));

            $this->load->model('backend/pengguna/m_pegawai');
            $result = $this->m_pegawai->getPegawai($username, $password);

            // Membuat Session
            if ($result->row()) {
                $data_user = $result->row();
                $data = [
                    'login'             => TRUE,
                    'id_pegawai'        => $data_user->id_pegawai,
                    'nama'              => $data_user->nama,
                    'username'          => $data_user->username,
                    'password'          => $data_user->password,
                    'akses_level'       => $data_user->akses_level,
                    'tanggal_update'    => $data_user->tanggal_update,
                ];

                $this->session->set_userdata($data);
                if ($data_user->akses_level == 'Admin') {
                    redirect(base_url('backend/dashboard/Informasi/index'), 'refresh');
                } else {
                    redirect(base_url('backend/dashboard/Informasi/index'), 'refresh');
                }
            } else {
                $this->session->set_flashdata('warning', 'Username atau Password salah');
                redirect(base_url('backend/auth/Login/index'), 'refresh');
            }
        }
    }

    public function logout()
    {
        // Membauang Session
        $this->session->unset_userdata('id_pelanggan');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('akses_level');
        $this->session->sess_destroy();

        redirect(base_url('backend/auth/Login/index'), 'refresh');
    }
}
