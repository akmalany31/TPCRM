<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gambarbarang extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_gambarbarang');
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Gambar Barang',
            'gambarbarang' => $this->M_gambarbarang->get_all_data(),
            'isi' => 'gambarbarang/v_index',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
}
