<?php
class M_dashboard extends CI_Model
{

    function m_produk_dashboard()
    {
        $this->db->select('*');
        $this->db->from('jenis_produk');
        $this->db->join('foto_produk', 'foto_produk.id_fotjp = jenis_produk.id_jp');
        $this->db->order_by('id_jp', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_kategori()
    {
        $this->db->select('*');
        $this->db->from('jenis_produk');
        $this->db->where('foto_produk.status_foto', 'display');
        $this->db->join('foto_produk', 'foto_produk.id_fotjp = jenis_produk.id_jp');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_produk()
    {
        $this->db->select('*');
        $this->db->from('jenis_produk');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_hrg_produk()
    {
        $this->db->select('*');
        $this->db->from('harga_produk');
        $this->db->order_by('id_hrg', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
}
