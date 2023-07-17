<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(('M_admin'));
        $this->load->model(('M_pesanan_masuk'));
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'total_barang' => $this->M_admin->total_barang(),
            'total_kategori' => $this->M_admin->total_kategori(),
            'total_pelanggan' => $this->M_admin->total_pelanggan(),
            'total_transaksi' => $this->M_admin->total_transaksi(),
            'isi' => 'v_admin',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function setting()
    {
        $this->form_validation->set_rules(
            'nama_toko',
            'Nama Toko',
            'required',
            array(
                'required' => '%s Harus Diisi'
            )
        );
        $this->form_validation->set_rules(
            'kota',
            'Kota',
            'required',
            array(
                'required' => '%s Harus Diisi'
            )
        );
        $this->form_validation->set_rules(
            'alamat_toko',
            'Alamat Toko',
            'required',
            array(
                'required' => '%s Harus Diisi'
            )
        );
        $this->form_validation->set_rules(
            'no_telp',
            'No Telp',
            'required',
            array(
                'required' => '%s Harus Diisi'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Setting',
                'setting' => $this->M_admin->data_setting(),
                'isi' => 'v_setting',
            );

            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        } else {
            $data = array(
                'id' => 1,
                'lokasi' => $this->input->post('kota'),
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat_toko' => $this->input->post('alamat_toko'),
                'no_telp' => $this->input->post('no_telp'),
            );
            $this->M_admin->edit($data);
            $this->session->set_flashdata('pesan', 'Setting Kota Berhasil Diupdate');
            redirect('admin/setting');
        }
    }

    public function pesanan_masuk()
    {
        $data = array(
            'title' => 'Pesanan Masuk',
            'pesanan' => $this->M_pesanan_masuk->pesanan(),
            'pesanan_diproses' => $this->M_pesanan_masuk->pesanan_diproses(),
            'pesanan_dikirim' => $this->M_pesanan_masuk->pesanan_dikirim(),
            'pesanan_selesai' => $this->M_pesanan_masuk->pesanan_selesai(),

            'isi' => 'v_pesanan_masuk',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function proses($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '1',
        );
        $this->M_pesanan_masuk->udpate_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses/Dikemas');
        redirect('admin/pesanan_masuk');
    }

    public function kirim($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => '2',
        );
        $this->M_pesanan_masuk->udpate_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Kirim');
        redirect('admin/pesanan_masuk');
    }
}
