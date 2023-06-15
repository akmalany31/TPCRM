<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('tbl_pelanggan', $data);
    }


    public function login_pelanggan($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->where(array(
            'username' => $username,
            'password' => $password
        ));
        return $this->db->get()->row();
    }
}

/* End of file M_auth.php */
