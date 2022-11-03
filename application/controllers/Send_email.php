<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Send_email extends CI_Controller
{

    
    public function index()
    {
        // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'oktadha01@gmail.com',  // Email gmail
            'smtp_pass'   => 'hbbtesslxafvvnwc',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];
    
        // Load library email dan konfigurasinya
        $this->load->library('email', $config);
    
        // Email dan nama pengirim
        $this->email->from('oktadha01@gmail.com', 'Kinderton');
    
        // Email penerima
        $this->email->to('oktadha02@gmail.com'); // Ganti dengan email tujuan
    
        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.orami.co.id%2Fmagazine%2Fkartun-anak-yang-mendidik&psig=AOvVaw2gXK9JDYmKMCv3oz92HvwW&ust=1664341553038000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCPDh_86ZtPoCFQAAAAAdAAAAABAD');
    
        // Subject email
        $this->email->subject('Kirim Email dengan SMTP Gmail CodeIgniter | MasRud.com');
        $data = array(
            'userName' => 'Kinderton'
        );
        $body = $this->load->view('email/email_template.php', $data, TRUE);
        $this->email->message($body);
    
        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    
        
    }
}
