<?php
class M_register extends CI_Model
{
    function m_simpan_data_user($data)
    {

        // Query insert tempatkan disini,... 
        $result = $this->db->insert('user', $data);
        return $result;
    }
}
