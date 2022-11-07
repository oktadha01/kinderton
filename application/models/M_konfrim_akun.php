<?php
class M_konfrim_akun extends CI_Model
{
    function m_konfrim_data_user()
    {
        $id_user = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->result();
    }
    function m_update_email_user($gmail, $id_user)
    {
        $this->db->set('gmail', $gmail)
            ->where('gmail', $gmail)
            ->update('user');
        return true;
    }

    function m_aktivasi($id)
    {
        $this->db->set('status_user', '1')
            ->where('id_user', $id)
            ->update('user');
        return true;
    }
}
