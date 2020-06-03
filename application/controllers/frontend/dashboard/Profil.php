<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
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

    // Halaman Profil
    public function index()
    {
        // Ambil data Login id_pelanggan dari SESSION
        $id_pelanggan = $this->session->userdata('id_pelanggan');

        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'                 => 'Profil Saya',
            'site'                  => $site,
            'halaman'               => 'frontend/dashboard/Informasi/v_profil',
        );
        // Ambil Data Pelanggan
        $data['isi_form'] = $this->m_pelanggan->getWhere($id_pelanggan);
        $this->load->view('frontend/layout/v_wrapper', $data);
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
            $this->index($id_pelanggan);
            // End Validasi Input
        } else {
            // Masuk Database Pelanggan
            // kalau pasword lebih dari 8 karakter, maka password diganti
            if (strlen($this->input->post('password')) >= 8) {
                $data = array(
                    'id_pelanggan'      => $id_pelanggan,
                    'nama'              => $this->input->post('nama'),
                    'password'          => sha1($this->input->post('password')),
                    'no_telp'           => $this->input->post('no_telp'),
                    'alamat'            => $this->input->post('alamat'),
                );
            } else {
                // Kalau Password kurang dari 8 maka password tidak diganti
                $data = array(
                    'id_pelanggan'      => $id_pelanggan,
                    'nama'              => $this->input->post('nama'),
                    'no_telp'           => $this->input->post('no_telp'),
                    'alamat'            => $this->input->post('alamat'),
                );
            }
            // End data Update
            $this->m_pelanggan->simpan_edit($id_pelanggan, $data);
            $this->session->set_flashdata('success', 'Data Telah Di Update');
            redirect(base_url('frontend/dashboard/Profil'), 'refresh');
        }
    }
}
