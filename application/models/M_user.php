<?php
class M_user extends CI_Model
{
    function m_edit_alamat($data)
    {
        // echo 'controler';

        $this->db->set('id_kota', $data['id_kota'])
            ->set('kota', $data['kota'])
            ->set('alamat', $data['alamat'])
            ->where('id_user', $data['id_user'])
            ->update('user');
        return true;
        
    }
    function m_edit_user($data)
    {
        // echo 'controler';

        $this->db->set('id_kota', $data['id_kota'])
            ->set('kota', $data['kota'])
            ->set('nm_user', $data['nm_user'])
            ->set('gmail', $data['gmail'])
            ->set('kontak', $data['kontak'])
            ->set('alamat', $data['alamat'])
            ->where('id_user', $data['id_user'])
            ->update('user');
        return true;
        
    }
}
