<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/data_master/m_fasilitas');
        $this->load->model('backend/data_master/m_kategori');
        $this->load->model('backend/setting/m_konfigurasi');
        $this->load->model('frontend/pengguna/m_pelanggan');
        $this->load->model('frontend/transaksi/m_header_transaksi');
        $this->load->model('frontend/transaksi/m_transaksi');

        // Load Helper Random Sting
        $this->load->helper('string');
    }

    //Halaman Utama Pemesanan
    public function index()
    {
        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'             => 'View Cart ' . $site->nama_web,
            'site'              => $site,
            'halaman'           => 'frontend/transaksi/Pemesanan/v_list',
        );
        // Ambil Data Pemesanan chart_check
        $data['chart_check'] = $this->cart->contents();
        $this->load->view('frontend/layout/v_wrapper', $data);
    }

    // Tambah Data Pemesanan
    public function add()
    {
        // Ambil Data Dari Form 
        $id             = $this->input->post('id');
        $qty            = $this->input->post('qty');
        $price          = $this->input->post('price');
        $name           = $this->input->post('name');
        $redirect_page  = $this->input->post('redirect_page');

        // Proses Memasukan Ke Keranjang 
        $data = array(
            'id'      => $id,
            'qty'     => $qty,
            'price'   => $price,
            'name'    => $name,
        );
        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
    }

    // Update Cart
    public function update_cart($rowid)
    {
        // Jika Ada rowid
        if ($rowid) {
            $data = array(
                'rowid'      => $rowid,
                'qty'       => $this->input->post('qty')
            );
            $this->cart->update($data);
            $this->session->set_flashdata('success', 'Data Keranjang Pemesanan Telah Diupdate');
            redirect(base_url('frontend/transaksi/Pemesanan'), 'refresh');

            // Jika Tidak Ada rowid
        } else {
            redirect(base_url('frontend/transaksi/Pemesanan'), 'refresh');
        }
    }


    // Check Out
    public function check_out()
    {
        // Check Pelanggan sudah Login atau Registrasi ?, jika belum maka Login atau Registrasi
        // Jika sudah Login
        if ($this->session->userdata('email')) {
            $email          = $this->session->userdata('email');
            $nama           = $this->session->userdata('nama');
            $pelanggan      = $this->m_pelanggan->sudah_login($email, $nama);

            $site = $this->m_konfigurasi->getAll();
            $data = array(
                'title'             => 'Check Out ' . $site->nama_web,
                'site'              => $site,
                'pelanggan'         => $pelanggan,
                'halaman'           => 'frontend/transaksi/Pemesanan/v_check_out',
            );
            // Ambil Data Pemesanan chart_check
            $data['chart_check'] = $this->cart->contents();
            $this->load->view('frontend/layout/v_wrapper', $data);
        } else {
            // Jika Belum, Maka Registrasi
            $this->session->set_flashdata('success', 'Silahkan Login atau Registrasi Terlebih Dahulu');
            redirect(base_url('frontend/auth/Login'), 'refresh');
        }
    }

    // Proses Check out
    public function proses_check_out()
    {
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'tanggal_acara',
            'Tanggal Acara Resepsi',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        $valid->set_rules(
            'tanggal_selesai_acara',
            'Tanggal Selesai Acara Resepsi',
            'required',
            array(
                'required'          => '%s Harus Diisi',
            )
        );

        $valid->set_rules(
            'nama',
            'Nama Penyewa',
            'required|max_length[20]',
            array(
                'required'          => '%s Harus Diisi',
                'max_length'        => '%s Maximal 20 Karakter',
            )
        );

        $valid->set_rules(
            'email',
            'Email Penyewa',
            'required|valid_email',
            array(
                'required'          => '%s Harus Diisi',
                'valid_email'       => '%s Tidak Valid',
            )
        );

        $valid->set_rules(
            'no_telp',
            'No Telp Penyewa',
            'required|min_length[10]',
            array(
                'required'          => '%s Harus Diisi',
                'min_length'        => '%s Minimal 10 Digit',
            )
        );

        $valid->set_rules(
            'alamat',
            'Alamat Penyewa',
            'required|min_length[5]',
            array(
                'required'          => '%s Harus Diisi',
                'min_length'        => '%s Minimal 5 Karakter',
            )
        );

        if ($valid->run() == FALSE) {
            $this->check_out();
            // End Validasi Input
        } else {
            //Masuk Database Pelanggan

            $email          = $this->session->userdata('email');
            $nama           = $this->session->userdata('nama');
            $pelanggan      = $this->m_pelanggan->sudah_login($email, $nama);
            $chart_check    = $this->cart->contents();

            $data = array(
                'id_pelanggan'          => $pelanggan->id_pelanggan,
                'tanggal_acara'         => $this->input->post('tanggal_acara'),
                'tanggal_selesai_acara' => $this->input->post('tanggal_selesai_acara'),
                'nama'                  => $this->input->post('nama'),
                'email'                 => $this->input->post('email'),
                'no_telp'               => $this->input->post('no_telp'),
                'alamat'                => $this->input->post('alamat'),
                'kode_transaksi'        => $this->input->post('kode_transaksi'),
                'tanggal_checkout'      => $this->input->post('tanggal_checkout'),
                'jumlah_transaksi'      => $this->input->post('jumlah_transaksi'),
                'status_bayar'          => 'panding',
            );
            // Proses Masuk ke Model Header Transaksi
            $this->m_header_transaksi->simpan_add($data);

            // Proses Masuk ke Table Transaksi
            foreach ($chart_check as $chart_check) {
                $sub_total = $chart_check['price'] * $chart_check['qty'];

                $data = array(
                    'id_transaksi'          => 'id_transaksi',
                    'id_pelanggan'          => $pelanggan->id_pelanggan,
                    'kode_transaksi'        => $this->input->post('kode_transaksi'),
                    'tanggal_checkout'      => $this->input->post('tanggal_checkout'),
                    'id_fasilitas'          => $chart_check['id'],
                    'harga'                 => $chart_check['price'],
                    'jumlah'                => $chart_check['qty'],
                    'total_harga'           => $sub_total
                );

                $this->m_transaksi->simpan_add($data);
            }
            // End Masuk ke Table Transaksi

            // Setelah masuk ke tabel maka keranjang di kosongkan
            $this->cart->destroy();
            $this->session->set_flashdata('success', 'Check Out Berhasil');
            redirect(base_url('frontend/transaksi/Pemesanan/success'), 'refresh');
        }
    }

    // Halaman Success Pemesanan
    public function success()
    {
        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'             => 'Check Out Berhasil',
            'site'              => $site,
            'halaman'           => 'frontend/transaksi/Pemesanan/v_success',
        );
        $this->load->view('frontend/layout/v_wrapper', $data);
    }

    // Delete Semua isi Keranjang Pemesanan
    public function delete($rowid = FALSE)
    {
        if ($rowid) {
            // Delete Per Item
            $this->cart->remove($rowid);
            $this->session->set_flashdata('success', 'Item Keranjang Pemesanan Berhasil Dihapus');
            redirect(base_url('frontend/transaksi/Pemesanan'), 'refresh');
        } else {
            // Delete All
            $this->cart->destroy();
            $this->session->set_flashdata('success', 'Semua Data Keranjang Pemesanan Berhasil Dihapus');
            redirect(base_url('frontend/transaksi/Pemesanan'), 'refresh');
        }
    }
}
