<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sendmail extends CI_Controller
{

    public function htmlmail()
    {
        $userEmail = 'kinderton.idofficial@gmail.com';
        $subject = 'Kirim Email dengan SMTP Gmail CodeIgniter | MasRud.com';
        $this->load->library('email');
        $config = array(
            'mailtype' => 'html',
            'charset'  => 'utf-8',
            'priority' => '1'
        );
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from('oktadha01@gmail.com', 'KINDERTON');
        $data = array(
            'userName' => 'Kinderton'
        );
        $this->email->to($userEmail);  // replace it with receiver mail id
        $this->email->subject($subject); // replace it with relevant subject 

        $body = $this->load->view('email_template.php', $data, TRUE);
        $this->email->message($body);
        $this->email->send();
    }
}
