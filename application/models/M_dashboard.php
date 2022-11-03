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
}
