<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/pengguna/m_pelanggan');
    }

    // Halaman Login
    public function index()
    {
        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'             => 'Login Pelanggan',
            'site'              => $site,
        );
        $this->load->view('frontend/auth/v_login', $data);
    }

    public function proses_login()
    {
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'email',
            'Email',
            'required',
            array(
                'required'          => '%s (Username) Harus Diisi',
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

            $email = $this->input->post('email');
            $password = sha1($this->input->post('password'));

            $this->load->model('frontend/pengguna/m_pelanggan');
            $result = $this->m_pelanggan->getPelanggan($email, $password);

            // Membuat Session
            if ($result->row()) {
                $data_user = $result->row();
                $data = [
                    'login'             => TRUE,
                    'id_pelanggan'      => $data_user->id_pelanggan,
                    'nama'              => $data_user->nama,
                    'email'             => $data_user->email,
                    'tanggal_update'    => $data_user->tanggal_update,
                    'password'          => $data_user->password,
                ];

                $this->session->set_userdata($data);
                redirect(base_url('frontend/dashboard/Informasi'), 'refresh');
            } else {
                $this->session->set_flashdata('warning', 'Email atau Password salah');
                redirect(base_url('frontend/auth/Login/index'), 'refresh');
            }
        }
    }

    public function logout()
    {
        // Membauang Session
        $this->session->unset_userdata('id_pelanggan');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');
        $this->session->sess_destroy();

        redirect(base_url('frontend/auth/Login/index'), 'refresh');
    }
}
