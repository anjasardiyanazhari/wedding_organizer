<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
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

    // Halaman Menu
    public function index()
    {
        // Ambil data Login id_pelanggan dari SESSION
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->m_header_transaksi->getTransaksi_pelanggan($id_pelanggan);

        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'             => 'Dashboard',
            'site'              => $site,
            'header_transaksi'  => $header_transaksi,
            'halaman'           => 'frontend/dashboard/informasi/v_list',
        );
        $this->load->view('frontend/layout/v_wrapper', $data);
    }

    // Halaman Konfirmasi Pembayaran
    public function konfirmasi($kode_transaksi)
    {
        // Ambil data Login id_pelanggan dari SESSION
        $header_transaksi = $this->m_header_transaksi->getKode_transaksi($kode_transaksi);
        $rekening = $this->m_rekening->getAll();

        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'tanggal_bayar',
            'Tanggal Bayar',
            'required',
            array('required' => '%s harus di isi')
        );

        $valid->set_rules(
            'jumlah_bayar',
            'Jumlah Bayar',
            'required',
            array('required' => '%s harus di isi')
        );

        $valid->set_rules(
            'nama_bank',
            'Nama Bank',
            'required',
            array('required' => '%s harus di isi')
        );

        $valid->set_rules(
            'rekening_pembayaran',
            'Rekening Pembayaran',
            'required',
            array('required' => '%s harus di isi')
        );

        $valid->set_rules(
            'rekening_pelanggan',
            'Rekening Pelanggan',
            'required',
            array('required' => '%s harus di isi')
        );

        if ($valid->run()) {

            // Kondisi ketika edit data dan gambar
            if (!empty($_FILES['bukti_bayar']['name'])) {
                // Falidasi Foto
                $config['upload_path']          = './assets/backend/img/bukti_bayar/asli/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['max_size']             = '3000';
                $config['max_width']            = '3000';
                $config['max_height']           = '3000';

                $this->load->library('upload');
                $this->upload->initialize($config);

                // Falidasi Foto Jika Diganti
                if (!$this->upload->do_upload('bukti_bayar')) {

                    $site = $this->m_konfigurasi->getAll();
                    $data = array(
                        'title'                 => 'Konfirmasi Pembayaran',
                        'site'                  => $site,
                        'header_transaksi'      => $header_transaksi,
                        'rekening'              => $rekening,
                        'error'                 => $this->upload->display_errors(),
                        'halaman'               => 'frontend/dashboard/informasi/v_konfirmasi',
                    );

                    $this->load->view('frontend/layout/v_wrapper', $data);
                } else {
                    // Ambil Detail Fasilitas
                    $isi = $this->m_header_transaksi->getWhere($header_transaksi->id_header_transaksi);

                    // Delete Foto di Tbl Fasilitas
                    if ($isi->bukti_bayar != '') {
                        unlink('./assets/backend/img/bukti_bayar/asli/' . $isi->bukti_bayar);
                        unlink('./assets/backend/img/bukti_bayar/thumbnail/' . $isi->bukti_bayar);
                    }
                    // End Delete Foto di Tbl Fasilitas

                    // Falidasi Foto
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    // Create thumbnail
                    $config['image_library']        = 'gd2';
                    $config['source_image']         = './assets/backend/img/bukti_bayar/asli/' . $upload_gambar['upload_data']['file_name'];

                    // Lokasi folder thumbnail
                    $config['new_image']            = './assets/backend/img/bukti_bayar/thumbnail/';
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
                        'id_header_transaksi'       => $header_transaksi->id_header_transaksi,
                        'tanggal_warna'             => '#FF0000',
                        'status_bayar'              => 'konfirmasi',
                        'jumlah_bayar'              => $this->input->post('jumlah_bayar'),
                        'rekening_pembayaran'       => $this->input->post('rekening_pembayaran'),
                        'rekening_pelanggan'        => $this->input->post('rekening_pelanggan'),
                        'bukti_bayar'               => $upload_gambar['upload_data']['file_name'],
                        'id_rekening'               => $this->input->post('id_rekening'),
                        'tanggal_bayar'             => $this->input->post('tanggal_bayar'),
                        'nama_bank'                 => $this->input->post('nama_bank'),
                    );
                    $this->m_header_transaksi->simpan_edit($header_transaksi->id_header_transaksi, $data);
                    $this->session->set_flashdata('success', 'Data Telah Di Update');
                    redirect(base_url('frontend/dashboard/Informasi/konfirmasi/' . $header_transaksi->kode_transaksi), 'refresh');
                }
                // End Kondisi ketika edit data dan gambar

            } else {
                // Kondisi ketika edit produk tapi tidak ganti gambar
                // Masuk Database Fasilitas
                $data = array(
                    'id_header_transaksi'   => $header_transaksi->id_header_transaksi,
                    'status_bayar'          => 'konfirmasi',
                    'jumlah_bayar'          => $this->input->post('jumlah_bayar'),
                    'rekening_pembayaran'   => $this->input->post('rekening_pembayaran'),
                    'rekening_pelanggan'    => $this->input->post('rekening_pelanggan'),
                    // 'bukti_bayar'        => $upload_gambar['upload_data']['file_name'],
                    'id_rekening'           => $this->input->post('id_rekening'),
                    'tanggal_bayar'         => $this->input->post('tanggal_bayar'),
                    'nama_bank'             => $this->input->post('nama_bank'),
                );
                $this->m_header_transaksi->simpan_edit($header_transaksi->id_header_transaksi, $data);
                $this->session->set_flashdata('success', 'Data Telah Di Update');
                redirect(base_url('frontend/dashboard/Informasi/konfirmasi/' . $header_transaksi->kode_transaksi), 'refresh');
            }
        }

        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'                 => 'Konfirmasi Pembayaran',
            'site'                  => $site,
            'header_transaksi'      => $header_transaksi,
            'rekening'              => $rekening,
            'halaman'               => 'frontend/dashboard/informasi/v_konfirmasi',
        );

        $this->load->view('frontend/layout/v_wrapper', $data);
    }

    // Delete Data Transaksi
    public function delete_penyewaan($kode_transaksi)
    {
        // Ambil Detail Penyewaan
        $isi = $this->m_header_transaksi->getWhereDeleteFoto($kode_transaksi);

        // Delete Foto di Tbl Fasilitas
        if ($isi->bukti_bayar != '') {
            unlink('./assets/backend/img/bukti_bayar/asli/' . $isi->bukti_bayar);
            unlink('./assets/backend/img/bukti_bayar/thumbnail/' . $isi->bukti_bayar);
        }
        // End Delete Foto di Tbl Fasilitas

        // Delete data di Model transaksi
        $this->m_header_transaksi->delete($kode_transaksi);
        // Delete data di Model transaksi
        $this->m_transaksi->delete($kode_transaksi);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect(base_url('frontend/dashboard/informasi/index'), 'refresh');
    }
}
