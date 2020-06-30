<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyewaan extends CI_Controller
{

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/data_master/m_rekening');
        $this->load->model('frontend/transaksi/m_transaksi');
        $this->load->model('frontend/transaksi/m_header_transaksi');
        $this->load->model('backend/pengguna/m_pelanggan');
        $this->load->model('frontend/transaksi/m_header_transaksi');
        $this->load->model('backend/buku/m_contact');

        // Proteksi Halaman
        if ($this->session->userdata('login') == FALSE) {

            $this->session->set_flashdata('warning', 'Anda Belum Login');
            redirect('backend/auth/Login');
        }
    }

    // Halaman Pembayaran
    public function index()
    {
        // Ambil jumlah Kategori
        $jumlah_header_transaksi = $this->m_header_transaksi->jumlah_header_transaksi();

        $data = array(
            'title'             => 'Administrator',
            'sub_title'         => 'DATA PENYEWAAN',
            'sub_header'        => 'JUMLAH DATA PENYEWAAN (' . $jumlah_header_transaksi->jumlah . ') ',
            'halaman'           => 'backend/transaksi/penyewaan/v_list',
        );
        // Ambil Data header_transaksi
        $data['header_transaksi'] = $this->m_header_transaksi->getAll();
        // Ambil Data Rekening
        $data['rekening'] = $this->m_rekening->getAll();

        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_contact'] = $this->m_contact->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    // Halaman Bukti Pembayaran
    public function bukti($kode_transaksi)
    {
        $header_transaksi = $this->m_header_transaksi->getKode_transaksi($kode_transaksi);
        $transaksi = $this->m_transaksi->getKode_transaksi($kode_transaksi);

        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'                 => 'Riwayat Penyewaan',
            'sub_title'             => 'BUKTI BAYAR',
            'site'                  => $site,
            'header_transaksi'      => $header_transaksi,
            'transaksi'             => $transaksi,
            'halaman'               => 'backend/transaksi/penyewaan/v_bukti',
        );
        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_contact'] = $this->m_contact->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    // Halaman Update
    public function update($kode_transaksi)
    {
        $header_transaksi = $this->m_header_transaksi->getKode_transaksi($kode_transaksi);
        $transaksi = $this->m_transaksi->getKode_transaksi($kode_transaksi);

        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'                 => 'Riwayat Penyewaan',
            'sub_title'             => 'UPDATE STATUS',
            'site'                  => $site,
            'header_transaksi'      => $header_transaksi,
            'transaksi'             => $transaksi,
            'halaman'               => 'backend/transaksi/penyewaan/v_update',
        );
        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_contact'] = $this->m_contact->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    // Update status bayar
    function update_status($kode_transaksi)
    {
        $header_transaksi = $this->m_header_transaksi->getKode_transaksi($kode_transaksi);

        $this->db->where('id_header_transaksi', $header_transaksi->id_header_transaksi);
        $this->db->update('tbl_header_transaksi', ['status_bayar' => 'lunas', 'tanggal_warna' => '#0071c5']);
        redirect(base_url('backend/transaksi/Penyewaan/update/' . $header_transaksi->kode_transaksi), 'refresh');
    }

    // Halaman Print
    public function print($kode_transaksi)
    {
        $header_transaksi = $this->m_header_transaksi->getKode_transaksi($kode_transaksi);
        $transaksi = $this->m_transaksi->getKode_transaksi($kode_transaksi);

        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'                 => 'Print Transaksi',
            'sub_title'             => 'PRINT TRANSAKSI',
            'sub_header'            => 'Golden Care',
            'site'                  => $site,
            'header_transaksi'      => $header_transaksi,
            'transaksi'             => $transaksi,
            'halaman'               => 'backend/transaksi/penyewaan/v_print',
        );
        // Ambil Data Konfigurasi Untuk Menampilkan Isi Setting icon
        $data['site'] = $this->m_konfigurasi->getAll();

        // Menampilkan Jumlah Total Data ke Sidebar
        $data['total_pelanggan'] = $this->m_pelanggan->getAll();
        $data['total_header_transaksi'] = $this->m_header_transaksi->getAll();
        $data['total_contact'] = $this->m_contact->getAll();
        $this->load->view('backend/layout/v_wrapper', $data);
    }

    // Halaman Unduh pdf
    public function pdf($kode_transaksi)
    {
        $header_transaksi = $this->m_header_transaksi->getKode_transaksi($kode_transaksi);
        $transaksi = $this->m_transaksi->getKode_transaksi($kode_transaksi);

        $site = $this->m_konfigurasi->getAll();
        $data = array(
            'title'                 => 'Download Transaksi',
            'site'                  => $site,
            'header_transaksi'      => $header_transaksi,
            'transaksi'             => $transaksi,
        );

        $html = $this->load->view('backend/transaksi/penyewaan/v_unduh', $data, true);
        // Load fungsi mpdf
        $mpdf = new \Mpdf\Mpdf();

        // Seting Header dan Footer
        $mpdf->SetHTMLHeader('
         <div style="padding:80px 40px; text-align:left; font-weight:bold;">
             <img src="' . base_url('assets/backend/img/logo/thumbnail/' . $site->logo) . ' " style="height:50; width:auto">
         </div>');


        $mpdf->SetHTMLFooter('
         <div style="padding:10px 25px; background-color:black;">
            <table style="color:white; font-size:12px;">
                 <tr>
                     <td>Alamat</td>
                     <td>:' . $site->nama_web . '(' . $site->alamat . ')</td>
                 </tr>
                 <tr>
                     <td>Telepon</td>
                     <td>:' . $site->no_telp . '</td>
                 </tr>
            </table>
         </div>');
        // End seting Header dan Footer'

        // Write some HTMl code:
        $mpdf->WriteHTML($html);
        // Output a PDF file directly to the browser
        $nama_file_pdf = url_title($site->nama_web,  'dash', 'true') . '_'  . $header_transaksi->nama . '_' . $kode_transaksi . '.pdf';
        $mpdf->Output($nama_file_pdf, 'I');
    }

    // Delete Data Transaksi
    public function delete($kode_transaksi)
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
        redirect(base_url('backend/transaksi/Penyewaan/index'), 'refresh');
    }
}
