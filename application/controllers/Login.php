<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $is_login = $this->session->userdata('is_login');

        if ($is_login) {
            redirect(base_url());
            return;
        }
    }

    public function index()
    {
            $input = array(
                'gmail'  => $this->input->post('gmail'),
                'password'  => $this->input->post('password'),
            );
    
            // $input = (object) $this->input->post(null, true);

        if ($this->m_login->run($input)) {
            $this->session->set_flashdata('success', 'Berhasil melakukan login');
            redirect(base_url(''));
        } else {
            // echo $input;
            $this->session->set_flashdata('error', 'E-mail/Password salah atau akun anda sedang tidak aktif');
            redirect(base_url('dashboard'));
        }
    }
    function reg_login()
    {
            $input = array(
                'gmail'  => $this->input->post('gmail'),
                'password'  => $this->input->post('password'),
            );
    
            // $input = (object) $this->input->post(null, true);

        if ($this->m_login->run($input)) {
            $this->session->set_flashdata('success', 'Berhasil melakukan login');
            redirect(base_url(''));
        } else {
            // echo $input;
            $this->session->set_flashdata('error', 'E-mail/Password salah atau akun anda sedang tidak aktif');
            redirect(base_url('dashboard'));
        }
    }
}
