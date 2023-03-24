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
            // $this->session->set_flashdata('success', 'Berhasil melakukan login');
            if ($this->session->userdata("status_user") == '0') {

                redirect(base_url('konfrim_akun'));
            } else {

                redirect(base_url(''));
            }
        } else {
            // echo $input;
            $this->session->set_flashdata('error', 'E-mail/Password anda masukan salah !!');
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
            if ($this->session->userdata("status_user") == '0') {
                $config = [
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8',
                    'protocol'  => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_user' => 'akunaktivasikinderton@gmail.com',  // Email gmail
                    'smtp_pass'   => 'kxklkmfymlpihywd',  // Password gmail
                    'smtp_crypto' => 'ssl',
                    'smtp_port'   => 465,
                    'crlf'    => "\r\n",
                    'newline' => "\r\n"
                ];
                $email_to_user = $this->session->userdata('gmail');
                $this->load->library('email', $config);
                $this->email->from('akunaktivasikinderton@gmail.com', 'Kinderton');
                $this->email->to($email_to_user);
                $this->email->subject('Aktivasi Akun Kinderton');
                $data_email = array(
                    'id_user'  => $this->session->userdata('id_user'),
                    'nm_user'  => $this->session->userdata('nm_user'),
                    'gmail' => $this->session->userdata('gmail'),
                    'kontak' => $this->session->userdata('kontak'),
                );

                $body = $this->load->view('email/email_template.php', $data_email, TRUE);
                $this->email->message($body);

                // Tampilkan pesan sukses atau error
                if ($this->email->send()) {
                    // echo 'true.';
                    // redirect(base_url('konfrim_akun'));
                } else {
                    echo 'Error! email tidak dapat dikirim.';
                }
            } else {

                redirect(base_url(''));
            }
        } else {
            // echo $input;
            $this->session->set_flashdata('error', 'E-mail/Password anda masukan salah !!');
            redirect(base_url('dashboard'));
        }
    }
}
