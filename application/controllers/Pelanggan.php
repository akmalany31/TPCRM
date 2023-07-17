<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(('M_pelanggan'));
        $this->load->model(('M_auth'));
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


    public function profile()
    {
        $this->form_validation->set_rules(
            'nama_pelanggan',
            'Nama Pelanggan',
            'required',
            array(
                'required' => '%s Harus Diisi'
            )
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required',
            array(
                'required' => '%s Harus Diisi'
            )
        );

        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'title' => 'Akun Saya',
                'profile' => $this->M_pelanggan->edit($data),
                'isi' => 'v_akun_saya',
            );

            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {

            // $pelanggan = $this->M_pelanggan->data_akun($id_pelanggan);
            $data = array(
                'id_pelanggan' => $id_pelanggan,
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
            );
            $this->M_admin->edit($data);
            $this->session->set_flashdata('pesan', 'Akun Pelanggan Berhasil Diupdate');
            redirect('pelanggan/profile');
        }
    }


    public function login()
    {
        $this->form_validation->set_rules('email', 'E-Mail', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi'
        ));


        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }

        $data = array(
            'title' => 'Login Pelanggan',
            //'' => $this->M_pelanggan->register(),
            'isi' => 'v_login_pelanggan',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function logout()
    {
        $this->pelanggan_login->logout();
    }

    public function akun()
    {
        //proteksi
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Akun Saya',
            //'' => $this->M_pelanggan->register(),
            'isi' => 'v_akun_saya',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}
