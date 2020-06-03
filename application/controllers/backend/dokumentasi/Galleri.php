<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galleri extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/dokumentasi/m_galleri');
        $this->load->model('backend/pengguna/m_pelanggan');
        $this->load->model('frontend/transaksi/m_header_transaksi');
        $this->load->model('backend/buku/m_contact');

        // Proteksi Halaman
        if ($this->session->userdata('login') == FALSE) {

            $this->session->set_flashdata('warning', 'Anda Belum Login');
            redirect('backend/auth/Login');
        }
    }

    // Halaman Dokumentasi
    public function index()
    {
        // Ambil jumlah Galleri
        $jumlah_galleri = $this->m_galleri->jumlah_galleri();

        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'DATA GALLERI',
            'sub_header'        => 'JUMLAH DATA GALLERI (' . $jumlah_galleri->jumlah . ') ',
            'halaman'           => 'backend/dokumentasi/galleri/v_list',
        );
        // Ambil Data Dokumentasi
        $data['galleri'] = $this->m_galleri->getAll();

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_contact'] = $this->m_contact->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    // Tambah Data Galleri
    public function add()
    {
        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'TAMBAH DATA GALLERI',
            'halaman'           => 'backend/dokumentasi/galleri/v_add',
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
            'judul_foto',
            'Judul Foto',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        if ($valid->run() == FALSE) {
            $this->add();
            // End Validasi Input
        } else {
            // Falidasi Foto
            $config['upload_path']          = './assets/backend/img/dokumentasi/galleri/asli/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = '3000';
            $config['max_width']            = '3000';
            $config['max_height']           = '3000';

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('error', 'Foto Gagal Di Upload');
                $this->add();
                // End Validasi Input
            } else {
                // Falidasi Foto
                $upload_gambar = array('upload_data' => $this->upload->data());

                // Create thumbnail
                $config['image_library']        = 'gd2';
                $config['source_image']         = './assets/backend/img/dokumentasi/galleri/asli/' . $upload_gambar['upload_data']['file_name'];

                // Lokasi folder thumbnail
                $config['new_image']            = './assets/backend/img/dokumentasi/galleri/thumbnail/';
                $config['create_thumb']         = TRUE;
                $config['maintain_ratio']       = TRUE;
                $config['width']                = 1000;
                $config['height']               = 1500;
                $config['thumb_marker']         = '';

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                // End create thumbnail

                //Masuk Database Galleri
                $data = array(
                    'judul_foto'             => $this->input->post('judul_foto'),
                    'foto'                  => $upload_gambar['upload_data']['file_name'],
                    'tanggal_post'          => date('Y-m-d H:i:s'),
                );
                $this->m_galleri->simpan_add($data);
                $this->session->set_flashdata('success', 'Data Telah Ditambahkan');
                redirect(base_url('backend/dokumentasi/Galleri/index'), 'refresh');
            }
        }
    }

    //Edit Data Galleri
    public function edit($id_galleri)
    {
        $judul_foto = $this->m_galleri->getWhere($id_galleri);
        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'EDIT DATA GALLERI',
            'sub_header'        => $judul_foto->judul_foto,
            'halaman'           => 'backend/dokumentasi/galleri/v_edit',
        );
        // Ambil Detail Galleri
        $data['isi_form'] = $this->m_galleri->getWhere($id_galleri);

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
        $id_galleri = $this->input->post('id_galleri');

        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'judul_foto',
            'Judul Foto',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        if ($valid->run() == FALSE) {
            $this->edit($id_galleri);
            // End Validasi Input
        } else {
            // Falidasi Foto Jika Diganti
            if (!empty($_FILES['foto']['name'])) {
                // Falidasi Foto
                $config['upload_path']          = './assets/backend/img/dokumentasi/galleri/asli/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['max_size']             = '3000';
                $config['max_width']            = '3000';
                $config['max_height']           = '3000';

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto')) {
                    $this->session->set_flashdata('error', 'Foto Gagal Di Upload');
                    $this->edit($id_galleri);
                    // End Validasi Input
                } else {
                    // Ambil Detail Galleri
                    $isi = $this->m_galleri->getWhere($id_galleri);

                    // Delete Foto di Tbl Galleri
                    if ($isi->foto != '') {
                        unlink('./assets/backend/img/dokumentasi/galleri/asli/' . $isi->foto);
                        unlink('./assets/backend/img/dokumentasi/galleri/thumbnail/' . $isi->foto);
                    }
                    // End Delete Foto di Tbl Galleri

                    // Falidasi Foto
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    // Create thumbnail
                    $config['image_library']        = 'gd2';
                    $config['source_image']         = './assets/backend/img/dokumentasi/galleri/asli/' . $upload_gambar['upload_data']['file_name'];

                    // Lokasi folder thumbnail
                    $config['new_image']            = './assets/backend/img/dokumentasi/galleri/thumbnail/';
                    $config['create_thumb']         = TRUE;
                    $config['maintain_ratio']       = TRUE;
                    $config['width']                = 1000;
                    $config['height']               = 1500;
                    $config['thumb_marker']         = '';

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    // End create thumbnail

                    //Masuk Database Galleri
                    $data = array(
                        'id_galleri'            => $id_galleri,
                        'judul_foto'            => $this->input->post('judul_foto'),
                        'foto'                  => $upload_gambar['upload_data']['file_name'],
                    );
                    $this->m_galleri->simpan_edit($id_galleri, $data);
                    $this->session->set_flashdata('success', 'Data Telah Di Update');
                    redirect(base_url('backend/dokumentasi/Galleri/index'), 'refresh');
                }
            } else {
                //Masuk Database Galleri
                $data = array(
                    'id_galleri'             => $id_galleri,
                    'judul_foto'             => $this->input->post('judul_foto'),
                );
                $this->m_galleri->simpan_edit($id_galleri, $data);
                $this->session->set_flashdata('success', 'Data Telah Di Update');
                redirect(base_url('backend/dokumentasi/Galleri/index'), 'refresh');
            }
        }
    }

    // Delete Data Galleri
    public function delete($id_galleri)
    {
        // Ambil Detail Galleri
        $isi = $this->m_galleri->getWhere($id_galleri);
        // Delete Foto di Tbl Galleri 
        if ($isi->foto != '') {
            unlink('./assets/backend/img/dokumentasi/galleri/asli/' . $isi->foto);
            unlink('./assets/backend/img/dokumentasi/galleri/thumbnail/' . $isi->foto);
        }
        // End Delete Foto di Tbl Galleri 

        // Delete data di tabel Galleri
        $this->m_galleri->delete($id_galleri);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect(base_url('backend/dokumentasi/Galleri/index'), 'refresh');
    }
}
