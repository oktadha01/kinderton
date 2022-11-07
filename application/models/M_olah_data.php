<?php
class M_olah_data extends CI_Model
{

    function m_list_jenis_produk()
    {
        $this->db->select('*');
        $this->db->from('jenis_produk');
        $this->db->order_by('id_jp', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_list_foto_produk()
    {
        $this->db->select('*');
        $this->db->from('foto_produk');
        $this->db->join('jenis_produk', 'jenis_produk.id_jp = foto_produk.id_fotjp');
        $this->db->order_by('id_fotpro', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_list_harga_produk()
    {
        $this->db->select('*');
        $this->db->from('harga_produk');
        $this->db->join('jenis_produk', 'jenis_produk.id_jp = harga_produk.id_hrg_produk');
        $this->db->order_by('id_jp', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_simpan_jenis_produk($data)
    {
        $result = $this->db->insert('jenis_produk', $data);
        return $result;
    }

    function m_edit_jenis_produk($id_jp, $nm_jp, $kategori, $gender, $desk)
    {
        $hasil = $this->db->query("UPDATE jenis_produk SET nm_jp='$nm_jp',kategori='$kategori',gender='$gender',desk='$desk' WHERE id_jp='$id_jp'");
        return $hasil;
    }

    function m_hapus_jenis_produk($id_jp)
    {
        $hrg = $this->db->query("DELETE FROM harga_produk WHERE id_hrg_produk='$id_jp'");
        $hasil = $this->db->query("DELETE FROM jenis_produk WHERE id_jp='$id_jp'");
        $sql = "SELECT * FROM foto_produk WHERE id_fotjp = $id_jp";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) :
                unlink('./upload/' . $data->fotpro);
            endforeach;
        }
        $foto = $this->db->query("DELETE FROM foto_produk WHERE id_fotjp='$id_jp'");
        return $hrg;
        return $foto;
        return $hasil;
    }

    function m_simpan_harga_produk($data, $id_hrg_produk, $status_produk)
    {
        $data_id = array(
            'id_hrg_produk' => $id_hrg_produk,
            'status_produk' => $status_produk
        );
        $result = $this->db->insert('harga_produk', $data, $data_id);
        $jenis = $this->db->query("UPDATE jenis_produk SET status_produk='$status_produk' WHERE id_jp='$id_hrg_produk'");
        return $result;
        return $jenis;
    }

    function m_edit_harga_produk($id_hrg, $id_hrg_produk, $hrg_awal, $diskon, $hrg_diskon, $all_size, $small, $medium, $large, $extra_large, $extra2_large, $tgl_akhir_promo, $status_produk, $jam_akhir_promo)
    {
        $update_jp = $this->db->set('status_produk', $status_produk)
            ->set('tgl_akhir_promo', $tgl_akhir_promo)
            ->set('jam_akhir_promo', $jam_akhir_promo)
            ->where('id_jp', $id_hrg_produk)
            ->update('jenis_produk');
        // $jenis = $this->db->query("UPDATE jenis_produk SET status_produk='$status_produk' WHERE id_jp='$id_hrg_produk'");

        $hasil = $this->db->query("UPDATE harga_produk SET hrg_awal='$hrg_awal',diskon='$diskon',hrg_diskon='$hrg_diskon',
        all_size='$all_size',small='$small',medium='$medium',large='$large',extra_large='$extra_large',extra2_large='$extra2_large' WHERE id_hrg='$id_hrg'");

        return $update_jp;
        // return $jenis;
        return $hasil;
    }
    function m_hapus_hrg_produk($id_hrg)
    {
        $hasil = $this->db->query("DELETE FROM harga_produk WHERE id_hrg='$id_hrg'");
        return $hasil;
    }
    function m_simpan_foto_produk($id_fotjp, $fot_produk, $texture, $status_foto)
    {
        $data = array(
            'id_fotjp' => $id_fotjp,
            'fotpro' => $fot_produk,
            'texture' => $texture,
            'status_foto' => $status_foto,
        );
        $result = $this->db->insert('foto_produk', $data);
        return $result;
    }

    function m_edit_foto_produk($id_fotpro, $id_fotjp, $fot_produk, $texture, $status_foto)
    {

        $hasil = $this->db->query("UPDATE foto_produk SET id_fotjp='$id_fotjp',fotpro='$fot_produk',texture='$texture',status_foto='$status_foto' WHERE id_fotpro='$id_fotpro'");
        return $hasil;
    }

    function m_edit_fotoproduk($id_fotpro, $id_fotjp, $texture, $status_foto)
    {
        $hasil = $this->db->query("UPDATE foto_produk SET id_fotjp='$id_fotjp',texture='$texture',status_foto='$status_foto' WHERE id_fotpro='$id_fotpro'");
        return $hasil;
    }
    function m_hapus_foto_produk($id_fotpro)
    {
        $hasil = $this->db->query("DELETE FROM foto_produk WHERE id_fotpro='$id_fotpro'");
        return $hasil;
    }
    function m_expired_promo($id_jp)
    {
        $cart = $this->db->set('status_produk', 'Lainnya')
            ->where('id_jp', $id_jp)
            ->update('jenis_produk');
        return $cart;
    }
}
