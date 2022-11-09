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
            'id_user' => $this->input->post('id-user'),
            'nm_user' => $this->input->post('nm-user'),
            'gmail' => $this->input->post('gmail'),
            'kontak' => $nomorhp,
            'id_kota' => $this->input->post('id-kota'),
            'kota' => $this->input->post('kota'),
            'alamat' => $this->input->post('alamat'),
        );
        $data = $this->m_user->m_edit_user($data);
        echo json_encode($data);
        return $nomorhp;
    }
}
