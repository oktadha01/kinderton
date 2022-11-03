<?php
class M_produk extends CI_Model
{
    function m_data_produk($get_data)
    {
        $this->db->select('*');
        $this->db->from('jenis_produk');
        $this->db->where('gender', $get_data);
        $query = $this->db->get();
        return $query->result();
    }
    function m_category($get_data)
    {
        $this->db->select('*');
        $this->db->from('jenis_produk');
        $this->db->where('kategori', $get_data);
        $query = $this->db->get();
        return $query->result();
    }
    function m_unisex()
    {
        $this->db->select('*');
        $this->db->from('jenis_produk');
        $query = $this->db->get();
        return $query->result();
    }
}
