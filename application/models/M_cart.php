<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_cart extends CI_Model
{
    function m_data_cart_blmbyr()
    {
        $data_user = $this->session->userdata("id_user");

        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where('cart_user', $data_user);
        $this->db->where('status_pembayaran', 'Belum Bayar');
        $this->db->join('user', 'user.id_user = cart.cart_user');
        $this->db->order_by('id_cart', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_cart_sdhbyr()
    {
        $data_user = $this->session->userdata("id_user");

        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where('cart_user', $data_user);
        $this->db->where('status_pembayaran', 'Sudah Bayar');
        $this->db->join('bukti_transfer', 'bukti_transfer.kode_pesanan = cart.kode_cart');
        $this->db->join('user', 'user.id_user = cart.cart_user');
        $query = $this->db->get();
        $this->db->order_by('id_cart', 'desc');
        return $query->result();
    }
    function m_data_cart_ditolak()
    {
        $data_user = $this->session->userdata("id_user");

        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where('cart_user', $data_user);
        $this->db->where('status_pembayaran', 'Di-tolak');
        $this->db->join('bukti_transfer', 'bukti_transfer.kode_pesanan = cart.kode_cart');
        $this->db->join('user', 'user.id_user = cart.cart_user');
        $query = $this->db->get();
        $this->db->order_by('id_cart', 'desc');
        return $query->result();
    }
    function m_data_cart_brgkms()
    {
        $data_user = $this->session->userdata("id_user");

        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where('cart_user', $data_user);
        $this->db->where('status_pembayaran', 'Dikemas');
        $this->db->join('bukti_transfer', 'bukti_transfer.kode_pesanan = cart.kode_cart');
        $this->db->join('user', 'user.id_user = cart.cart_user');
        $this->db->order_by('id_cart', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_cart_dikirim()
    {
        $data_user = $this->session->userdata("id_user");

        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where('cart_user', $data_user);
        $this->db->where('status_pembayaran', 'Dikirim');
        $this->db->join('bukti_transfer', 'bukti_transfer.kode_pesanan = cart.kode_cart');
        $this->db->join('user', 'user.id_user = cart.cart_user');
        $query = $this->db->get();
        $this->db->order_by('id_cart', 'desc');
        return $query->result();
    }
    function m_data_cart_selesai_dikirim()
    {
        $data_user = $this->session->userdata("id_user");

        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where('cart_user', $data_user);
        $this->db->where('status_pembayaran', 'Selesai Dikirim');
        $this->db->join('bukti_transfer', 'bukti_transfer.kode_pesanan = cart.kode_cart');
        $this->db->join('user', 'user.id_user = cart.cart_user');
        $query = $this->db->get();
        $this->db->order_by('id_cart', 'desc');
        return $query->result();
    }

    function m_expired_cart($kode_cart)
    {
        $cart = $this->db->query("DELETE FROM cart WHERE cart.kode_cart='$kode_cart'");
        $favorit = $this->db->query("DELETE FROM favorit WHERE favorit.kode_chekout='$kode_cart'");
        return $cart;
        return $favorit;
    }

    function m_simpan_bukti_transfer($data_upload_bukti, $kode_pembayaran)
    {
        $cart = $this->db->set('status_pembayaran', 'Sudah Bayar')
            ->where('kode_cart', $kode_pembayaran)
            ->update('cart');
        $result = $this->db->insert('bukti_transfer', $data_upload_bukti);
        return $cart;
        return $result;
        
    }
}
