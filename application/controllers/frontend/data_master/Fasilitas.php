<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/data_master/m_fasilitas');
        $this->load->model('backend/data_master/m_kategori');
    }

    //Halaman Utama Pemesanan
    public function index()
    {
        $site = $this->m_konfigurasi->getAll();
        $kategori = $this->m_fasilitas->getAllKategori();
        // Ambil Total Fasilitas Di m_fasilitas
        $total = $this->m_fasilitas->total_fasilitas();

        // Start Pagination
        $this->load->library('pagination');

        $config['base_url']             = base_url() . 'frontend/data_master/fasilitas/index/';
        $config['total_rows']           = $total->total;
        $config['use_page_numbers']     = TRUE;
        $config['per_page']             = 9;
        $config['uri_segment']          = 5;
        $config['num_links']            = 9;

        // Style Pagination
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        // End Style Pagination 

        $config['first_url']            = base_url() . 'frontend/data_master/Fasilitas/';

        $this->pagination->initialize($config);
        // End Pagination

        // // Ambil Data Fasilitas
        $page = ($this->uri->segment(5)) ? ($this->uri->segment(5) - 1) * $config['per_page'] : 0;
        $fasilitas_page = $this->m_fasilitas->fasilitas($config['per_page'], $page);

        $data = array(
            'title'             => 'Fasilitas Golden Care',
            'site'              => $site,
            'kategori'          => $kategori,
            'fasilitas_page'    => $fasilitas_page,
            'pagin'             => $this->pagination->create_links(),
            'halaman'           => 'frontend/data_master/fasilitas/v_list',
        );
        // Ambil Data Pemesanan chart_check
        $data['fasilitas'] = $this->m_konfigurasi->getAll();
        $data['kategori'] = $this->m_fasilitas->getAllKategori();
        $this->load->view('frontend/layout/v_wrapper', $data);
    }

    //Halaman Utama Pemesanan Data Kategori
    public function kategori($slug_kategori)
    {
        // Ambil Data Kategori
        $kategori_read = $this->m_kategori->read($slug_kategori);
        $id_kategori = $kategori_read->id_kategori;

        // Data Global
        $site = $this->m_konfigurasi->getAll();
        $kategori = $this->m_fasilitas->getAllKategori();

        // Ambil Total Fasilitas Di m_fasilitas
        $total = $this->m_fasilitas->total_kategori($id_kategori);

        // Start Pagination
        $this->load->library('pagination');

        $config['base_url']             = base_url() . 'frontend/data_master/fasilitas/kategori/' . $slug_kategori . '/index/';
        $config['total_rows']           = $total->total;
        $config['use_page_numbers']     = TRUE;
        $config['per_page']             = 9;
        $config['uri_segment']          = 7;
        $config['num_links']            = 9;

        // Style Pagination
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        // End Style Pagination 

        $config['first_url']            = base_url() . 'frontend/data_master/Fasilitas/kategori/' . $slug_kategori;

        $this->pagination->initialize($config);
        // End Pagination

        // // Ambil Data Fasilitas
        $page = ($this->uri->segment(7)) ? ($this->uri->segment(7) - 1) * $config['per_page'] : 0;
        $fasilitas_page = $this->m_fasilitas->kategori($id_kategori, $config['per_page'], $page);

        $data = array(
            'title'             => $kategori_read->nama_kategori,
            'site'              => $site,
            'kategori'          => $kategori,
            'fasilitas_page'    => $fasilitas_page,
            'pagin'             => $this->pagination->create_links(),
            'halaman'           => 'frontend/data_master/fasilitas/v_list',
        );
        // Ambil Data Pemesanan chart_check
        $data['fasilitas'] = $this->m_konfigurasi->getAll();
        $data['kategori'] = $this->m_fasilitas->getAllKategori();
        $this->load->view('frontend/layout/v_wrapper', $data);
    }

    //Detail Fasilitas
    public function detail($slug_fasilitas)
    {
        $site = $this->m_konfigurasi->getAll();
        $fasilitas_read = $this->m_fasilitas->read($slug_fasilitas);
        $id_fasilitas = $fasilitas_read->id_fasilitas;
        $foto = $this->m_fasilitas->getWhereFoto($id_fasilitas);
        $fasilitas_related = $this->m_fasilitas->home($id_fasilitas);

        $data = array(
            'title'                 => $fasilitas_read->nama_fasilitas,
            'site'                  => $site,
            'fasilitas_read'        => $fasilitas_read,
            'foto'                  => $foto,
            'fasilitas_related'     => $fasilitas_related,
            'halaman'               => 'frontend/data_master/fasilitas/v_detail',
        );
        // Ambil Data Pemesanan chart_check
        $data['fasilitas'] = $this->m_konfigurasi->getAll();
        $this->load->view('frontend/layout/v_wrapper', $data);
    }
}
