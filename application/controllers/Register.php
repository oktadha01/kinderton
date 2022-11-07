<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_register');
        $this->load->model('m_login');
        $is_login = $this->session->userdata('is_login');

        if ($is_login) {
            redirect(base_url());
            return;
        }
    }

    public function index()
    {
        $data['_title'] = 'Register';
        // $data['_menu'] = 'dashboard'; //for menu
        // $data['_submenu'] = 'dashboard'; //for submenu
        $data['_script'] = 'register/register_js';
        $data['_view'] = 'register/register';
        $this->load->view('layout/index', $data);
    }

    public function simpan_data_user()
    {
        $kontak = $this->input->post('kontak');
        //Terlebih dahulu kita trim dl
        $nomorhp = trim($kontak);
        //bersihkan dari karakter yang tidak perlu
        $nomorhp = strip_tags($nomorhp);
        // Berishkan dari spasi
        $nomorhp = str_replace(" ", "", $nomorhp);
        // bersihkan dari bentuk seperti  (022) 66677788
        $nomorhp = str_replace("(", "", $nomorhp);
        // bersihkan dari format yang ada titik seperti 0811.222.333.4
        $nomorhp = str_replace(".", "", $nomorhp);

        //cek apakah mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($nomorhp), 0, 3) == '+62') {
                $nomorhp = trim($nomorhp);
                // echo $nomorhp;
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr($nomorhp, 0, 1) == '0') {
                $nomorhp = '62' . substr($nomorhp, 1);
                // $nomorhp1 = str_replace("'", "", $nomorhp);
            }
        }
        $data = array(
            'nm_user'  => $this->input->post('nm-user'),
            'gmail' => $this->input->post('gmail'),
            'kontak' => $nomorhp,
            'password' => md5($this->input->post('password')),
            'id_kota' => $this->input->post('id-kota'),
            'kota' => $this->input->post('kota'),
            'alamat' => $this->input->post('alamat'),
            'privilage' => 'member',
            'status_user' => '0',
        );
        $insert = $this->m_register->m_simpan_data_user($data);
        echo json_encode($insert);
        // echo $nomorhp;
        return $nomorhp;
    }

    function kirim_email()
    {
        // $config = [
        //     'mailtype'  => 'html',
        //     'charset'   => 'utf-8',
        //     'protocol'  => 'smtp',
        //     'smtp_host' => 'smtp.gmail.com',
        //     'smtp_user' => 'oktadha01@gmail.com',  // Email gmail
        //     'smtp_pass'   => 'hbbtesslxafvvnwc',  // Password gmail
        //     'smtp_crypto' => 'ssl',
        //     'smtp_port'   => 465,
        //     'crlf'    => "\r\n",
        //     'newline' => "\r\n"
        // ];
        // $gmail = $this->input->post('gmail');
        // $kontak = $this->input->post('kontak');
        // $nm_user  = $this->input->post('nm-user');

        // $this->load->library('email', $config);
        // $this->email->from('oktadha01@gmail.com', 'Kinderton');
        // $this->email->to('oktadha02@gmail.com');
        // $this->email->subject('Kirim Email dengan SMTP Gmail CodeIgniter | MasRud.com');
        // // $sql = "SELECT * FROM user WHERE gmail = $gmail";
        // // $query = $this->db->query($sql);
        // // if ($query->num_rows() > 0) {
        // //     foreach ($query->result() as $data) :
        // //     endforeach;
        // // }
        // $data_email = array(
        //     'nm_user'  => $nm_user,
        //     'gmail' => $gmail,
        //     'kontak' => $kontak,
        // );

        // $body = $this->load->view('email/email_template.php', $data_email, TRUE);
        // $this->email->message($body);

        // // Tampilkan pesan sukses atau error
        // if ($this->email->send()) {
        //     echo 'true.';
        //     redirect(base_url('konfrim_akun'));
        // } else {
        //     echo 'Error! email tidak dapat dikirim.';
        // }
    }
}
    