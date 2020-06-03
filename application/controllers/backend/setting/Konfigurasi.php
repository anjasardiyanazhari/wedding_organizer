<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/setting/m_konfigurasi');
        $this->load->model('backend/pengguna/m_pelanggan');
        $this->load->model('frontend/transaksi/m_header_transaksi');
        $this->load->model('backend/buku/m_contact');

        // Proteksi Halaman
        if ($this->session->userdata('login') == FALSE) {

            $this->session->set_flashdata('warning', 'Anda Belum Login');
            redirect('backend/auth/Login');
        }
    }

    // Konfigurasi Umum Website
    public function umum()
    {
        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'DATA KONFIGURASI UMUM',
            'halaman'           => 'backend/setting/konfigurasi/v_edit_umum',
        );
        // Ambil Data Konfigurasi
        $data['isi_form'] = $this->m_konfigurasi->getAll();

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_contact'] = $this->m_contact->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    function edit_umum()
    {
        $id_konfigurasi = $this->input->post('id_konfigurasi');
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_web',
            'Nama Web',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        if ($valid->run() == FALSE) {
            $this->umum();
            // End Validasi Input
        } else {
            // Masuk Database Konfigurasi
            $data = array(
                'id_konfigurasi'    => $id_konfigurasi,
                'nama_web'          => $this->input->post('nama_web'),
                'tag_line'          => $this->input->post('tag_line'),
                'email'             => $this->input->post('email'),
                'link_website'      => $this->input->post('link_website'),
                'no_telp'           => $this->input->post('no_telp'),
                'alamat'            => $this->input->post('alamat'),
                'google_maps'       => $this->input->post('google_maps'),
                'facebook'          => $this->input->post('facebook'),
                'instagram'         => $this->input->post('instagram'),
                'twitter'           => $this->input->post('twitter'),
                'keyword'           => $this->input->post('keyword'),
                'deskripsi'         => $this->input->post('deskripsi'),
            );
            $this->m_konfigurasi->simpan_edit($data);
            $this->session->set_flashdata('success', 'Data Telah Di Update');
            redirect(base_url('backend/setting/Konfigurasi/umum'), 'refresh');
        }
    }

    // Konfigurasi Logo Website
    public function logo()
    {
        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'DATA KONFIGURASI LOGO',
            'halaman'           => 'backend/setting/konfigurasi/v_edit_logo',
        );
        // Ambil Data Konfigurasi
        $data['isi_form'] = $this->m_konfigurasi->getAll();

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_contact'] = $this->m_contact->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    function edit_logo()
    {
        $id_konfigurasi = $this->input->post('id_konfigurasi');
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_web',
            'Nama Web',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        if ($valid->run() == FALSE) {
            $this->logo($id_konfigurasi);
            // End Validasi Input
        } else {
            // Falidasi Logo
            $config['upload_path']          = './assets/backend/img/logo/asli/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = '3000';
            $config['max_width']            = '3000';
            $config['max_height']           = '3000';

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('logo')) {
                $this->session->set_flashdata('error', 'Foto Gagal Di Upload');
                $this->logo($id_konfigurasi);
                // End Validasi Input
            } else {
                // Ambil Detail Konfigurasi
                $isi = $this->m_konfigurasi->getWhere($id_konfigurasi);

                // Delete Foto di Tbl Konfigurasi
                if ($isi->logo != '') {
                    unlink('./assets/backend/img/logo/asli/' . $isi->logo);
                    unlink('./assets/backend/img/logo/thumbnail/' . $isi->logo);
                }
                // End Delete Foto di Tbl Konfigurasi

                // Falidasi Logo
                $upload_gambar = array('upload_data' => $this->upload->data());

                // Create thumbnail
                $config['image_library']        = 'gd2';
                $config['source_image']         = './assets/backend/img/logo/asli/' . $upload_gambar['upload_data']['file_name'];

                // Lokasi folder thumbnail
                $config['new_image']            = './assets/backend/img/logo/thumbnail/';
                $config['create_thumb']         = TRUE;
                $config['maintain_ratio']       = TRUE;
                $config['width']                = 200;
                $config['height']               = 200;
                $config['thumb_marker']         = '';

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                // End create thumbnail

                //Masuk Database Konfigurasi
                $data = array(
                    'id_konfigurasi'        => $id_konfigurasi,
                    'nama_web'              => $this->input->post('nama_web'),
                    'logo'                  => $upload_gambar['upload_data']['file_name'],
                );
                $this->m_konfigurasi->simpan_edit($data);
                $this->session->set_flashdata('success', 'Data Telah Di Update');
                redirect(base_url('backend/setting/Konfigurasi/logo/'), 'refresh');
            }
        }
    }

    // Konfigurasi Icon Website
    public function icon()
    {
        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'DATA KONFIGURASI ICON',
            'halaman'           => 'backend/setting/konfigurasi/v_edit_icon',
        );
        // Ambil Data Pegawai
        $data['isi_form'] = $this->m_konfigurasi->getAll();

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_contact'] = $this->m_contact->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    function edit_icon()
    {
        $id_konfigurasi = $this->input->post('id_konfigurasi');
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_web',
            'Nama Web',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        if ($valid->run() == FALSE) {
            $this->icon($id_konfigurasi);
            // End Validasi Input
        } else {
            // Falidasi Logo
            $config['upload_path']          = './assets/backend/img/icon/asli/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = '3000';
            $config['max_width']            = '3000';
            $config['max_height']           = '3000';

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('icon')) {
                $this->session->set_flashdata('error', 'Foto Gagal Di Upload');
                $this->icon($id_konfigurasi);
                // End Validasi Input
            } else {
                // Ambil Detail Konfigurasi
                $isi = $this->m_konfigurasi->getWhere($id_konfigurasi);

                // Delete Foto di Tbl Konfigurasi
                if ($isi->icon != '') {
                    unlink('./assets/backend/img/icon/asli/' . $isi->icon);
                    unlink('./assets/backend/img/icon/thumbnail/' . $isi->icon);
                }
                // End Delete Foto di Tbl Konfigurasi

                // Falidasi Logo
                $upload_gambar = array('upload_data' => $this->upload->data());

                // Create thumbnail
                $config['image_library']        = 'gd2';
                $config['source_image']         = './assets/backend/img/icon/asli/' . $upload_gambar['upload_data']['file_name'];

                // Lokasi folder thumbnail
                $config['new_image']            = './assets/backend/img/icon/thumbnail/';
                $config['create_thumb']         = TRUE;
                $config['maintain_ratio']       = TRUE;
                $config['width']                = 200;
                $config['height']               = 200;
                $config['thumb_marker']         = '';

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                // End create thumbnail

                //Masuk Database Konfigurasi
                $data = array(
                    'id_konfigurasi'        => $id_konfigurasi,
                    'nama_web'              => $this->input->post('nama_web'),
                    'icon'                  => $upload_gambar['upload_data']['file_name'],
                );
                $this->m_konfigurasi->simpan_edit($data);
                $this->session->set_flashdata('success', 'Data Telah Di Update');
                redirect(base_url('backend/setting/Konfigurasi/icon/'), 'refresh');
            }
        }
    }
}
