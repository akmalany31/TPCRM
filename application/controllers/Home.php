<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_home');
    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'barang' => $this->M_home->get_all_data(),
            'isi' => 'v_home',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function kategori($id_kategori)
    {
        $kategori = $this->M_home->kategori($id_kategori);
        $data = array(
            'title' => 'Kategori Barang : ' . $kategori->nama_kategori,
            'barang' => $this->M_home->get_all_data_barang($id_kategori),
            'isi' => 'v_kategori_barang',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function detail_barang($id_barang)
    {
        $data = array(
            'title' => 'Detail Barang',
            'barang' => $this->M_home->detail_barang($id_barang),
            'gambar' => $this->M_home->get_gambar($id_barang),
            'isi' => 'v_detail_barang',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}

/* End of file Home.php */
