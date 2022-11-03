<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index()
    {
        $data['_title'] = 'User';
        $data['_script'] = 'user/akun_user_js';
        $data['_view'] = 'user/akun_user';
        $this->load->view('layout/index', $data);
    }
    function edit_alamat()
    {
        // echo 'controler';
        $data = array(
            'id_user' => $this->input->post('id-user'),
            'id_kota' => $this->input->post('id-kota'),
            'kota' => $this->input->post('kota'),
            'alamat' => $this->input->post('alamat'),
        );
        $data = $this->m_user->m_edit_alamat($data);
        echo json_encode($data);
    }
    function edit_user()
    {
        // echo 'controler';
        $data = array(
            'id_user' => $this->input->post('id-user'),
            'nm_user' => $this->input->post('nm-user'),
            'gmail' => $this->input->post('gmail'),
            'kontak' => $this->input->post('kontak'),
            'id_kota' => $this->input->post('id-kota'),
            'kota' => $this->input->post('kota'),
            'alamat' => $this->input->post('alamat'),
        );
        $data = $this->m_user->m_edit_user($data);
        echo json_encode($data);
    }
}
