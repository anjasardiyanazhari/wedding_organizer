<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
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
            'title'                 => 'Contact Us',
            'site'                  => $site,
            'halaman'               => 'frontend/dashboard/Informasi/v_contact',
        );
        // Ambil Data Pelanggan
        $data['isi_form'] = $this->m_pelanggan->getWhere($id_pelanggan);
        $this->load->view('frontend/layout/v_wrapper', $data);
    }

    function proses_add()
    {
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
            'message',
            'Message',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        if ($valid->run() == FALSE) {
            $this->index();
            // End Validasi Input
        } else {
            // Masuk Database Pelanggan
            $data = array(
                'nama'              => $this->input->post('nama'),
                'email'             => $this->input->post('email'),
                'message'           => $this->input->post('message'),
            );
            // End data Update
            $this->m_contact->simpan_add($data);
            $this->session->set_flashdata('success', 'Data Komentar Telah Terkirim');
            redirect(base_url('frontend/dashboard/Contact'), 'refresh');
        }
    }
}
