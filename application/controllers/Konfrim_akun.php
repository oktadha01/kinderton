<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfrim_akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_konfrim_akun');
    }
    public function index()
    {
        $data['_title'] = 'Konfrim Akun';
        $data['data_user'] = $this->m_konfrim_akun->m_konfrim_data_user();
        $data['_script'] = 'konfrim_akun/konfrim_akun_js';
        $data['_view'] = 'konfrim_akun/konfrim_akun';
        $this->load->view('layout/index', $data);
    }

    function kirim_ulang_email()
    {
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'kinderton.idofficial@gmail.com',  // Email gmail
            'smtp_pass'   => 'rpbvuwlmhnxxsfdr',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];
        $email_to_user = $this->input->post('gmail');

        $this->load->library('email', $config);
        $this->email->from('kinderton.idofficial@gmail.com', 'Kinderton');
        $this->email->to($email_to_user);
        $this->email->subject('Aktivasi Akun Kinderton');
        $data_email = array(
            'id_user'  => $this->session->userdata('id_user'),
            'nm_user'  => $this->session->userdata('nm_user'),
            'gmail' => $this->input->post('gmail'),
            'kontak' => $this->session->userdata('kontak'),
        );
        $body = $this->load->view('email/email_template.php', $data_email, TRUE);
        $this->email->message($body);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses';
            $id_user = $this->session->userdata('id_user');
            $gmail = $this->input->post('gmail');
            $this->m_konfrim_akun->m_update_email_user($gmail, $id_user);
            // echo json_encode($update);
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    }
    function aktivasi()
    {
        $id = $this->uri->segment(3);

        if ($this->m_konfrim_akun->m_aktivasi($id)) {
            $this->session->set_flashdata('success', 'Berhasil melakukan login');
            $sql = "SELECT *FROM user WHERE id_user = $id";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $data_user) :
                endforeach;
            }
            $this->session->set_userdata('id_user', $data_user->id_user);
            $this->session->set_userdata('nm_user', $data_user->nm_user);
            $this->session->set_userdata('gmail', $data_user->gmail);
            $this->session->set_userdata('id_kota', $data_user->id_kota);
            $this->session->set_userdata('kota', $data_user->kota);
            $this->session->set_userdata('alamat', $data_user->alamat);
            $this->session->set_userdata('kontak', $data_user->kontak);
            $this->session->set_userdata('privilage', $data_user->privilage);
            $this->session->set_userdata('status_user', $data_user->status_user);
            $this->session->set_userdata('is_login', TRUE);
            redirect(base_url('dashboard'));
        } else {
        }
    }
}
