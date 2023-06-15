<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(('M_pelanggan'));
    }

    public function register()
    {
        $this->form_validation->set_rules(
            'nama_pelanggan',
            'Nama Pelanggan',
            'required',
            array(
                'required' => '%s Harus Diisi!'
            )
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|is_unique[tbl_pelanggan.email]',
            array(
                'required' => '%s Harus Diisi!',
                'is_unique' => 'Email ini sudah terdaftar!'
            )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required' => '%s Harus Diisi!'
            )
        );
        $this->form_validation->set_rules(
            'ulangi_password',
            'Ulangi Password',
            'required|matches[password]',
            array(
                'required' => '%s Harus Diisi!',
                'matches' => 'Password tidak sama!'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => '',
                //'' => $this->M_pelanggan->register(),
                'isi' => 'v_register',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            $this->M_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'Akun berhasil dibuat, Silakan login');
            redirect('pelanggan/register');
        }
    }
}
