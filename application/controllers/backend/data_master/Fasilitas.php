<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/data_master/m_fasilitas');
        $this->load->model('backend/data_master/m_kategori');
        $this->load->model('backend/pengguna/m_pelanggan');
        $this->load->model('frontend/transaksi/m_header_transaksi');
        $this->load->model('backend/buku/m_komentar');

        // Proteksi Halaman
        if ($this->session->userdata('login') == FALSE) {

            $this->session->set_flashdata('warning', 'Anda Belum Login');
            redirect('backend/auth/Login');
        }
    }

    // Halaman Fasilitas
    public function index()
    {
        // Ambil jumlah Fasilitas
        $jumlah_fasilitas = $this->m_fasilitas->jumlah_fasilitas();

        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'DATA FASILITAS',
            'sub_header'        => 'JUMLAH DATA FASILITAS (' . $jumlah_fasilitas->jumlah . ') ',
            'halaman'           => 'backend/data_master/fasilitas/v_list',
        );
        // Ambil Data Fasilitas
        $data['fasilitas'] = $this->m_fasilitas->getAll();

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_komentar'] = $this->m_komentar->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    // Tambah Data Foto
    public function add_foto($id_fasilitas)
    {
        $nama_fasilitas = $this->m_fasilitas->getWhere($id_fasilitas);
        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'DATA FOTO FASILITAS',
            'sub_header'        => $nama_fasilitas->nama_fasilitas,
            'halaman'           => 'backend/data_master/fasilitas/v_list_foto',
        );
        // Ambil Detail Fasilitas
        $data['isi_form'] = $this->m_fasilitas->getWhere($id_fasilitas);
        // Ambil Detail Tbl Foto
        $data['isi_form_tbl_foto'] = $this->m_fasilitas->getWhereFoto($id_fasilitas);

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_komentar'] = $this->m_komentar->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    function proses_add_foto()
    {
        $id_fasilitas = $this->input->post('id_fasilitas');
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
            $this->add_foto($id_fasilitas);
            // End Validasi Input
        } else {
            // Falidasi Foto
            $config['upload_path']          = './assets/backend/img/fasilitas/asli/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = '3000';
            $config['max_width']            = '3000';
            $config['max_height']           = '3000';

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('error', 'Foto Gagal Di Upload');
                $this->add_foto($id_fasilitas);
                // End Validasi Input
            } else {
                // Falidasi Foto
                $upload_gambar = array('upload_data' => $this->upload->data());

                // Create thumbnail
                $config['image_library']        = 'gd2';
                $config['source_image']         = './assets/backend/img/fasilitas/asli/' . $upload_gambar['upload_data']['file_name'];

                // Lokasi folder thumbnail
                $config['new_image']            = './assets/backend/img/fasilitas/thumbnail/';
                $config['create_thumb']         = TRUE;
                $config['maintain_ratio']       = TRUE;
                $config['width']                = 1000;
                $config['height']               = 1500;
                $config['thumb_marker']         = '';

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                // End create thumbnail

                //Masuk Database Fasilitas
                $data = array(
                    'id_fasilitas'          => $id_fasilitas,
                    'id_pegawai'            => $this->session->userdata('id_pegawai'),
                    'judul_foto'                 => $this->input->post('judul_foto'),
                    'foto'                  => $upload_gambar['upload_data']['file_name'],
                );
                $this->m_fasilitas->simpan_add_foto($data);
                $this->session->set_flashdata('success', 'Data Telah Ditambahkan');
                redirect(base_url('backend/data_master/Fasilitas/add_foto/' . $id_fasilitas), 'refresh');
            }
        }
    }

    // Tambah Data Fasilitas
    public function add()
    {
        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'TAMBAH DATA FASILITAS',
            'halaman'           => 'backend/data_master/fasilitas/v_add',
        );
        // Ambil Data Kategori
        $data['kategori'] = $this->m_kategori->getAll();

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
            'nama_fasilitas',
            'Nama Fasilitas',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        $valid->set_rules(
            'kode_fasilitas',
            'Kode Fasilitas',
            'required|is_unique[tbl_fasilitas.kode_fasilitas]',
            array(
                'required'          => '%s Harus Diisi',
                'is_unique'         => '%s Sudah Digunakan. Buat Kode Fasilitas Baru.',
            )
        );

        $valid->set_rules(
            'harga',
            'Harga Fasilitas',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        $valid->set_rules(
            'deskripsi',
            'Deskripsi Fasilitas',
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
            $config['upload_path']          = './assets/backend/img/fasilitas/asli/';
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
                $config['source_image']         = './assets/backend/img/fasilitas/asli/' . $upload_gambar['upload_data']['file_name'];

                // Lokasi folder thumbnail
                $config['new_image']            = './assets/backend/img/fasilitas/thumbnail/';
                $config['create_thumb']         = TRUE;
                $config['maintain_ratio']       = TRUE;
                $config['width']                = 1000;
                $config['height']               = 1500;
                $config['thumb_marker']         = '';

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                // End create thumbnail

                //Masuk Database Fasilitas
                $slug_fasilitas = url_title($this->input->post('nama') . '-' . $this->input->post('kode_fasilitas'), 'dash', TRUE);
                $data = array(
                    'id_pegawai'            => $this->session->userdata('id_pegawai'),
                    'id_kategori'           => $this->input->post('id_kategori'),
                    'kode_fasilitas'        => $this->input->post('kode_fasilitas'),
                    'nama_fasilitas'        => $this->input->post('nama_fasilitas'),
                    'slug_fasilitas'        => $slug_fasilitas,
                    'harga'                 => $this->input->post('harga'),
                    'deskripsi'             => $this->input->post('deskripsi'),
                    'foto'                  => $upload_gambar['upload_data']['file_name'],
                    'status_fasilitas'      => $this->input->post('status_fasilitas'),
                    'tanggal_post'          => date('Y-m-d H:i:s'),
                );
                $this->m_fasilitas->simpan_add($data);
                $this->session->set_flashdata('success', 'Data Telah Ditambahkan');
                redirect(base_url('backend/data_master/Fasilitas/index'), 'refresh');
            }
        }
    }

    //Edit Data Fasilitas
    public function edit($id_fasilitas)
    {
        $nama_fasilitas = $this->m_fasilitas->getWhere($id_fasilitas);
        $data = array(
            'title'             => 'Golden Care',
            'sub_title'         => 'EDIT DATA FASILITAS',
            'sub_header'        => $nama_fasilitas->nama_fasilitas,
            'halaman'           => 'backend/data_master/fasilitas/v_edit',
        );
        // Ambil Detail Fasilitas
        $data['isi_form'] = $this->m_fasilitas->getWhere($id_fasilitas);
        // Ambil Data Kategori
        $data['kategori'] = $this->m_kategori->getAll();

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
        $id_fasilitas = $this->input->post('id_fasilitas');

        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_fasilitas',
            'Nama Fasilitas',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        $valid->set_rules(
            'kode_fasilitas',
            'Kode Fasilitas',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        $valid->set_rules(
            'harga',
            'Harga Fasilitas',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        $valid->set_rules(
            'deskripsi',
            'Deskripsi Fasilitas',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        if ($valid->run() == FALSE) {
            $this->edit($id_fasilitas);
            // End Validasi Input
        } else {
            // Falidasi Foto Jika Diganti
            if (!empty($_FILES['foto']['name'])) {
                // Falidasi Foto
                $config['upload_path']          = './assets/backend/img/fasilitas/asli/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['max_size']             = '3000';
                $config['max_width']            = '3000';
                $config['max_height']           = '3000';

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto')) {
                    $this->session->set_flashdata('error', 'Foto Gagal Di Upload');
                    $this->edit($id_fasilitas);
                    // End Validasi Input
                } else {
                    // Ambil Detail Fasilitas
                    $isi = $this->m_fasilitas->getWhere($id_fasilitas);

                    // Delete Foto di Tbl Fasilitas
                    if ($isi->foto != '') {
                        unlink('./assets/backend/img/fasilitas/asli/' . $isi->foto);
                        unlink('./assets/backend/img/fasilitas/thumbnail/' . $isi->foto);
                    }
                    // End Delete Foto di Tbl Fasilitas

                    // Falidasi Foto
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    // Create thumbnail
                    $config['image_library']        = 'gd2';
                    $config['source_image']         = './assets/backend/img/fasilitas/asli/' . $upload_gambar['upload_data']['file_name'];

                    // Lokasi folder thumbnail
                    $config['new_image']            = './assets/backend/img/fasilitas/thumbnail/';
                    $config['create_thumb']         = TRUE;
                    $config['maintain_ratio']       = TRUE;
                    $config['width']                = 1000;
                    $config['height']               = 1500;
                    $config['thumb_marker']         = '';

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    // End create thumbnail

                    //Masuk Database Fasilitas
                    $slug_fasilitas = url_title($this->input->post('nama') . '-' . $this->input->post('kode_fasilitas'), 'dash', TRUE);
                    $data = array(
                        'id_fasilitas'          => $id_fasilitas,
                        'id_pegawai'            => $this->session->userdata('id_pegawai'),
                        'id_kategori'           => $this->input->post('id_kategori'),
                        'kode_fasilitas'        => $this->input->post('kode_fasilitas'),
                        'nama_fasilitas'        => $this->input->post('nama_fasilitas'),
                        'slug_fasilitas'        => $slug_fasilitas,
                        'harga'                 => $this->input->post('harga'),
                        'deskripsi'             => $this->input->post('deskripsi'),
                        'foto'                  => $upload_gambar['upload_data']['file_name'],
                        'status_fasilitas'      => $this->input->post('status_fasilitas'),
                    );
                    $this->m_fasilitas->simpan_edit($id_fasilitas, $data);
                    $this->session->set_flashdata('success', 'Data Telah Di Update');
                    redirect(base_url('backend/data_master/Fasilitas/index'), 'refresh');
                }
            } else {
                //Masuk Database Fasilitas
                $slug_fasilitas = url_title($this->input->post('nama') . '-' . $this->input->post('kode_fasilitas'), 'dash', TRUE);
                $data = array(
                    'id_fasilitas'          => $id_fasilitas,
                    'id_pegawai'            => $this->session->userdata('id_pegawai'),
                    'id_kategori'           => $this->input->post('id_kategori'),
                    'kode_fasilitas'        => $this->input->post('kode_fasilitas'),
                    'nama_fasilitas'        => $this->input->post('nama_fasilitas'),
                    'slug_fasilitas'        => $slug_fasilitas,
                    'harga'                 => $this->input->post('harga'),
                    'deskripsi'             => $this->input->post('deskripsi'),
                    'status_fasilitas'      => $this->input->post('status_fasilitas'),
                );
                $this->m_fasilitas->simpan_edit($id_fasilitas, $data);
                $this->session->set_flashdata('success', 'Data Telah Di Update');
                redirect(base_url('backend/data_master/Fasilitas/index'), 'refresh');
            }
        }
    }

    // Delete Data Fasilitas
    public function delete($id_fasilitas)
    {
        // Ambil Detail Fasilitas
        $isi = $this->m_fasilitas->getWhereDeleteFasilitas($id_fasilitas);

        // Delete Foto di Tbl Fasilitas
        if ($isi->foto != '') {
            unlink('./assets/backend/img/fasilitas/asli/' . $isi->foto);
            unlink('./assets/backend/img/fasilitas/thumbnail/' . $isi->foto);
        }
        // End Delete Foto di Tbl Fasilitas 

        // Delete data di tabel fasilitas
        $this->m_fasilitas->delete($id_fasilitas);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect(base_url('backend/data_master/Fasilitas/index'), 'refresh');
    }

    // Delete Data Foto
    public function delete_foto($id_fasilitas, $id_foto)
    {
        // Ambil Detail Foto
        $isi = $this->m_fasilitas->getWhereDeleteFoto($id_foto);

        // Delete Foto di Tbl Foto
        if ($isi->foto != '') {
            unlink('./assets/backend/img/fasilitas/asli/' . $isi->foto);
            unlink('./assets/backend/img/fasilitas/thumbnail/' . $isi->foto);
        }
        // End Delete Foto di Tbl Foto

        $this->m_fasilitas->delete_foto($id_foto);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect(base_url('backend/data_master/Fasilitas/add_foto/' . $id_fasilitas), 'refresh');
    }
}
