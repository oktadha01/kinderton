<?php
class M_detail_produk extends CI_Model
{
    function m_produk_detail($id)
    {
        $this->db->select('*');
        $this->db->from('jenis_produk');
        $this->db->where('id_jp', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
