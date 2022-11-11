<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_chekout extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function m_simpan_pesanan($id_favorit = array(), $kode_chekout, $data_cart, $action, $data_favorit)
    // function m_simpan_pesanan($action)
    {
        if ($action == 'favorit') {
            $cart = $this->db->insert('cart', $data_cart);
            foreach ($id_favorit as $id) {
                $this->db->set('kode_chekout', $data_favorit['kode_chekout'])
                    ->set('status_favorit', 'chekout')
                    ->where(array('id_favorit' => $id))
                    ->update('favorit');
            }
            return $cart;
            return 1;
        } else {
            $user = $data_favorit['user'];
            $produk = $data_favorit['produk'];
            $size = $data_favorit['size'];
            $foto_favorit = $data_favorit['foto_favorit'];
            // echo $produk;
            $sql = "SELECT *FROM favorit WHERE user='$user' AND produk = '$produk' AND foto_favorit = '$foto_favorit' AND size = '$size' AND status_favorit = ''";
            $query = $this->db->query($sql);
            if ($query->num_rows() == 1) {
                foreach ($query->result() as $favorit_data) {
                    $id = $favorit_data->id_favorit;
                    echo $id;
                    $this->db->set('foto_favorit', $data_favorit['foto_favorit'])
                        ->set('size', $data_favorit['size'])
                        ->set('hrg_favorit', $data_favorit['hrg_favorit'])
                        ->set('qty', $data_favorit['qty'])
                        ->set('kode_chekout', $data_favorit['kode_chekout'])
                        ->set('status_favorit', $data_favorit['status_favorit'])
                        ->where(array('id_favorit' => $id))
                        ->update('favorit');
                }
            } else {
                $favorit = $this->db->insert('favorit', $data_favorit);
                $cart = $this->db->insert('cart', $data_cart);
                return $favorit;
                return $cart;
            }
            $cart = $this->db->insert('cart', $data_cart);
            return $cart;
        }
    }

    function m_vali_pesanan()
    {

        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where("(status_pembayaran='Sudah Bayar' OR status_pembayaran='Dikemas' OR status_pembayaran='Di-Tolak')", NULL, FALSE);
        $this->db->join('bukti_transfer', 'bukti_transfer.kode_pesanan = cart.kode_cart');
        $this->db->order_by('id_cart', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_acc_pesanan($kode_cart, $status_pembayaran, $jam_kirim, $etd_kirim, $no_resi, $ket_tolak)
    {
        if ($status_pembayaran == 'Dikirim') {
            $tgl        = mktime(0, 0, 0, date("n"), date("j"), date("Y"));
            $tgl_kirim        = date("m-d-Y", $tgl);
            $update_bukti = $this->db->set('tgl_kirim', $tgl_kirim)
                ->set('jam_kirim', $jam_kirim)
                ->set('no_resi', $no_resi)
                ->set('etd_kirim', $etd_kirim)
                ->where('kode_pesanan', $kode_cart)
                ->update('bukti_transfer');
            $update_cart = $this->db->set('status_pembayaran', $status_pembayaran)
                ->where('kode_cart', $kode_cart)
                ->update('cart');
            return $update_bukti;
            return $update_cart;
        } else if ($status_pembayaran == 'Di-Tolak') {
            $update_bukti = $this->db->set('ket_ditolak', $ket_tolak)
                ->where('kode_pesanan', $kode_cart)
                ->update('bukti_transfer');
            $update_cart = $this->db->set('status_pembayaran', $status_pembayaran)
                ->where('kode_cart', $kode_cart)
                ->update('cart');
            return $update_bukti;
            return $update_cart;
        } else {
            $update_cart = $this->db->set('status_pembayaran', $status_pembayaran)
                ->where('kode_cart', $kode_cart)
                ->update('cart');
            $update_favorit = $this->db->set('status_favorit', 'terbeli')
                ->where('kode_chekout', $kode_cart)
                ->update('favorit');
            return $update_favorit;
            return $update_cart;
        }
    }

    function m_pesanan_dikirim()
    {

        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where('status_pembayaran', 'Dikirim');
        $this->db->join('bukti_transfer', 'bukti_transfer.kode_pesanan = cart.kode_cart');
        $this->db->order_by('id_cart', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_selesai_dikirim($kode_pesanan)
    {
        $tgl        = mktime(0, 0, 0, date("n"), date("j"), date("Y"));
        $tgl_selesai_kirim        = date("m-d-Y", $tgl);
        $update_cart = $this->db->set('status_pembayaran', 'Selesai Dikirim')
            ->where('kode_cart', $kode_pesanan)
            ->update('cart');
        $update_bukti = $this->db->set('tgl_selesai_dikirim', $tgl_selesai_kirim)
            ->where('kode_pesanan', $kode_pesanan)
            ->update('bukti_transfer');
        return $update_bukti;
        return $update_cart;
    }
    function m_riwayat_pesanan()
    {

        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where('status_pembayaran', 'Selesai Dikirim');
        $this->db->join('bukti_transfer', 'bukti_transfer.kode_pesanan = cart.kode_cart');
        $this->db->order_by('id_cart', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_hapus_data_pesanan($kode_pesanan)
    {
        $delete_favorit = $this->db
            ->where('kode_chekout', $kode_pesanan)
            ->delete('favorit');
        $delete_cart = $this->db
            ->where('kode_cart', $kode_pesanan)
            ->delete('cart');
        $delete_bukti = $this->db
            ->where('kode_pesanan', $kode_pesanan)
            ->delete('bukti_transfer');
        return $delete_cart;
        return $delete_favorit;
        return $delete_bukti;
    }
}
// Query insert tempatkan disini,... 
// $result = $this->db->insert_batch('cart', $data);
// $result = $this->db->insert('cart', $data);
// return $result;
