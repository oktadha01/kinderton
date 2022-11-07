<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_login extends CI_Model
{

    public function run($input)
    {
        $query = $this->db->get_where('user', array('gmail' => $input['gmail']));
        if ($query->num_rows() > 0) {
            $data_user = $query->row();
            if (md5($input['password']) == ($data_user->password)) {
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
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
}
